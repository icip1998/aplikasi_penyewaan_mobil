@extends('layouts.app')
@section('title', 'Show Mobil')
@section('contents')
    <h1 class="mb-0">Detail Mobil</h1>

    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Merek</label>
            <input type="text" class="form-control" value="{{ $car->brand }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Model</label>
            <input type="text" class="form-control" value="{{ $car->model }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Nomor Flat</label>
            <input type="text" class="form-control" value="{{ $car->plate_number }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Nomor Flat</label>
            <input type="text" name="product_code" class="form-control" placeholder="Mobil Code"
                value="{{ $car->plate_number }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Tersedia</label>
            <input type="text" name="product_code" class="form-control" placeholder="Mobil Code"
                value="{{ $car->available ? 'Ya' : 'Tidak' }}" readonly>
        </div>
    </div>
@endsection
