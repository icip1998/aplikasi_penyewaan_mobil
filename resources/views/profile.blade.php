@extends('layouts.app')
@section('title', 'Profile')
@section('contents')
    <h1 class="mb-0">Profile</h1>

    <hr />

    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <form action="{{ route('profile_update', auth()->user()->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-12 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row" id="res"></div>
                    <div class="row mt-2">

                        <div class="col-md-6">
                            <label class="labels">Nama</label>
                            <input type="text" name="name" class="form-control" placeholder="first name"
                                value="{{ auth()->user()->name }}">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Email</label>
                            <input type="text" name="email" disabled class="form-control"
                                value="{{ auth()->user()->email }}" placeholder="Email">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Nomor Telepon</label>
                            <input type="text" name="phone_number" class="form-control" placeholder="Nomor Telepon"
                                value="{{ auth()->user()->phone_number }}">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Nomor SIM</label>
                            <input type="text" name="sim_number" class="form-control" placeholder="Nomor SIM"
                                value="{{ auth()->user()->sim_number }}">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <label class="labels">Address</label>
                            <textarea type="text" name="address" class="form-control" placeholder="Address">{{ auth()->user()->address }}</textarea>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <label class="labels">Password</label>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input name="password" type="password"
                                        class="form-control form-control-user @error('password')is-invalid @enderror"
                                        id="exampleInputPassword" placeholder="Password">
                                    @error('password')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input name="password_confirmation" type="password"
                                        class="form-control form-control-user @error('password_confirmation')is-invalid @enderror"
                                        id="exampleRepeatPassword" placeholder="Repeat Password">
                                    @error('password_confirmation')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center"><button id="btn" class="btn btn-primary profile-button"
                            type="submit">Save Profile</button></div>
                </div>
            </div>

        </div>

    </form>
@endsection
