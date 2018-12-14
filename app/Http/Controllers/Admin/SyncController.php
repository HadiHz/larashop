<?php

namespace App\Http\Controllers\Admin;


use HttpRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class SyncController extends Controller
{

    public function index()
    {
        $panel_title = 'هماهنگی با نسخه دسکتاپ';
        return view('admin.sync.index', compact('panel_title'));
    }

    public function syncProducts()
    {

        $jsonUrl = "http://localhost:50586//api/myapi/change?username=hadi&password=sdfasdfsdf";
        $json = file_get_contents($jsonUrl);
        $data = json_decode($json);

//        dd($data);


        $url = 'http://localhost:50586//api/myapi/Post';
        $data = array('value' => 'value1');

// use key 'http' even if you send the request to https://...
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/json",
                'method'  => 'POST',
                'content' => http_build_query($data),
            ),
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);



        dd($result);

//        dd($data[0]->lastname);
//        $imgUrl = 'http://www.fullfilm2.com/images/1544555307.jpg';
//        $info = pathinfo($imgUrl);
//        $contents = file_get_contents($imgUrl);
//        $file = '/tmp/' . $info['basename'];
//        $a = Storage::put($file, $contents);
//        $new_file = new File(storage_path() . '/app' . $file);
//
//        $bb = $new_file->move(public_path('tmp'), 'aaaa.jpg');
//        var_dump($file);
//        dd($bb);





        return $data;

    }
}
