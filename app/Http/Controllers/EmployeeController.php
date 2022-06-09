<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class EmployeeController extends Controller
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
            $employees = DB::table('employees')
                ->join('users', 'employees.user_id', '=', 'users.user_id')
                ->whereBetween('date_hired', [$from, $to])
                ->orWhereBetween('birthdate', [$from, $to])
                ->get();
            return view('employees.index', compact('employees', 'from_len', 'to_len'));
        }

        if ($request->search) {
            $from_len = strlen($from);
            $to_len = strlen($to);
            $employees = DB::table('employees')
                ->join('users', 'employees.user_id', '=', 'users.user_id')
                ->where('last_name','like', '%' . $request->search . '%')
                ->orWhere('first_name','like', '%' . $request->search . '%')
                ->orWhere('address','like', '%' . $request->search . '%')
                ->orWhere('birthdate','like', '%' . $request->search . '%')
                ->orWhere('date_hired','like', '%' . $request->search . '%')
                ->get();
            return view('employees.index', compact('employees', 'from_len', 'to_len'));
        }

        $employees = DB::table('employees')
            ->join('users', 'employees.user_id', '=', 'users.user_id')
            ->paginate(4);
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */

    public function create()
    {
        $users = User::all();

        return view('employees.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EmployeeStoreRequest $request
     * @return RedirectResponse
     */

    public function store(EmployeeStoreRequest $request)
    {
        Employee::create($request->validated());

        return redirect()->route('employee.index')->with('message', 'Employee Add Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */

    public function edit(int $id)
    {
        $employee = Employee::find($id);

        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EmployeeUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */

    public function update(EmployeeUpdateRequest $request, int $id)
    {
        $employee = Employee::find($id);
        $employee->update([
            'address' => $request->address,
            'birthdate' => $request->birthdate,
            'date_hired' => $request->date_hired,
        ]);

        return redirect()->route('employee.index')->with('message', 'Employee Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */

    public function destroy(int $id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return redirect()->route('employee.index')->with('message', 'Employee Deleted Successfully');
    }
}
