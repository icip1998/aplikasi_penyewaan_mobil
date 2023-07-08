@extends('layouts.app')
@section('title', 'Home - Pengembalian')
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Pengembalian</h1>
        <a href="{{ route('returns.create') }}" class="btn btn-primary">Add Pengembalian</a>
    </div>

    <hr />

    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Pengguna</th>
                <th>Merek</th>
                <th>Model</th>
                <th>Nomor Flat</th>
                <th>Tangal Pengembalian</th>
                <th>Tarif Sewa</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($return->count() > 0)
                @foreach ($return as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->user->name }}</td>
                        <td class="align-middle">{{ $rs->car->brand }}</td>
                        <td class="align-middle">{{ $rs->car->model }}</td>
                        <td class="align-middle">{{ $rs->car->plate_number }}</td>
                        <td class="align-middle">{{ date('d/m/Y', strtotime($rs->return_date)) }}</td>
                        <td class="align-middle">{{ $rs->rental_fee }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('returns.show', $rs->id) }}" type="button"
                                    class="btn btn-secondary">Detail</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="7">Pengembalian not found</td>
                </tr>

            @endif
        </tbody>
    </table>
@endsection
