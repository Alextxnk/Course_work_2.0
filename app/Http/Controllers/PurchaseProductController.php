<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseProductStoreRequest;
use App\Product;
use App\PurchaseProduct;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PurchaseProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */

    public function index(Request $request)
    {
        if ($request->search) {
            $purchase_products = DB::table('purchase_products')
                ->join('products', 'purchase_products.product_id', '=', 'products.product_id')
                ->where('purchase_quantity','like', '%' . $request->search . '%')
                ->orWhere('purchase_amount','like', '%' . $request->search . '%')
                ->orWhere('product_name','like', '%' . $request->search . '%')
                ->orWhere('purchase_price','like', '%' . $request->search . '%')
                ->get();
            return view('purchase_products.index', compact('purchase_products'));
        }

        $purchase_products = DB::table('purchase_products')
            ->join('products', 'purchase_products.product_id', '=', 'products.product_id')
            ->paginate(4);
        return view('purchase_products.index', compact('purchase_products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */

    public function create()
    {
        $products = Product::all();

        return view('purchase_products.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PurchaseProductStoreRequest $request
     * @return RedirectResponse
     */

    public function store(PurchaseProductStoreRequest $request)
    {
        PurchaseProduct::create($request->validated());

        return redirect()->route('purchase_product.index')->with('message', 'Purchase Product Add Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */

    public function edit(int $id)
    {
        $purchase_product = PurchaseProduct::find($id);

        return view('purchase_products.edit', compact('purchase_product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */

    public function update(Request $request, int $id)
    {
        $purchase_products = PurchaseProduct::find($id);
        $purchase_products->update([
            'purchase_quantity' => $request->purchase_quantity,
            'purchase_amount' => $request->purchase_amount,
        ]);

        return redirect()->route('purchase_product.index')->with('message', 'Purchase Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */

    public function destroy(int $id)
    {
        $purchase_products = PurchaseProduct::find($id);
        $purchase_products->delete();

        return redirect()->route('purchase_product.index')->with('message', 'Purchase Product Deleted Successfully');
    }
}
