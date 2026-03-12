<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function checkout(Order $order)
    {
        // Prepare bill data for ToyyibPay
        $billData = [
            'userSecretKey' => env('TOYYIBPAY_SECRET_KEY'),
            'categoryCode' => env('TOYYIBPAY_CATEGORY_CODE'),
            'billName' => 'Pesanan The Artisan',
            'billDescription' => 'Pesanan #' . $order->id,
            'billPriceSetting' => 1,
            'billPayorInfo' => 1,
            'billAmount' => $order->total * 100, // ToyyibPay uses cents
            'billReturnUrl' => route('payment.callback'),
            'billCallbackUrl' => route('payment.callback'),
            'billExternalReferenceNo' => $order->id,
            'billTo' => $order->customer_name,
            'billEmail' => $order->email,
            'billPhone' => $order->phone,
        ];

        // Send request to ToyyibPay
        $response = Http::asForm()->post('https://toyyibpay.com/index.php/api/createBill', $billData);

        if ($response->successful()) {
            $result = $response->json();
            if (isset($result[0]['BillCode'])) {
                // Redirect user to ToyyibPay payment page
                return redirect()->away('https://toyyibpay.com/' . $result[0]['BillCode']);
            }
        }

        // If bill creation fails, show error
        return back()->with('error', 'Unable to create bill. Please try again.');
    }

    public function callback(Request $request)
    {
        // ToyyibPay sends payment status via POST
        $status = $request->input('status_id');
        $orderId = $request->input('bill_external_reference_no');
        $transactionId = $request->input('transaction_id');
        $billCode = $request->input('billcode');

        $order = Order::find($orderId);
        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        // Update order status based on payment result
        if ($status == 1) { // 1 = successful
            $order->status = 'paid';
        } else {
            $order->status = 'payment_failed';
        }
        $order->save();

        // Optional: store transaction details in a payments table

        // Redirect user to a thank‑you or home page
        return redirect('/')->with('message', 'Payment status updated.');
    }
}