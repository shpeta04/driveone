<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $request->validate([
            'title' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp'
        ]);

        $car = Car::create([
            'title' => $request->title,
            'brand' => $request->brand,
            'model' => $request->model,
            'year' => $request->year,
            'mileage' => $request->mileage,
            'fuel_type' => $request->fuel_type,
            'transmission' => $request->transmission,
            'slug' => Str::slug($request->brand.'-'.$request->model.'-'.uniqid()),
        ]);

        // Save images
        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $file) {

                $path = $file->store('cars', 'public');

                CarImage::create([
                    'car_id' => $car->id,
                    'image' => $path
                ]);
            }

        }

        return redirect()
            ->route('admin.cars.index')
            ->with('success', 'Car created successfully');
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
        $car->load('images');

        return view('admin.cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $request->validate([
            'title' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp'
        ]);

        $car->update([
            'title' => $request->title,
            'brand' => $request->brand,
            'model' => $request->model,
            'year' => $request->year,
            'mileage' => $request->mileage,
            'fuel_type' => $request->fuel_type,
            'transmission' => $request->transmission,
        ]);

        // Upload new images
        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $file) {

                $path = $file->store('cars', 'public');

                CarImage::create([
                    'car_id' => $car->id,
                    'image' => $path
                ]);
            }
        }

        return back()->with('success', 'Car updated successfully');
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
    public function deleteImage(CarImage $image)
    {
        Storage::disk('public')->delete($image->image);

        $image->delete();

        return back()->with('success', 'Image deleted');
    }

}
