<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Car;
use App\Models\ReturnModel;
use Illuminate\Support\Facades\Validator;

class ReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $return = ReturnModel::with('booking')->orderBy('created_at', 'DESC')->get();

        return view('returns.index', compact('return'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bookings = Booking::orderBy('created_at', 'DESC')->get();
        return view('returns.create', compact('bookings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'plate_number' => 'required'
        ])->validate();

        $car = Car::where('plate_number', $request->plate_number)->first();
        if (!$car) {
            return back()->with('error', 'Mobil tidak tersedia.');
        }

        $booking = Booking::where('car_id', $car->id)->whereNull('return_date')->first();
        if (!$booking) {
            return back()->with('error', 'Tidak ada peminjaman aktif untuk mobil ini.');
        }

        $startDate = $booking->start_date;
        $endDate = $request->input('return_date', now()->toDateString());
        $rentalDays = $startDate->diffInDays($endDate);

        $rentalFee = $rentalDays * floatval($car->rental_rate);

        ReturnModel::create([
            'booking_id' => $booking->id,
            'return_date' => $endDate,
            'rental_fee' => $rentalFee,
        ]);

        $car->available = true;
        $car->save();

        Booking::create($request->all());

        return redirect()->route('returns')->with('success', 'Booking added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $return = Booking::findOrFail($id);
        $availableCars = Car::where('available', true)->get();

        return view('returns.show', compact('return', 'availableCars'));
    }
}
