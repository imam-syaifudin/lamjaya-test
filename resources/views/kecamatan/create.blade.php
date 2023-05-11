@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Add Data Kecamatan') }}</div>

                    <div class="card-body">
                        <a href="{{ route('kecamatan.index') }}" class="btn btn-danger mb-2">Back</a>
                        <form action="{{ route('kecamatan.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Kode</label>
                                <input type="text" name="kode" value="K00{{ App\Models\TKecamatan::count() + 1 }}"
                                    class="form-control" id="exampleFormControlInput1" required readonly>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama Kecamatan</label>
                                <input type="text" name="nama_kecamatan" class="form-control"
                                    id="exampleFormControlInput1" required>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="active"
                                    id="flexRadioDefault1" checked value="1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Active
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="active"
                                    id="flexRadioDefault2" value="0">
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
