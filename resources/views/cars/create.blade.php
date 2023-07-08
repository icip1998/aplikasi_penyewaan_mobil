@extends('layouts.app')
@section('title', 'Create Mobil')
@section('contents')
    <h1 class="mb-0">Add Mobil</h1>

    <hr />
    <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12 border-right">
                <div class="p-3 py-2">
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="labels">Merek</label>
                                <input name="brand" type="text"
                                    class="form-control form-control-user @error('brand')is-invalid @enderror"
                                    id="brand" placeholder="Merek">
                                @error('brand')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="labels">Model</label>
                                <input name="model" type="text"
                                    class="form-control form-control-user @error('model')is-invalid @enderror"
                                    id="model" placeholder="Merek">
                                @error('model')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="labels">Nomor Flat</label>
                                <input name="plate_number" type="text"
                                    class="form-control form-control-user @error('plate_number')is-invalid @enderror"
                                    id="plate_number" placeholder="Nomor Flat">
                                @error('plate_number')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="labels">Tarif Sewa Perhari</label>
                                <input name="rental_rate" type="number"
                                    class="form-control form-control-user @error('rental_rate')is-invalid @enderror"
                                    id="rental_rate" placeholder="0">
                                @error('rental_rate')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="labels">Tersedia</label>
                                <select name="available" id="available"
                                    class="form-control @error('plate_number')is-invalid @enderror">
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                                @error('available')
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
