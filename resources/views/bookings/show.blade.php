@extends('layouts.app')
@section('title', 'Show Peminjaman')
@section('contents')
    <h1 class="mb-0">Detail Peminjaman</h1>

    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Merek</label>
            <input type="text" class="form-control" placeholder="DD/MM/YYYY" value="{{ $booking->car->brand }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Model</label>
            <input type="text" class="form-control" placeholder="DD/MM/YYYY" value="{{ $booking->car->model }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Nomor Flat</label>
            <input type="text" class="form-control" placeholder="" value="{{ $booking->car->plate_number }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Start Date</label>
            <input type="text" class="form-control" placeholder="DD/MM/YYYY"
                value="{{ date('d/m/Y', strtotime($booking->start_date)) }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">End Date</label>
            <input type="text" class="form-control" placeholder="DD/MM/YYYY"
                value="{{ date('d/m/Y', strtotime($booking->end_date)) }}" readonly>
        </div>
    </div>
@endsection
