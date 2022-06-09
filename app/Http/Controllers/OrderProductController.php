<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderProductStoreRequest;
use App\Http\Requests\OrderProductUpdateRequest;
use App\Order;
use App\OrderProduct;
use App\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */

    public function index(Request $request)
    {

        if ($request->search) {
            $order_products = DB::table('order_products')
                //->join('orders', 'order_products.order_id', '=', 'orders.order_id')
                ->join('products', 'order_products.product_id', '=', 'products.product_id')
                ->where('order_quantity','like', '%' . $request->search . '%')
                ->orWhere('order_amount','like', '%' . $request->search . '%')
                ->orWhere('product_name','like', '%' . $request->search . '%')
                ->orWhere('selling_price','like', '%' . $request->search . '%')
                ->get();
            return view('order_products.index', compact('order_products'));
        }

        $order_products = DB::table('order_products')
            //->join('orders', 'order_products.order_id', '=', 'orders.order_id')
            ->join('products', 'order_products.product_id', '=', 'products.product_id')
            ->paginate(4);
        return view('order_products.index', compact('order_products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */

    public function create()
    {
        //$orders = Order::all();
        $products = Product::all();

        return view('order_products.create', compact( 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param OrderProductStoreRequest $request
     * @return RedirectResponse
     */

    public function store(OrderProductStoreRequest $request)
    {
        /*$selling_price = $request->selling_price;
        $quantity = $request->quantity;
        $amount = $selling_price * $quantity;

        OrderProduct::create([
        'product_id' => $request->product_id,
        'quantity' => $request->quantity,
        'amount' => $amount,
        ]);*/

        OrderProduct::create($request->validated());

        return redirect()->route('order_product.index')->with('message', 'Order Product Add Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */

    public function edit(int $id)
    {
        $order_product = OrderProduct::find($id);

        return view('order_products.edit', compact('order_product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param OrderProductUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */

    public function update(OrderProductUpdateRequest $request, int $id)
    {
        $order_products = OrderProduct::find($id);
        $order_products->update([
            'order_quantity' => $request->order_quantity,
            'order_amount' => $request->order_amount,
        ]);

        return redirect()->route('order_product.index')->with('message', 'Order Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */

    public function destroy(int $id)
    {
        $order_products = OrderProduct::find($id);
        $order_products->delete();

        return redirect()->route('order_product.index')->with('message', 'Order Product Deleted Successfully');
    }
}
