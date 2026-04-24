<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Order::with(['product', 'user']);

        if (auth()->user()->is_admin) {
            $orders = $query->latest()->paginate(10);

        } else {
            $orders = $query->where('user_id', auth()->id())->latest()->paginate(10);

        }

        return view('orders.all', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => ['required', 'integer', 'min:1', 'max:100'],
        ], [
            'quantity.required' => 'Quantity is Required.',
            'quantity.integer' => 'Quantity Should Be 1 To 100.',
        ]);

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->product_id = $request->product_id;
        $order->quantity = $request->quantity;
        $order->save();

        return redirect()->back()->with('success', 'New Order Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) // Update = Complete
    {
        $order = Order::findOrFail($id);
        $order->status = "completed";
        $order->save();
        // $order->delete();
        return redirect()->back()->with('success', 'The Order Completed Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id) // Destroy = Cancel
    {
        $order = Order::findOrFail($id);
        $order->status = "canceled";
        $order->save();
        // $order->delete();
        return redirect()->back()->with('success', 'The Order Canceled Successfully!');
    }
}
