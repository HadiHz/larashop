<?php

namespace App\Services\Payment;


use App\Models\Payment;
use App\Models\Setting;use App\Utility\Order;
use nusoap_client;


class Mellat {
	private $terminalID;
	private $userName;
	private $password;
	private $client;
	private $namespace;

	public function __construct() {

	    $settingMellat = Setting::find(1);

	    if ($settingMellat){
            $this->terminalID = $settingMellat->mellatTerminalID;
		    $this->userName   = $settingMellat->mellatUsername;
		    $this->password   = $settingMellat->mellatPassword;
	    }else{
	        $this->terminalID = config( 'gateways.mellat.terminalID' );
		    $this->userName   = config( 'gateways.mellat.userName' );
		    $this->password   = config( 'gateways.mellat.password' );
	    }

//		$this->terminalID = config( 'gateways.mellat.terminalID' );
//		$this->userName   = config( 'gateways.mellat.userName' );
//		$this->password   = config( 'gateways.mellat.password' );
//		$this->client     = new nusoap_client( 'https://bpm.shaparak.ir/pgwchannel/services/pgw?wsdl', TRUE );
		$this->client     = new nusoap_client( 'http://banktest.ir/gateway/mellat/ws?wsdl', TRUE );
		$this->namespace  = 'http://interfaces.core.sw.bps.com/';
//		$this->namespace  = 'http://banktest.ir/gateway/mellat/gate';
	}

	public function doPayment( array $params ) {

		$args = [
			'terminalId'     => $this->terminalID,
			'userName'       => $this->userName,
			'userPassword'   => $this->password,
			'orderId'        => $params[ 'order_id' ],
			'amount'         => $params[ 'amount' ],
			'localDate'      => date( 'Ymd' ),
			'localTime'      => date( 'Hms' ),
			'additionalData' => "",
			'callBackUrl'    => route( 'payment.verify' ),
			'payerId'        => 0
		];

//		dd($args);

//        dd(session('user_selected_plan'));
		$response = $this->client->call( 'bpPayRequest', $args, $this->namespace );
		if ( $response ) {

			$rawResponseResult = $response[ 'return' ];

			$statusCode = explode( ',', $rawResponseResult );// 0,6as4fd98q7rfasqwqw7d98

//            dd($statusCode);

			if ( $statusCode[ 0 ] == "0" ) {

//			    dd($params);
				$newPayment = Payment::create( [
					'user_id'      => $params[ 'user_id' ],
					'gateway_name' => 'ملت',
					'reserve_number'      => $params[ 'order_id' ],
					'amount'       => $params[ 'amount' ],
					'status'       => Payment::INCOMPLETE
				] );
				if ( $newPayment ) {

//				    dd($newPayment);
					$this->redirectToBank( $statusCode[ 1 ] );
//					dd($a);
				}

			}

			return [
				'success' => FALSE,
				'message' => 'خطایی در مرحله پرداخت به وجود آمده است . لطفا بعدا امتحان کنید',
				'code'    => $rawResponseResult
			];

		}

		return [
			'success' => FALSE,
			'message' => 'خطایی در مرحله پرداخت به وجود آمده است . لطفا بعدا امتحان کنید'
		];
	}

	public function verifyPayment( array $params ) {
//	    dd($params);

		if ( $params[ 'ResCode' ] != "0" ) {
			return FALSE;
		}

		$args     = [
			'terminalId'      => $this->terminalID,
			'userName'        => $this->userName,
			'userPassword'    => $this->password,
			'orderId'         => Order::generateOrderId(),
			'saleOrderId'     => $params[ 'SaleOrderId' ],
			'saleReferenceId' => $params[ 'SaleReferenceId' ]
		];

//		dd(session('user_selected_plan'));

		$response = $this->client->call( 'bpVerifyRequest', $args, $this->namespace );

		if ( ! $response || empty( $response ) ) {
			return FALSE;
		}
		$result = $response[ 'return' ];
		if ( $result != "0" ) {
			return FALSE;
		}
//		dd(session('user_selected_plan'));
		// action fo update database
		$paymentItem                  = Payment::where( 'reserve_number', $params[ 'SaleOrderId' ] )->first();
//		dd($paymentItem);
		$paymentItem->reference_number = $params[ 'SaleReferenceId' ];
		$paymentItem->reference_id = $params[ 'RefId' ];
		$paymentItem->status  = Payment::COMPLETE;
		$paymentItem->save();
		$settleArgs = [
			'terminalId'      => $this->terminalID,
			'userName'        => $this->userName,
			'userPassword'    => $this->password,
			'orderId'         => Order::generateOrderId(),
			'saleOrderId'     => $params[ 'SaleOrderId' ],
			'saleReferenceId' => $params[ 'SaleReferenceId' ]
		];
		$settleResponse = $this->client->call( 'bpSettleRequest', $settleArgs, $this->namespace );

		if ( $settleResponse && $settleResponse[ 'return' ] == "0" ) {
			//
		}

		return TRUE;

	}

	private function redirectToBank( string $code ) {
//        ?>
<!--        <script type="text/javascript">-->
<!--            alert("hello");-->
<!--            function postRefId(refIdValue) {-->
<!--                var form = document.createElement("form");-->
<!--                form.setAttribute("method", "POST");-->
<!--                // form.setAttribute("action", "https://bpm.shaparak.ir/pgwchannel/startpay.mellat");-->
<!--                form.setAttribute("action", "http://banktest.ir/gateway/mellat/gate");-->
<!--                form.setAttribute("target", "_self");-->
<!--                var hiddenField = document.createElement("input");-->
<!--                hiddenField.setAttribute("type", "hidden");-->
<!--                hiddenField.setAttribute("name", "RefId");-->
<!--                hiddenField.setAttribute("value", refIdValue);-->
<!--                form.appendChild(hiddenField);-->
<!--                alert(refIdValue);-->
<!--                document.body.appendChild(form);-->
<!--                form.submit();-->
<!--                document.body.removeChild(form);-->
<!--            }-->
<!--        </script>-->
<!--        <script type="text/javascript"> postRefId(--><?php //$code ?>//);</script>;
//
//        <?php

echo '<script language="javascript" type="text/javascript"> 
				function postRefId (refIdValue) {
				var form = document.createElement("form");
				form.setAttribute("method", "POST");
				form.setAttribute("action", "http://banktest.ir/gateway/mellat/gate");         
				form.setAttribute("target", "_self");
				var hiddenField = document.createElement("input");              
				hiddenField.setAttribute("name", "RefId");
				hiddenField.setAttribute("value", refIdValue);
				form.appendChild(hiddenField);
	
				document.body.appendChild(form);         
				form.submit();
//				alert(refIdValue);
				document.body.removeChild(form);
			}
			
			postRefId("' . $code . '");
			</script>';
        dd($code);


	}

}