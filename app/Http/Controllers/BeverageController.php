<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Beverage;

class BeverageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $pageTitle = 'Beverage Section';

    $perPage = $request->input('per_page', 5);

    $search = $request->input('search');

    $query = Beverage::query();

    if ($search) {
        $query->where('item_name', 'like', '%' . $search . '%');
    }

    $beverages = $query->paginate($perPage);

    return view('beverage.index', [
        'pageTitle' => $pageTitle,
        'beverages' => $beverages
    ]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Create Item';

        return view('beverage.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'item_name' => 'required',
            'current_quantity' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ELOQUENT
        $beverage = New Beverage;
        $beverage->item_name = $request->item_name;
        $beverage->current_quantity = $request->current_quantity;
        $beverage->save();


        return redirect()->route('beverages.index');
    }

    /**
     * Display the specified resource.
     */

    public function edit(string $id)
    {
        $pageTitle = 'Edit Item';

        // ELOQUENT
        $beverage = Beverage::find($id);

        if (!$beverage) {
            // Handle the case where the beverage is not found
            return redirect()->route('beverages.index')->with('error', 'Beverage not found.');
        }

        return view('beverage.edit', compact('pageTitle', 'beverage',));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'item_name' => 'required',
            'current_quantity' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ELOQUENT
        $beverage = Beverage::find($id);
        if (!$beverage) {
            return response()->json(['error' => 'Beverage not found'], 404);
        }

        $beverage->item_name = $request->item_name;
        $beverage->current_quantity = $request->current_quantity;
        $beverage->save();

        return redirect()->route('beverages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        // ELOQUENT
        Beverage::find($id)->delete();

        return redirect()->route('beverages.index');
    }
}
