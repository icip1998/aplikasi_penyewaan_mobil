<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Car;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $booking = Booking::orderBy('created_at', 'DESC')->get();

        return view('bookings.index', compact('booking'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $availableCars = Car::where('available', true)->get();
        return view('bookings.create', compact('availableCars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'car_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ])->validate();

        $car = Car::findOrFail($request->car_id);
        if (!$car->available) {
            return back()->with('error', 'Mobil tidak tersedia.');
        }

        $userId = Auth::id();

        Booking::create([
            'user_id' => $userId,
            'car_id' => $request->car_id,
            'start_date' => date('Y-m-d', strtotime($request->start_date)),
            'end_date' => date('Y-m-d', strtotime($request->end_date)),
        ]);

        // Set status ketersediaan mobil menjadi tidak tersedia
        $car->available = false;
        $car->save();

        Booking::create($request->all());

        return redirect()->route('bookings')->with('success', 'Booking added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $booking = Booking::findOrFail($id);
        $availableCars = Car::where('available', true)->get();

        return view('bookings.show', compact('booking', 'availableCars'));
    }
}
