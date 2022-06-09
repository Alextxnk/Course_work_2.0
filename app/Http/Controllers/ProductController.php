<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostUpdateRequest;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */

    public function index(Request $request)
    {
        if ($request->search) {
            $products = DB::table('products')
                ->where('product_name', 'like', '%' . $request->search . '%')
                ->orWhere('quantity', 'like', '%' . $request->search . '%')
                ->orWhere('purchase_price', 'like', '%' . $request->search . '%')
                ->orWhere('selling_price', 'like', '%' . $request->search . '%')
                ->get();
            return view('products.index', compact('products'));
        }

        $products = DB::table('products')
            ->paginate(4);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */

    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductStoreRequest $request
     * @return RedirectResponse
     */

    public function store(ProductStoreRequest $request)
    {
        Product::create($request->validated());

        return redirect()->route('product.index')->with('message', 'Product Add Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */

    public function edit(int $id)
    {
        $product = Product::find($id);

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */

    public function update(ProductUpdateRequest $request, int $id)
    {
        $product = Product::find($id);
        $product->update([
            'product_name' => $request->product_name,
            'quantity' => $request->quantity,
            'purchase_price' => $request->purchase_price,
            'selling_price' => $request->selling_price,
        ]);

        return redirect()->route('product.index')->with('message', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */

    public function destroy(int $id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('product.index')->with('message', 'Product Deleted Successfully');
    }
}
