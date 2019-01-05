<?php

namespace App\Http\Controllers\Admin;


use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class SyncController extends Controller
{

    public function index()
    {
        $panel_title = 'هماهنگی با نسخه دسکتاپ';
        return view('admin.sync.index', compact('panel_title'));
    }

    public function syncProducts(Request $request)
    {


//        $oldProduct = Product::find(1);
//        $t = $oldProduct->categories()->sync([1]);
//        dd($t);

//        $t = DB::table('categorizables')->insert([
//            'category_id' => 100,
//            'categorizable_id' => 11,
//            'categorizable_type' => 'App\Models\Product',
//        ]);

//        dd($t);

        $valData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

//        dd($valData);

        $jsonUrl = "http://localhost:28666/api/product?username=" . $valData['email'] . "&password=" . $valData['password'];
        $json = file_get_contents($jsonUrl);
        $data = json_decode($json);

//        dd($data[3]);

        $flag = $data[0];

        if ($flag == 1) {
            $products = $data[1];
            $categories = $data[2];
            $categorizables = $data[3];
            foreach ($products as $product) {
                if (Product::find($product->id)) {
                    $oldProduct = Product::find($product->id);
                    $oldProduct->name = $product->name;
                    $oldProduct->description = $product->description;
                    $oldProduct->quantity_in_warehouse = $product->quantity_in_warehouse;
                    $oldProduct->price = $product->price;


                    $imgUrl = $product->image_path;
                    $info = pathinfo($imgUrl);
                    $contents = file_get_contents($imgUrl);
                    $file = '/tmp/' . $info['basename'];
                    $a = Storage::put($file, $contents);
                    $new_file = new File(storage_path() . '/app' . $file);

                    $new_file->move(public_path('productPhotos'), $info['basename']);
                    $imagePath = DIRECTORY_SEPARATOR . 'productPhotos' . DIRECTORY_SEPARATOR . $info['basename'];


                    $oldProduct->image_path = $imagePath;
                    $oldProduct->save();
                    $oldProduct->touch();
                } else {
                    $newProductData = [
                        'id' => $product->id,
                        'name' => $product->name,
                        'description' => $product->description,
                        'quantity_in_warehouse' => $product->quantity_in_warehouse,
                        'price' => $product->price,
                    ];

                    $imgUrl = $product->image_path;
                    $info = pathinfo($imgUrl);
                    $contents = file_get_contents($imgUrl);
                    $file = '/tmp/' . $info['basename'];
                    $a = Storage::put($file, $contents);
                    $new_file = new File(storage_path() . '/app' . $file);

                    $new_file->move(public_path('productPhotos'), $info['basename']);
                    $imagePath = DIRECTORY_SEPARATOR . 'productPhotos' . DIRECTORY_SEPARATOR . $info['basename'];

                    $newProductData['image_path'] = $imagePath;

                    Product::create($newProductData);

                }
            }

            foreach ($categories as $category) {
                if (Category::find($category->id)) {
                    $oldCategory = Category::find($category->id);
                    $oldCategory->name = $category->name;
                    $oldCategory->parent_id = $category->parent_id;

                    $oldCategory->save();
                    $oldCategory->touch();
                } else {
                    $newCategoryData = [
                        'id' => $category->id,
                        'name' => $category->name,
                        'parent_id' => $category->parent_id,
                    ];

                    Category::create($newCategoryData);
                }
            }

            foreach ($categorizables as $categorizable) {
                $p = Product::find($categorizable->categorizable_id);
//                dd($p , $categorizable , $categorizables);
                if ($p && !$p->categories->contains($categorizable->category_id)) {
                    $p->categories()->attach($categorizable->category_id);
                }
            }

            return redirect()->route('admin.product.list')->with('success', 'لیست محصولات با موفقیت به روز رسانی شد.');

        } else {
            return back()->with('getError', 'ایمیل یا پسورد اشتباه است.');
        }


//        $url = 'http://localhost:50586//api/myapi/Post';
//        $data = array('value' => 'value1');
//
//// use key 'http' even if you send the request to https://...
//        $options = array(
//            'http' => array(
//                'header'  => "Content-type: application/json",
//                'method'  => 'POST',
//                'content' => http_build_query($data),
//            ),
//        );
//        $context  = stream_context_create($options);
//        $result = file_get_contents($url, false, $context);


//        dd($data[0]->lastname);

//        var_dump($file);
//        dd($bb);

//
//        return $data;

    }


    public function syncOrders()
    {
        $orders = Order::all();
        foreach ($orders as $order) {
            $user_id = $order->user_id;
            $status = $order->status;
            $total_price = $order->total_price;
            $shipping_method_id = $order->shipping_method_id;
            $created_at = $order->created_at->toDateString();
            $qsrtArr = [
                'user_id' => $user_id,
                'status' => $status,
                'total_price' => $total_price,
                'shipping_method_id' => $shipping_method_id,
                'created_at' => $created_at,
            ];
            $jsonUrlData = http_build_query($qsrtArr);

//            dd($jsonUrlData);
            $jsonUrl = "http://localhost:28666/api/order?".$jsonUrlData;
//            dd($jsonUrl);
            $json = file_get_contents($jsonUrl);
            $data = json_decode($json);
        }


        return back()->with('success', 'فاکتور ها با موفقیت ارسال شد.');


    }

}
