<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve a list of orders
        $orders = Order::paginate(8);
        // Display the orders in a view
        return view('admin.orders.index', compact('orders'));
    }


    public function search(Request $request)
    {
        // Get the search query from the request
        $query = $request->input('query');
        // Perform a search query on the 'phone' field of the related user
//      $orders = DB::select("SELECT * FROM orders as o JOIN users as u ON o.user_id = u.id WHERE u.phone LIKE '%$query%' ");
        $orders = Order::whereHas('user', function ($queryBuilder) use ($query) {
            $queryBuilder->where('phone', 'LIKE', "%$query%");
        })
        ->orWhere('id', 'LIKE', "%$query%")
        ->get();


        // Return the search results to a view
        return view('admin.orders.search', compact('orders'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Display a form for creating a new order
        return view('admin.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate and store the new order in the database
        $validatedData = $request->validate([
            // Define your validation rules here
        ]);

        $order = Order::create($validatedData);

        return redirect()->route('admin.orders.show', $order)->with('success', 'Order created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        // Display the details of a specific order
//        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::find($id); // Retrieve the user by ID
        return view('admin.orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::find($id);
        $order->deliveryMethod = $request->deliveryStatus;
        $order->status = $request->orderStatus;
        $order->save();
        return redirect()->route('orders.index')->with('success', 'Order updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Delete the order from the database
        $order = Order::find($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully');
    }
}
