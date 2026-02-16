<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::latest()->get();
        return view('admin.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'brand' => 'required|string',
            'model' => 'required|string',
            'year' => 'nullable|integer',
            'mileage' => 'nullable|integer',
            'fuel_type' => 'required',
            'transmission' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);
        $data['slug'] = Str::slug($data['title']) . '-' . uniqid();

        Car::create($data);

        return redirect()->route('admin.cars.index')
            ->with('success', 'Car added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'brand' => 'required|string',
            'model' => 'required|string',
            'year' => 'nullable|integer',
            'mileage' => 'nullable|integer',
            'fuel_type' => 'required',
            'transmission' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'is_sold' => 'nullable|boolean',
        ]);
        $data['slug'] = Str::slug($data['title']) . '-' . $car->id;
        $car->update($data);
        return redirect()->route('admin.cars.index')
            ->with('success', 'Car updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('admin.cars.index')
            ->with('success', 'Car deleted successfully');
    }
}
