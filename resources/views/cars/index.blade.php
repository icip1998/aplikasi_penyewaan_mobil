@extends('layouts.app')
@section('title', 'Home - Mobil')
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Mobil</h1>
        <a href="{{ route('cars.create') }}" class="btn btn-primary">Add Mobil</a>
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
                <th>Merek</th>
                <th>Model</th>
                <th>Nomor Flat</th>
                <th>Tarif Sewa Perhari</th>
                <th>Tersedia</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($car->count() > 0)
                @foreach ($car as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->brand }}</td>
                        <td class="align-middle">{{ $rs->model }}</td>
                        <td class="align-middle">{{ $rs->plate_number }}</td>
                        <td class="align-middle">{{ $rs->rental_rate }}</td>
                        <td class="align-middle">{{ $rs->available ? 'Ya' : 'Tidak' }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('cars.show', $rs->id) }}" type="button"
                                    class="btn btn-secondary">Detail</a>
                                <a href="{{ route('cars.edit', $rs->id) }}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('cars.destroy', $rs->id) }}" method="POST" type="button"
                                    class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="7">Mobil not found</td>
                </tr>

            @endif
        </tbody>
    </table>
@endsection
