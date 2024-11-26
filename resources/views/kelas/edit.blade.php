@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Kelas</div>
                <div class="card-body">
                    <form method="post" action="{{ route('kelas.update', $kelas->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="nama_kelas" class="col-md-4 col-form-label text-md-end">{{ __('Nama Kelas') }}</label>
                            <div class="col-md-6">
                                <input id="nama_kelas" type="text" value="{{ $kelas->nama_kelas }}"
                                       class="form-control @error('nama_kelas') is-invalid @enderror"
                                       name="nama_kelas" required autocomplete="nama_kelas" autofocus>

                                @error('nama_kelas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="kompetensi_keahlian" class="col-md-4 col-form-label text-md-end">{{ __('Kompetensi Keahlian') }}</label>
                            <div class="col-md-6">
                                <input id="kompetensi_keahlian" type="text" value="{{ $kelas->kompetensi_keahlian }}"
                                       class="form-control @error('kompetensi_keahlian') is-invalid @enderror"
                                       name="kompetensi_keahlian" required autocomplete="kompetensi_keahlian">

                                @error('kompetensi_keahlian')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Simpan') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection