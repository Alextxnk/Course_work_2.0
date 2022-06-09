<?php

namespace App\Http\Controllers;

use App\Buyer;
use App\Http\Requests\OrderStoreRequest;
use App\Http\Requests\OrderUpdateRequest;
use App\Order;
use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */

    public function index(Request $request)
    {
        $from = $request->from;
        $to = $request->to;

        if ($request->from && $request->to) {
            $from_len = strlen($from);
            $to_len = strlen($to);
            $orders = DB::table('orders')
                ->join('buyers', 'orders.buyer_id', '=', 'buyers.buyer_id')
                ->whereBetween('date', [$from, $to])
                ->get();
            return view('orders.index', compact('orders', 'from_len', 'to_len'));
        }

        if ($request->search) {
            $from_len = strlen($from);
            $to_len = strlen($to);
            $orders = DB::table('orders')
                //->join('users', 'orders.user_id', '=', 'users.user_id')
                ->join('buyers', 'orders.buyer_id', '=', 'buyers.buyer_id')
                ->where('last_name','like', '%' . $request->search . '%')
                ->orWhere('first_name','like', '%' . $request->search . '%')
                //->orWhere('post_name','like', '%' . $request->search . '%')
                ->orWhere('date','like', '%' . $request->search . '%')
                ->orWhere('status','like', '%' . $request->search . '%')
                ->get();
            return view('orders.index', compact('orders', 'from_len', 'to_len'));
        }

        $orders = DB::table('orders')
            //->join('users', 'orders.user_id', '=', 'users.user_id')
            ->join('buyers', 'orders.buyer_id', '=', 'buyers.buyer_id')
            ->paginate(4);
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */

    public function create()
    {
        //$users = User::all();
        $buyers = Buyer::all();

        return view('orders.create', compact( 'buyers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param OrderStoreRequest $request
     * @return RedirectResponse
     */

    public function store(OrderStoreRequest $request)
    {
        Order::create($request->validated());

        return redirect()->route('order.index')->with('message', 'Order Add Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */

    public function edit(int $id)
    {
        $order = Order::find($id);

        return view('orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param OrderUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */

    public function update(OrderUpdateRequest $request, int $id)
    {
        $order = Order::find($id);
        $order->update([
            'date' => $request->date,
            'status' => $request->status,
        ]);

        return redirect()->route('order.index')->with('message', 'Order Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */

    public function destroy(int $id)
    {
        $order = Order::find($id);
        $order->delete();

        return redirect()->route('order.index')->with('message', 'Order Deleted Successfully');
    }
}
