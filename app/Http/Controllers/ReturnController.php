<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Car;
use App\Models\ReturnModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;

class ReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $return = ReturnModel::with('booking.car', 'booking.user')->orderBy('created_at', 'DESC')->get();

        return view('returns.index', compact('return'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $availableCars = Car::where('available', false)->get();
        return view('returns.create', compact('availableCars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'car_id' => 'required'
        ])->validate();

        $car = Car::where('id', $request->car_id)->first();
        if (!$car) {
            return back()->with('error', 'Mobil tidak tersedia.');
        }

        $booking = Booking::where('car_id', $car->id)->first();
        if (!$booking) {
            return back()->with('error', 'Tidak ada peminjaman aktif untuk mobil ini.');
        }

        $return_date = date('Y-m-d');
        $startDate = Carbon::parse($booking->start_date);
        $endDate = Carbon::parse($return_date);

        $rentalDays = $startDate->diffInDays($endDate);

        $rentalFee = $rentalDays * floatval($car->rental_rate);

        ReturnModel::create([
            'booking_id' => $booking->id,
            'return_date' => $endDate,
            'rental_fee' => $rentalFee,
        ]);

        $car->available = true;
        $car->save();

        ReturnModel::create($request->all());

        return redirect()->route('returns')->with('success', 'Return added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $return = ReturnModel::findOrFail($id);
        return view('returns.show', compact('return'));
    }
}
