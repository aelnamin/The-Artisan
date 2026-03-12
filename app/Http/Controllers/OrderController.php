<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Log; // Add this line
use App\Notifications\OrderPlaced;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validate incoming data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'phone' => ['required', 'string', 'regex:/^(\\+?60|0)[0-9]{8,10}$/'],
            'address' => 'required|string|min:10',
            'notes' => 'nullable|string',
            'items' => 'required|array|min:1',
            'items.*.key' => 'required|string',
            'items.*.name' => 'required|string',
            'items.*.size' => 'required|in:10ml,30ml',
            'items.*.price' => 'required|numeric|min:0',
            'items.*.qty' => 'required|integer|min:1',
            'total' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Create order
        $order = Order::create([
            'customer_name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'notes' => $request->notes,
            'total' => $request->total,
            'items' => $request->items,
            'status' => 'pending',
        ]);

        // Send email notification to customer
        Notification::route('mail', $order->email)
            ->notify(new OrderPlaced($order));

        // Optional: Send email to admin
        // Notification::route('mail', 'admin@theartisanparfum.my')
        //     ->notify(new OrderPlaced($order));

        // Optional: WhatsApp placeholder – you can integrate a service like Twilio later
        // For now, just log that WhatsApp would be sent
        Log::info('WhatsApp notification would be sent to ' . $order->phone);

        return response()->json([
            'success' => true,
            'message' => 'Pesanan diterima!',
            'order_id' => $order->id
        ]);
    }
}