<?php

namespace App\Http\Controllers;

use App\Models\LaboratoryTest;
use Illuminate\Http\Request;

class LaboratoryTestController extends Controller
{
    public function index()
    {
        return view('admin.laboratory-test.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.laboratory-test.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:laboratory_tests,name',
            'image' => 'nullable|image',
            'price' => 'required|numeric|min:0'
        ]);

        $laboratory_test = new LaboratoryTest();
        $laboratory_test->name = $request->name;
        $laboratory_test->price = $request->price;
        // $laboratory_test->image_url = $request->image_url;

        $laboratory_test->save();
        return redirect()->route('laboratory-test.index')->with('success', 'Laboratory Test is created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $laboratory_test = LaboratoryTest::findOrFail($id);
        return view('admin.laboratory-test.show', compact('laboratory_test'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $laboratory_test = LaboratoryTest::findOrFail($id);
        return view('admin.laboratory-test.edit', compact('laboratory_test'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:laboratory_tests,name,' . $id,
            'image' => 'nullable|image',
            'price' => 'required|numeric|min:0'
        ]);

        $laboratory_test = LaboratoryTest::findOrFail($id);
        $laboratory_test->name = $request->name;
        $laboratory_test->price = $request->price;
        // $laboratory_test->image_url = $request->image_url;

        $laboratory_test->save();
        return redirect()->route('laboratory-test.index')->with('success', 'Laboratory Test is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $laboratory_test = LaboratoryTest::findOrFail($id);
        $laboratory_test->delete();
        return redirect()->route('laboratory-test.index')->with('success','Laboratory Test is deleted');
    }
}
