<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Kitchen;

class KitchenController extends Controller
{
    function index(Request $request)
    {
        $pageTitle = 'Kitchen Section';

        $perPage = $request->input('per_page', 5);

        $search = $request->input('search');

        $query = Kitchen::query();

        if ($search) {
            $query->where('item_name', 'like', '%' . $search . '%');
        }

        $kitchens = $query->paginate($perPage);

        return view('kitchen.index', [
            'pageTitle' => $pageTitle,
            'kitchens' => $kitchens
        ]);
    }

    public function create()
    {
        $pageTitle = 'Create Item';

        return view('kitchen.create');
    }

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
        $kitchen = New Kitchen;
        $kitchen->item_name = $request->item_name;
        $kitchen->current_quantity = $request->current_quantity;
        $kitchen->save();


        return redirect()->route('kitchen.index');
    }

    public function edit(string $id)
    {
        $pageTitle = 'Edit Item';

        // ELOQUENT
        $kitchen = Kitchen::find($id);

        if (!$kitchen) {
            // Handle the case where the kitchen is not found
            return redirect()->route('kitchen.index')->with('error', 'Kitchen not found.');
        }

        return view('kitchen.edit', compact('pageTitle', 'kitchen',));
    }

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
        $kitchen = Kitchen::find($id);
        if (!$kitchen) {
            return response()->json(['error' => 'Kitchen not found'], 404);
        }

        $kitchen->item_name = $request->item_name;
        $kitchen->current_quantity = $request->current_quantity;
        $kitchen->save();

        return redirect()->route('kitchen.index');
    }

    public function destroy(string $id)
    {

        // ELOQUENT
        Kitchen::find($id)->delete();

        return redirect()->route('kitchen.index');
    }

}
