@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-12">
           <div class="card">
               <div class="card-header">{{ __('Siswa') }}</div>

               <div class="card-body">
                  @if($message = Session::get('success'))
                     <div class="alert alert-success" role="alert">
                       <strong>{{$message}}</strong>
                     </div>
                  @endif

                   <a href="{{ route('siswa.create') }}" class="btn btn-success btn-md m-4">
                     <i class="fa fa-plus"></i> Tambah Siswa
                   </a>
                   
                   <table class="table table-striped table-bordered">
                     <thead>
                       <tr>
                         <th>No</th>
                         <th>NISN</th>
                         <th>NIS</th>
                         <th>Nama</th>
                         <th>Kelas</th>
                         <th>SPP</th>
                         <th>Alamat</th>
                         <th>No. Telepon</th>
                         <th>Aksi</th>
                       </tr>
                     </thead>
                     <tbody>
                     @foreach ($siswa as $siswa)
                     <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $siswa->nisn }}</td>
                        <td>{{ $siswa->nis }}</td>
                        <td>{{ $siswa->nama }}</td>
                        <td>{{ $siswa->kelas->nama_kelas ?? 'Tidak ada kelas' }}</td>
                        <td>{{ $siswa->spp->tahun ?? 'Tidak ada SPP' }} - Rp{{ number_format($siswa->spp->nominal ?? 0) }}</td>
                        <td>{{ $siswa->alamat }}</td>
                        <td>{{ $siswa->no_telp }}</td>
                        <td>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <a href="{{ route('siswa.edit', $siswa->nisn) }}" class="btn btn-sm btn-secondary mx-1 shadow" 
                                title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i></a>
                            </div>

                            <form method="POST" action="{{ route('siswa.destroy', $siswa->nisn) }}">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm btn-delete">
                                <i class="fa fa-lg fa-fw fa-trash"></i></button>
                           </form>
                          </div>
                        </td>
                       </tr>
                       @endforeach
                     </tbody>
                   </table>
               </div>
           </div>
       </div>
   </div>
</div>
<script type="text/javascript">
 $(".btn-delete").click(function(e){
     e.preventDefault();
     var form = $(this).parents("form");
     Swal.fire({
       title: "Konfirmasi Hapus Siswa",
       text: "Apakah Anda Yakin Akan Menghapus Siswa ini?",
       icon: "warning",
       showCancelButton: true,
       confirmButtonColor: "#3085d6",
       cancelButtonColor: "#d33",
       confirmButtonText: "Ya, Hapus!"
     }).then((result) => {
       if (result.isConfirmed) {
         form.submit();
       }
     });
 });
</script>
@endsection