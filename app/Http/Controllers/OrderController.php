<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Fixer;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $fixers = match($request->sort) {
            // 'ascId' => Fixer::orderBy('id', 'asc')->get(),
            // 'descId' => Fixer::orderBy('id', 'desc')->get(),
            // 'ascName' => Fixer::orderBy('name', 'asc')->get(),
            // 'descName' => Fixer::orderBy('name', 'desc')->get(),
            // 'ascSurname' => Fixer::orderBy('surname', 'asc')->get(),
            // 'descSurname' => Fixer::orderBy('surname', 'desc')->get(), 
            // 'ascRating' => Fixer::orderBy('rating', 'asc')->get(),
            // 'descRating' => Fixer::orderBy('rating', 'desc')->get(), 
            // 'ascCompany' => Fixer::orderBy('company_id', 'asc')->get(),
            // 'descCompany' => Fixer::orderBy('company_id', 'desc')->get(),
        //     default => Fixer::all()
        // };

        $orders = Order::all();

        return view('order.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fixers = Fixer::all();
        $services = Service::all();

        return view('order.create', ['fixers' => $fixers, 'services'  => $services ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order;

        $order->user_id = Auth::user()->id;
        $order->fixer_id = $request->create_order_fixer_id;
        $order->service_id = $request->create_order_service_id;
        $order->status = 0; 
        $order->save();

        return redirect()->route('orders-index')->with('success', 'Created new order!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(int $orderId)
    {
        $order = Order::where('id', $orderId)->first();

        return view('order.show', ['order' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $fixers = Fixer::all();
        $services = Service::all();
        $users = User::all();

        return view('order.edit', ['order' => $order, 'users' => $users, 'fixers' => $fixers, 'services' => $services]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->user_id = $request->order_user_id;
        $order->fixer_id = $request->order_fixer_id;
        $order->service_id = $request->order_service_id;
        $order->status = $request->order_status;

        $order->save();

        return redirect()->route('orders-index')->with('success', 'Order updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders-index')->with('delete', 'Order deleted!');
   }
}