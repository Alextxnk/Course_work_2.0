<?php

namespace App\Http\Controllers;

use App\Buyer;
use App\Http\Requests\BuyerStoreRequest;
use App\Http\Requests\BuyerUpdateRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */

    public function index(Request $request)
    {
        if ($request->search) {
            $buyers = DB::table('buyers')
                ->where('first_name', 'like', '%' . $request->search . '%')
                ->orWhere('last_name', 'like', '%' . $request->search . '%')
                ->orWhere('address', 'like', '%' . $request->search . '%')
                ->orWhere('phone', 'like', '%' . $request->search . '%')
                ->get();
            return view('buyers.index', compact('buyers'));
        }

        $buyers = DB::table('buyers')
            ->paginate(4);
        return view('buyers.index', compact('buyers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */

    public function create()
    {
        return view('buyers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BuyerStoreRequest $request
     * @return RedirectResponse
     */

    public function store(BuyerStoreRequest $request)
    {
        Buyer::create($request->validated());

        return redirect()->route('buyer.index')->with('message', 'Buyer Add Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */

    public function edit(int $id)
    {
        $buyer = Buyer::find($id);

        return view('buyers.edit', compact('buyer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BuyerUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */

    public function update(BuyerUpdateRequest $request, int $id)
    {
        $buyer = Buyer::find($id);
        $buyer->update([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return redirect()->route('buyer.index')->with('message', 'Buyer Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */

    public function destroy(int $id)
    {
        $buyer = Buyer::find($id);
        $buyer->delete();

        return redirect()->route('buyer.index')->with('message', 'Buyer Deleted Successfully');
    }
}
