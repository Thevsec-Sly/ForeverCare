<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\drug;
use Database\Factories\DrugAdministrationFactory;

class drugController extends Controller
{
    public function index(Request $request)
{

        $query = drug::query();
    // If search term exists, filter results
    if ($request->has('search') && $request->search != '') {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('size', 'like', "%{$search}%")
              ->orWhere('expiry_date', 'like', "%{$search}%");
            //   ->orWhere('address', 'like', "%{$search}%");
    });
    }

    $totalDrugs = Drug::count();
    $drugs = $query->latest()->paginate(30);
    return view('drugs.index', compact('drugs', 'totalDrugs'));
}



public function show($id)
{
    $drug = Drug::findOrFail($id);
    return view('drugs.show', compact('drug'));
}


public function create()
{
    return view('drugs.create');
}


public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'type' => 'nullable|string|max:100',
        'description' => 'nullable|string',
        'stock' => 'required|integer|min:0',
    ]);

    Drug::create($validated);

    return redirect()->route('drugs.index')->with('success', 'Drug added successfully.');
}
}
