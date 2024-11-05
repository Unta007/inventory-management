<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;
use App\Models\Position;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Employee List';

        // // QUERY BUILDER
        // $employees = DB::table('employees')
        //     ->select('employees.*', 'employees.id as employee_id', 'positions.name as position_name')
        //     ->leftJoin('positions', 'employees.position_id', '=', 'positions.id')
        //     ->get();

        // ELOQUENT
        $employees= Employee::all();

        return view('employee.index', [
            'pageTitle' => $pageTitle,
            'employees' => $employees
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Create Employee';

        // // QUERY BUILDER
        // $positions = DB::table('positions')->get();

        // ELOQUENT
        $positions = Position::all();


        return view('employee.create', compact('pageTitle', 'positions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'age' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // // QUERY BUILDER
        // DB::table('employees')->insert([
        //     'firstname' => $request->firstName,
        //     'lastname' => $request->lastName,
        //     'email' => $request->email,
        //     'age' => $request->age,
        //     'position_id' => $request->position,
        // ]);

        // ELOQUENT
        $employee = New Employee;
        $employee->firstname = $request->firstName;
        $employee->lastname = $request->lastName;
        $employee->email = $request->email;
        $employee->age = $request->age;
        $employee->position_id = $request->position;
        $employee->save();


        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pageTitle = 'Employee Detail';

        // // QuERY BUILDER
        // $employee = DB::table('employees')
        //     ->select('employees.*', 'positions.name as position_name', 'employees.id as employee_id') // Ensure employee_id is included
        //     ->leftJoin('positions', 'employees.position_id', '=', 'positions.id')
        //     ->where('employees.id', $id)
        //     ->first();

        // ELOQUENT
        $employee = Employee::find($id);


        if (!$employee) {
            // Handle the case where the employee is not found
            return redirect()->route('employees.index')->with('error', 'Employee not found.');
        }

        return view('employee.show', compact('pageTitle', 'employee'));
    }

    public function edit(string $id)
    {
        $pageTitle = 'Edit Employee';

        // // QUERY BUILDER
        // $employee = DB::table('employees')
        //     ->select('employees.*', 'positions.name as position_name', 'employees.id as employee_id') // Ensure employee_id is included
        //     ->leftJoin('positions', 'employees.position_id', '=', 'positions.id')
        //     ->where('employees.id', $id)
        //     ->first();

        // ELOQUENT
        $positions = Position::all(); $employee = Employee::find($id);

        if (!$employee) {
            // Handle the case where the employee is not found
            return redirect()->route('employees.index')->with('error', 'Employee not found.');
        }

        // Fetch all positions for the dropdown
        $positions = DB::table('positions')->get();

        return view('employee.edit', compact('pageTitle', 'employee', 'positions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'age' => 'required|numeric',
            'position' => 'required|exists:positions,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // // QUERY BUILDER
        // DB::table('employees')
        //     ->where('id', $id)
        //     ->update([
        //         'firstname' => $request->firstName,
        //         'lastname' => $request->lastName,
        //         'email' => $request->email,
        //         'age' => $request->age,
        //         'position_id' => $request->position,
        //     ]);

        // ELOQUENT
        $employee = Employee::find($id);
        $employee->firstname = $request->firstName;
        $employee->lastname = $request->lastName;
        $employee->email = $request->email;
        $employee->age = $request->age;
        $employee->position_id = $request->position;
        $employee->save();


        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // // QUERY BUILDER
        // DB::table('employees')
        //     ->where('id', $id)
        //     ->delete();

        // ELOQUENT
        Employee::find($id)->delete();


        return redirect()->route('employees.index');
    }
}
