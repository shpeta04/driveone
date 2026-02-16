<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function home(){
        $featuredCars = Car::where('is_sold', false)
            ->latest()
            ->take(6)
            ->get();

        return view('home', compact('featuredCars'));

    }
    public function index(Request $request)
    {
        $query = Car::query();

        if ($request->brand) {
            $query->where('brand', 'like', '%' . $request->brand . '%');
        }

        if ($request->min_price) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->max_price) {
            $query->where('price', '<=', $request->max_price);
        }

        if ($request->year) {
            $query->where('year', $request->year);
        }

        if ($request->fuel_type) {
            $query->where('fuel_type', $request->fuel_type);
        }

        if ($request->transmission) {
            $query->where('transmission', $request->transmission);
        }

        if ($request->sort === 'price_low') {
            $query->orderBy('price');
        } elseif ($request->sort === 'price_high') {
            $query->orderByDesc('price');
        } else {
            $query->latest();
        }

        $cars = $query->paginate(9);

        return view('cars.index', compact('cars'));
    }

public function show(Car $car){
$car->load('images');
    $similarCars = Car::where('id', '!=', $car->id)
            ->where('brand', $car->brand)
            ->where('is_sold', false)
            ->take(3)
            ->get();
    return view('cars.show', compact('car', 'similarCars'));
}

    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string'
        ]);

        return back()->with('success', 'Your message has been sent successfully.');
    }
    public function contact(){
        return view('contact');
    }

}
