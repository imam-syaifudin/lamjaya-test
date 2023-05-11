@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Pegawai') }}</div>

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
                        <a href="{{ route('pegawai.create') }}" class="btn btn-success mb-2">Create</a>
                        <table class="table">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Pegawai</th>
                                    <th scope="col">Tempat Lahir</th> 
                                    <th scope="col">Tanggal Lahir</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Agama</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Kelurahan</th>
                                    <th scope="col">Kecamatan</th>
                                    <th scope="col">Provinsi</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $pegawai as $val)
                                <tr class="text-center">
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $val->nama_pegawai }}</td>
                                    <td>{{ $val->tempat_lahir }}</td>
                                    <td>{{ $val->tanggal_lahir }}</td>
                                    <td>{{ $val->jenis_kelamin }}</td>
                                    <td>{{ $val->agama }}</td>
                                    <td>{{ $val->alamat }}</td>
                                    <td>{{ $val->kelurahan }}</td>
                                    <td>{{ $val->kecamatan }}</td>
                                    <td>{{ $val->provinsi }}</td>
                                    <td>
                                        <a href="{{ route('pegawai.edit',$val->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('pegawai.destroy',$val->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?');">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $pegawai->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
