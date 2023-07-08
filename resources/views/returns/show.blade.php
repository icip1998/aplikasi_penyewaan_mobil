@extends('layouts.app')
@section('title', 'Show Pengembalian')
@section('contents')
    <h1 class="mb-0">Detail Pengembalian</h1>

    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Merek</label>
            <input type="text" class="form-control" placeholder="DD/MM/YYYY" value="{{ $return->booking->car->brand }}"
                readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Model</label>
            <input type="text" class="form-control" placeholder="DD/MM/YYYY" value="{{ $return->booking->car->model }}"
                readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Nomor Flat</label>
            <input type="text" class="form-control" placeholder="" value="{{ $return->booking->car->plate_number }}"
                readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Tangal Pengembalian</label>
            <input type="text" class="form-control" placeholder="DD/MM/YYYY"
                value="{{ date('d/m/Y', strtotime($return->return_date)) }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Tarif Sewa</label>
            <input type="text" class="form-control" placeholder="DD/MM/YYYY" value="{{ $return->rental_fee }}" readonly>
        </div>
    </div>
@endsection
