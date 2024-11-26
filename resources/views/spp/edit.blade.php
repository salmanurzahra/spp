@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit SPP</div>
                <div class="card-body">
                    <form method="post" action="{{ route('spp.update', $spp->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="tahun" class="col-md-4 col-form-label text-md-end">{{ __('Tahun') }}</label>
                            <div class="col-md-6">
                                <input id="tahun" type="text" value="{{ $spp->tahun }}"
                                       class="form-control @error('tahun') is-invalid @enderror"
                                       name="tahun" required autocomplete="tahun" autofocus>

                                @error('tahun')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nominal" class="col-md-4 col-form-label text-md-end">{{ __('Nominal') }}</label>
                            <div class="col-md-6">
                                <input id="nominal" type="text" value="{{ $spp->nominal }}"
                                       class="form-control @error('nominal') is-invalid @enderror"
                                       name="nominal" required autocomplete="nominal">

                                @error('nominal')
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
<script>
    // Format nominal input
    const nominalInput = document.getElementById('nominal');

    // Fungsi untuk format angka dengan titik pemisah ribuan
    function formatNumber(value) {
        return new Intl.NumberFormat('id-ID').format(value);
    }

    // Event listener untuk menghapus format saat fokus
    nominalInput.addEventListener('focus', function () {
        this.value = this.value.replace(/[^\d]/g, ''); // Hapus format angka
    });

    // Event listener untuk menambahkan format saat input berubah
    nominalInput.addEventListener('input', function () {
        const unformattedValue = this.value.replace(/[^\d]/g, ''); // Hapus semua karakter non-numerik
        this.value = formatNumber(unformattedValue); // Format ulang dengan pemisah ribuan
    });

    // Menyimpan nilai yang diformat ke form saat submit
    nominalInput.closest('form').addEventListener('submit', function () {
        nominalInput.value = nominalInput.value.replace(/[^\d]/g, ''); // Hapus pemisah ribuan sebelum dikirim ke server
    });
</script>
@endsection