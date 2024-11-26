@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous">
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-12">
           <div class="card">
               <div class="card-header">{{ __('pembayaran') }}</div>

               <div class="card-body">
                  @if($message = Session::get('success'))
                     <div class="alert alert-success" role="alert">
                       <strong>{{$message}}</strong>
                     </div>
                  @endif

                   <a href="{{Route('pembayaran.create')}}" class="btn btn-success btn-md m-4">
                     <i class="fa fa-plus"></i> Tambah Pembayaran
                   </a>
                   
                   <table class="table table-striped table-bordered">
                     <thead>
                       <tr>
                        <th>No</th>
                        <th>nisn</th>
                        <th>Tanggal Bayar</th>
                        <th>Bulan Bayar</th>
                        <th>Tahun Bayar</th>
                        <th>Jumlah Bayar</th>
                        <th>Aksi</th>
                       </tr>
                     </thead>
                     <tbody>
                     @foreach ($pembayaran as $pembayaran)
                     <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pembayaran->nisn }}</td>
                        <td>{{ $pembayaran->tgl_bayar }}</td>
                        <td>{{ $pembayaran->bulan_dibayar }}</td>
                        <td>{{ $pembayaran->tahun_dibayar }}</td>
                        <td>{{ $pembayaran->jumlah_bayar }}</td>
                        <td>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <a href="{{ route('pembayaran.edit', $pembayaran->id_pembayaran) }}" class="btn btn-sm btn-secondary mx-1 shadow" title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </div>

                            <form method="POST" action="{{ route('pembayaran.destroy', $pembayaran->id_pembayaran) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm btn-delete">
                                    <i class="fa-solid fa-trash"></i> </button>
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
       title: "Konfirmasi Hapus pembayaran",
       text: "Apakah Anda Yakin Akan Menghapus pembayaran ini?",
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