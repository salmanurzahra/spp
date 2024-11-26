@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tambah Pembayaran</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('pembayaran.store') }}">
                        @csrf
                        <input type="hidden" name="id_petugas" value="{{\Auth::user()->id}}" />

                        <!-- Field for NISN -->
                        <div class="row mb-3">
                            <label for="nisn" class="col-md-4 col-form-label text-md-end">{{ __('NISN') }}</label>
                            <div class="col-md-6">
                                <select id="nisn" class="form-control @error('nisn') is-invalid @enderror" name="nisn" required>
                                    <option value="">Pilih NISN</option>
                                    @foreach($siswa as $siswa)
                                        <option value="{{ $siswa->nisn }}" {{ old('nisn') == $siswa->nisn ? 'selected' : '' }}>
                                            {{ $siswa->nisn }} - {{ $siswa->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('nisn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        <!-- Field for Tanggal Bayar -->
                        <div class="row mb-3">
                            <label for="tgl_bayar" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Bayar') }}</label>
                            <div class="col-md-6">
                                <input id="tgl_bayar" type="date" class="form-control @error('tgl_bayar') is-invalid @enderror" 
                                       name="tgl_bayar" value="{{ old('tgl_bayar') }}" required autocomplete="tgl_bayar">
                                @error('tgl_bayar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Dropdown for Bulan Bayar -->
                        <div class="row mb-3">
                            <label for="bulan_dibayar" class="col-md-4 col-form-label text-md-end">{{ __('Bulan Dibayar') }}</label>
                            <div class="col-md-6">
                                <select id="bulan_dibayar" class="form-control @error('bulan_dibayar') is-invalid @enderror" name="bulan_dibayar" required>
                                    <option value="">Pilih Bulan</option>
                                    @foreach(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $bulan)
                                        <option value="{{ $bulan }}" {{ old('bulan_dibayar') == $bulan ? 'selected' : '' }}>
                                            {{ $bulan }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('bulan_dibayar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Field for Tahun Dibayar -->
                        <div class="row mb-3">
                            <label for="tahun_dibayar" class="col-md-4 col-form-label text-md-end">{{ __('Tahun Dibayar') }}</label>
                            <div class="col-md-6">
                                <input id="tahun_dibayar" type="text" class="form-control @error('tahun_dibayar') is-invalid @enderror" 
                                       name="tahun_dibayar" value="{{ old('tahun_dibayar') }}" required autocomplete="tahun_dibayar">
                                @error('tahun_dibayar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <!-- Field for Jumlah Bayar -->
                        <div class="row mb-3">
                            <label for="jumlah_bayar" class="col-md-4 col-form-label text-md-end">{{ __('Jumlah Bayar') }}</label>
                            <div class="col-md-6">
                                <input id="jumlah_bayar" type="text" class="form-control @error('jumlah_bayar') is-invalid @enderror" 
                                       name="jumlah_bayar" value="{{ old('jumlah_bayar') }}" required autocomplete="jumlah_bayar">
                                @error('jumlah_bayar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Tambah Pembayaran') }}
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