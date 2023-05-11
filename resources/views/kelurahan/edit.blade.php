@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Edit Data Kelurahan') }}</div>

                    <div class="card-body">
                        <a href="{{ route('kelurahan.index') }}" class="btn btn-danger mb-2">Back</a>
                        <form action="{{ route('kelurahan.update', $tKelurahan->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Kode</label>
                                <input type="text" name="kode" value="{{ $tKelurahan->kode }}" class="form-control"
                                    id="exampleFormControlInput1" required readonly>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama Kelurahan</label>
                                <input type="text" name="nama_kelurahan" class="form-control"
                                    id="exampleFormControlInput1" required value="{{ $tKelurahan->nama_kelurahan }}">
                            </div>
                            <label for="exampleFormControlInput1" class="form-label">Nama Kecamatan</label>
                            <select class="form-select mb-3" aria-label="Default select example" name="nama_kecamatan">
                                @foreach ($kecamatan as $val)
                                    <option value="{{ $val->id }}" @if( $val->id == $tKelurahan->t_kecamatan_id ) selected @endif>{{ $val->nama_kecamatan }}</option>
                                @endforeach
                            </select>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="active" id="flexRadioDefault1"
                                    @if ($tKelurahan->active == 1) checked @endif value="1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Active
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="active" id="flexRadioDefault2"
                                    value="0" @if ($tKelurahan->active == 0) checked @endif>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Tidak Active
                                </label>
                            </div>
                            <button class="btn btn-success" type="submit">Kirim</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
