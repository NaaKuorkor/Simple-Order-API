<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        try {

            $data = $request->validate([
                'item_name' => 'required|string|max:255',
                'quantity' => 'required|integer|min:1',
                'customer_name' => 'required|string|max:255'
            ]);

            $order = Order::create([
                'item_name' => $data['item_name'],
                'quantity' => $data['quantity'],
                'customer_name' => $data['customer_name']
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Order created successfully',
                'order' => $order
            ]);
        } catch (Exception $e) {
            Log::error('Failed to create order', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'Order creation failed'
            ]);
        }
    }

    public function index()
    {

        $orders = Order::all();

        return response()->json($orders);
    }

    public function show(Order $order)
    {

        return response()->json($order);
    }

    public function statusUpdate(Request $request, Order $order)
    {

        try {
            $status = $request->validate([
                'status' => 'required|in:Pending,Confirmed,Delivered'
            ]);

            $order->update($status);

            return response()->json([
                'status' => 'success',
                'message' => 'Status updated successfully'
            ]);
        } catch (Exception $e) {
            Log::error('Failed to update order status', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'Status update failed'
            ]);
        }
    }
}
