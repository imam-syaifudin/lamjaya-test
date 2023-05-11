@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Edit Data Provinsi') }}</div>

                    <div class="card-body">
                        <a href="{{ route('provinsi.index') }}" class="btn btn-danger mb-2">Back</a>
                        <form action="{{ route('provinsi.update',$tProvinsi->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Kode</label>
                                <input type="text" name="kode" value="{{ $tProvinsi->kode }}"
                                    class="form-control" id="exampleFormControlInput1" required readonly>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama Provinsi</label>
                                <input type="text" name="nama_provinsi" class="form-control"
                                    id="exampleFormControlInput1" required value="{{ $tProvinsi->nama_provinsi }}">
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="active"
                                    id="flexRadioDefault1" @if( $tProvinsi->active == 1) checked @endif value="1" >
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Active
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="active"
                                    id="flexRadioDefault2" value="0" @if( $tProvinsi->active == 0) checked @endif>
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
