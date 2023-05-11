@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Kelurahan') }}</div>

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
                        <a href="{{ route('kelurahan.create') }}" class="btn btn-success mb-2">Create</a>
                        <table class="table">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kode</th>
                                    <th scope="col">Nama Kelurahan</th> 
                                    <th scope="col">Nama Kecamatan</th>
                                    <th scope="col">Active</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $kelurahan as $val)
                                <tr class="text-center">
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $val->kode }}</td>
                                    <td>{{ $val->nama_kelurahan }}</td>
                                    <td>{{ $val->kecamatan->nama_kecamatan }}</td>
                                    <td class="{{ $val->active ? "text-success" : "text-danger" }}">{{ $val->active ? "Active" : "Tidak Aktif" }}
                                    </td>
                                    <td>
                                        <a href="{{ route('kelurahan.edit',$val->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('kelurahan.destroy',$val->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?');">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $kelurahan->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
