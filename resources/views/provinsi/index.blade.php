@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Provinsi') }}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <a href="{{ route('provinsi.create') }}" class="btn btn-success mb-2">Create</a>
                        <table class="table">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kode</th>
                                    <th scope="col">Nama Provinsi</th>
                                    <th scope="col">Active</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $provinsi as $val)
                                <tr class="text-center">
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $val->kode }}</td>
                                    <td>{{ $val->nama_provinsi }}</td>
                                    <td class="{{ $val->active ? "text-success" : "text-danger" }}">{{ $val->active ? "Active" : "Tidak Aktif" }}
                                    </td>
                                    <td>
                                        <a href="{{ route('provinsi.edit',$val->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('provinsi.destroy',$val->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?');">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $provinsi->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
