@extends('layouts.app')
@section('title', 'Create Pengembalian')
@section('contents')
    <h1 class="mb-0">Add Pengembalian</h1>

    <hr />

    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif

    <form action="{{ route('returns.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12 border-right">
                <div class="p-3 py-2">
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="labels">Mobil</label>
                                <select name="car_id"
                                    class="form-control form-control-user @error('car_id')is-invalid @enderror"
                                    id="car_id" placeholder="Mobil">
                                    <option value="">Pilih Mobil</option>
                                    @if ($availableCars->count() > 0)
                                        @foreach ($availableCars as $car)
                                            <option value="{{ $car->id }}">{{ $car->brand }} {{ $car->model }}
                                                {{ $car->car_id }}</option>
                                        @endforeach
                                    @else
                                        <option>Tidak ada mobil yang tersedia saat ini.</option>
                                    @endif
                                </select>

                                @error('car_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 text-center">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
