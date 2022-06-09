<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionStoreRequest;
use App\OrderProduct;
use App\PurchaseProduct;
use App\Transaction;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */

    public function index(Request $request)
    {
        if ($request->search) {
            $transactions = DB::table('transactions')
                ->join('purchase_products', 'transactions.purchase_product_id', '=', 'purchase_products.purchase_product_id')
                ->join('order_products', 'transactions.order_product_id', '=', 'order_products.order_product_id')
                ->where('appointment','like', '%' . $request->search . '%')
                ->orWhere('order_quantity','like', '%' . $request->search . '%')
                ->orWhere('order_amount','like', '%' . $request->search . '%')
                ->orWhere('purchase_quantity','like', '%' . $request->search . '%')
                ->orWhere('purchase_amount','like', '%' . $request->search . '%')
                ->get();
            return view('transactions.index', compact('transactions'));
        }

        $transactions = DB::table('transactions')
            ->join('purchase_products', 'transactions.purchase_product_id', '=', 'purchase_products.purchase_product_id')
            ->join('order_products', 'transactions.order_product_id', '=', 'order_products.order_product_id')
            ->paginate(4);
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */

    public function create()
    {
        $order_products = OrderProduct::all();
        $purchase_products = PurchaseProduct::all();

        return view('transactions.create', compact('order_products', 'purchase_products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TransactionStoreRequest $request
     * @return RedirectResponse
     */

    public function store(TransactionStoreRequest $request)
    {
        Transaction::create($request->validated());

        return redirect()->route('transaction.index')->with('message', 'Transaction Add Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */

    public function edit(int $id)
    {
        $transaction = Transaction::find($id);

        return view('transactions.edit', compact('transaction'));
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
        $transaction = Transaction::find($id);
        $transaction->update([
            'appointment' => $request->appointment,
        ]);

        return redirect()->route('transaction.index')->with('message', 'Transaction Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */

    public function destroy(int $id)
    {
        $transaction = Transaction::find($id);
        $transaction->delete();

        return redirect()->route('transaction.index')->with('message', 'Transaction Deleted Successfully');
    }
}
