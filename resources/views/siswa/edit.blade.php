@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Siswa</div>
                <div class="card-body">
                    <form method="post" action="{{ route('siswa.update', $siswa->nisn) }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="nisn" class="col-md-4 col-form-label text-md-end">{{ __('NISN') }}</label>
                            <div class="col-md-6">
                                <input id="nisn" type="text" value="{{ old('nisn', $siswa->nisn) }}"
                                class="form-control @error('nisn') is-invalid @enderror" 
                                name="nisn" required autocomplete="nisn" autofocus>
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
                                <input id="nis" type="text" value="{{ old('nis', $siswa->nis) }}" 
                                class="form-control @error('nis') is-invalid @enderror" 
                                name="nis" required autocomplete="nis">
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
                                <input id="nama" type="text" value="{{ old('nama', $siswa->nama) }}" 
                                class="form-control @error('nama') is-invalid @enderror" 
                                name="nama" required autocomplete="nama">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="id_kelas" class="col-md-4 col-form-label text-md-end">{{ __('Kelas') }}</label>
                            <div class="col-md-6">
                                <select id="id_kelas" name="id_kelas" class="form-control @error('id_kelas') is-invalid @enderror" required>
                                    <option value="{{ $siswa->id_kelas }}">{{ $siswa->kelas->nama_kelas }}</option>
                                    @foreach($kelass as $kelas)
                                        @if($kelas->id !== $siswa->id_kelas)
                                            <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                                        @endif
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
                                <input id="alamat" type="text" value="{{ old('alamat', $siswa->alamat) }}" 
                                class="form-control @error('alamat') is-invalid @enderror" 
                                name="alamat" required autocomplete="alamat">
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="no_telp" class="col-md-4 col-form-label text-md-end">{{ __('No Telepon') }}</label>
                            <div class="col-md-6">
                                <input id="no_telp" type="text" value="{{ old('no_telp', $siswa->no_telp) }}" 
                                class="form-control @error('no_telp') is-invalid @enderror" 
                                name="no_telp" required autocomplete="no_telp">
                                @error('no_telp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="id_spp" class="col-md-4 col-form-label text-md-end">{{ __('ID SPP') }}</label>
                            <div class="col-md-6">
                                <select id="id_spp" name="id_spp" class="form-control @error('id_spp') is-invalid @enderror" required>
                                    <option value="{{ $siswa->id_spp }}">{{ $siswa->spp->tahun }}</option>
                                    @foreach($spps as $spp)
                                        @if($spp->id !== $siswa->id_spp)
                                            <option value="{{ $spp->id }}">{{ $spp->tahun }}</option>
                                        @endif
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