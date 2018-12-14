<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\Payment;
use App\Services\Payment\Mellat;
use App\Utility\Basket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    private $mellatGateway;

    public function __construct() {
        $this->mellatGateway = new Mellat();
    }

    public function redirect( Request $request ) {
        $currentUserID = \Auth::id();
        $total_amount = Basket::total_price() + $_SESSION['shippingCost'];
        $order_data = [
            'user_id' => $currentUserID,
            'status' => Order::INCOMPLETE,
            'total_price' => $total_amount,
            'shipping_method_id' => $_SESSION['shippingCostId'],
        ];



        $new_order = Order::create($order_data);

        $productIds = Basket::productIds();


        $new_order->products()->sync($productIds);


        $_SESSION['order_id'] = $new_order->id;


        $data          = [
            'user_id'  => $currentUserID,
            'order_id' => \App\Utility\Order::generateOrderId( $currentUserID ),
            'amount'   => $total_amount
        ];


        $result = $this->mellatGateway->doPayment( $data );
//        dd($result);
        if ( $result && isset( $result[ 'success' ] ) && ! $result[ 'success' ] ) {
            return back()->with( 'message', 'در حال حاضر امکان پرداخت وجود ندارد.' );
        }


    }

    public function verify( Request $request ) {

//        dd($request->all());

        if ( $request->has( 'ResCode' ) ) {
            $resCode  = $request->input( 'ResCode' );
            $order_id = $request->input( 'SaleOrderId' );
            $refCode  = $request->input( 'SaleReferenceId' );
            $refId    = $request->input( 'RefId' );

            $params       = [
                'ResCode'         => $resCode,
                'SaleOrderId'     => $order_id,
                'SaleReferenceId' => $refCode,
                'RefId' => $refId,
            ];
            $verifyResult = $this->mellatGateway->verifyPayment( $params );
            if ( $verifyResult ) {

                $order = Order::find($_SESSION['order_id']);

                $order->update([
                    'status' => Order::COMPLETE,
                ]);

                $payment = Payment::where( 'reserve_number', $params[ 'SaleOrderId' ] )->first();
                Session::flash('notification' , 'فاکتور شما با موفقیت پرداخت شد.');
                unset($_SESSION['basket']);
                unset($_SESSION['order_id']);
                unset($_SESSION['shippingCostId']);
                unset($_SESSION['shippingCost']);
                $pageTitle = 'اطلاعات پرداخت';
                return view('frontend.payment.verify' , compact('params' , 'payment' , 'pageTitle'))->with('notification' , 'فاکتور شما با موفقیت پرداخت شد.');
            }
        }





    }
}
