<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseStoreRequest;
use App\Http\Requests\PurchaseUpdateRequest;
use App\Purchase;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PurchaseController extends Controller
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
            $purchases = DB::table('purchases')
                ->whereBetween('date', [$from, $to])
                ->get();
            return view('purchases.index', compact('purchases', 'from_len', 'to_len'));
        }

        if ($request->search) {
            $from_len = strlen($from);
            $to_len = strlen($to);
            $purchases = DB::table('purchases')
                ->where('date', 'like', '%' . $request->search . '%')
                ->orWhere('status', 'like', '%' . $request->search . '%')
                ->orWhere('provider', 'like', '%' . $request->search . '%')
                ->get();
            return view('purchases.index', compact('purchases', 'from_len', 'to_len'));
        }

        $purchases = DB::table('purchases')
            ->paginate(4);
        return view('purchases.index', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */

    public function create()
    {
        return view('purchases.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PurchaseStoreRequest $request
     * @return RedirectResponse
     */

    public function store(PurchaseStoreRequest $request)
    {
        Purchase::create($request->validated());

        return redirect()->route('purchase.index')->with('message', 'Purchase Add Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */

    public function edit(int $id)
    {
        $purchase = Purchase::find($id);

        return view('purchases.edit', compact('purchase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PurchaseUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */

    public function update(PurchaseUpdateRequest $request, int $id)
    {
        $purchase = Purchase::find($id);
        $purchase->update([
            'date' => $request->date,
            'status' => $request->status,
            'provider' => $request->provider,
        ]);

        return redirect()->route('purchase.index')->with('message', 'Purchase Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */

    public function destroy(int $id)
    {
        $purchase = Purchase::find($id);
        $purchase->delete();

        return redirect()->route('purchase.index')->with('message', 'Purchase Deleted Successfully');
    }
}
