@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tambah Siswa</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('siswa.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="nisn" class="col-md-4 col-form-label text-md-end">{{ __('NISN') }}</label>
                            <div class="col-md-6">
                                <input id="nisn" type="text" class="form-control @error('nisn') is-invalid @enderror" 
                                       name="nisn" value="{{ old('nisn') }}" required autocomplete="nisn">
                                @error('nisn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nis" class="col-md-4 col-form-label text-md-end">{{ __('NIS') }}</label>
                            <div class="col-md-6">
                                <input id="nis" type="text" class="form-control @error('nis') is-invalid @enderror" 
                                       name="nis" value="{{ old('nis') }}" required autocomplete="nis">
                                @error('nis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nama" class="col-md-4 col-form-label text-md-end">{{ __('Nama') }}</label>
                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" 
                                       name="nama" value="{{ old('nama') }}" required autocomplete="nama">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Dropdown untuk Kelas -->
                        <div class="row mb-3">
                            <label for="id_kelas" class="col-md-4 col-form-label text-md-end">{{ __('Kelas') }}</label>
                            <div class="col-md-6">
                                    <select id="id_kelas" class="form-control @error('id_kelas') is-invalid @enderror" name="id_kelas" required>
                                    <option value="">Pilih Kelas</option>
                                    @foreach($kelass as $kelas)
                                        <option value="{{ $kelas->id }}" {{ old('id_kelas') == $kelas->id ? 'selected' : '' }}>
                                                {{ $kelas->nama_kelas }}
                                        </option>
                             @endforeach
                        </select>
                                @error('id_kelas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="alamat" class="col-md-4 col-form-label text-md-end">{{ __('Alamat') }}</label>
                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" 
                                       name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat">
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="no_telp" class="col-md-4 col-form-label text-md-end">{{ __('No. Telepon') }}</label>
                            <div class="col-md-6">
                                <input id="no_telp" type="text" class="form-control @error('no_telp') is-invalid @enderror" 
                                       name="no_telp" value="{{ old('no_telp') }}" required autocomplete="no_telp">
                                @error('no_telp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Dropdown untuk ID SPP -->
                        <div class="row mb-3">
                        <label for="id_spp" class="col-md-4 col-form-label text-md-end">{{ __('ID SPP') }}</label>
                        <div class="col-md-6">
                            <select id="id_spp" class="form-control @error('id_spp') is-invalid @enderror" name="id_spp" required>
                                <option value="">Pilih ID SPP</option>
                                @foreach($spps as $spp)
                                    <option value="{{ $spp->id }}" {{ old('id_spp') == $spp->id ? 'selected' : '' }}>
                                        {{ $spp->tahun }} - {{ $spp->nominal }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_spp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Tambah Siswa') }}
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