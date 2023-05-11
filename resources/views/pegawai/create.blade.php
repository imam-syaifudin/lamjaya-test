@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Add Data Pegawai') }}</div>

                    <div class="card-body">
                        <a href="{{ route('pegawai.index') }}" class="btn btn-danger mb-2">Back</a>
                        <form action="{{ route('pegawai.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama Pegawai</label>
                                <input type="text" name="nama_pegawai" class="form-control"
                                id="exampleFormControlInput1" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control"
                                id="exampleFormControlInput1" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control"
                                id="exampleFormControlInput1" required>
                            </div>
                            <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
                            <select class="form-select mb-3" aria-label="Default select example" name="jenis_kelamin">
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Agama</label>
                                <input type="text" name="agama" class="form-control"
                                id="exampleFormControlInput1" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control"
                                id="exampleFormControlInput1" required>
                            </div>
                            <label for="exampleFormControlInput1" class="form-label">Nama Kelurahan</label>
                            <select class="form-select mb-3" aria-label="Default select example" name="kelurahan">
                                @foreach( $kelurahan as $val)
                                <option value="{{ $val->nama_kelurahan }}">{{ $val->nama_kelurahan }}</option>
                                @endforeach
                            </select>
                            <label for="exampleFormControlInput1" class="form-label">Nama Kecamatan</label>
                            <select class="form-select mb-3" aria-label="Default select example" name="kecamatan">
                                @foreach( $kecamatan as $val)
                                <option value="{{ $val->nama_kecamatan }}">{{ $val->nama_kecamatan }}</option>
                                @endforeach
                            </select>
                            <label for="exampleFormControlInput1" class="form-label">Nama Provinsi</label>
                            <select class="form-select mb-3" aria-label="Default select example" name="provinsi">
                                @foreach( $provinsi as $val)
                                <option value="{{ $val->nama_provinsi }}">{{ $val->nama_provinsi }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-success" type="submit">Kirim</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
