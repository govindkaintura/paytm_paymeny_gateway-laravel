<?php

namespace App\Http\Controllers;

use App\Traits\Paytm;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    use Paytm;

     /**
     * Show the form for placing a order for payment.
     *
     * @return \Illuminate\Http\Response
     */
    public function proceedForPayment(Request $request)
    {
        $data_for_request = $this->handlePaytmRequest( 'GKDEM'. Str::random(5), '1.00' );

        $paytm_txn_url  = 'https://securegw-stage.paytm.in/theia/processTransaction';
        $paramList      = $data_for_request['paramList'];
        $checkSum       = $data_for_request['checkSum'];

        return view('payment_form', compact( 'paytm_txn_url', 'paramList', 'checkSum' ) );
    }

	public function paytmCallback(Request $request)
	{
        $data['ORDERID'] = $request->ORDERID ? $request->ORDERID : '';
        $data['MID'] = $request->MID ? $request->MID : '';
        $data['TXNID'] = $request->TXNID ? $request->TXNID : '';
        $data['TXNAMOUNT'] = $request->TXNAMOUNT ? $request->TXNAMOUNT : '';
        $data['PAYMENTMODE'] = $request->PAYMENTMODE ? $request->PAYMENTMODE : '';
        $data['CURRENCY'] = $request->CURRENCY ? $request->CURRENCY : '';
        $data['TXNDATE'] = $request->TXNDATE ? $request->TXNDATE : '';
        $data['STATUS'] = $request->STATUS ? $request->STATUS : '';
        $data['RESPCODE'] = $request->RESPCODE ? $request->RESPCODE : '';
        $data['RESPMSG'] = $request->RESPMSG ? $request->RESPMSG : '';
        $data['GATEWAYNAME'] = $request->GATEWAYNAME ? $request->GATEWAYNAME : '';
        $data['BANKTXNID'] = $request->BANKTXNID ? $request->BANKTXNID : '';
        $data['BANKNAME'] = $request->BANKNAME ? $request->BANKNAME : '';

        return view('payment_responce', $data);
	}

}
