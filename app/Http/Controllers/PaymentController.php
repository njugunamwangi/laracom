<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Facades\Paystack;

//use Paystack;

class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        $data = $paymentDetails['data'];

        $payment =  Payment::create([
            'status' => $paymentDetails['status'],
            'message' => $paymentDetails['message'],
            'paymentId' => $data['id'],
            'order_id' => $data['metadata']['order_id'],
            'user_id' => $data['metadata']['user_id'],
            'domain' => $data['domain'],
            'gateway_response' => $data['gateway_response'],
            'reference' => $data['reference'],
            'currency' => $data['currency'],
            'ip_address' => $data['ip_address'],
            'amount' => $data['amount'] / 100,
            'channel' => $data['channel'],
        ]);

        if($payment) {
            return redirect()->to('orders');
        }
    }
}
