@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-12">
           <div class="card">
               <div class="card-header">{{ __('SPP') }}</div>

               <div class="card-body">
                  @if($message = Session::get('success'))
                     <div class="alert alert-success" role="alert">
                       <strong>{{ $message }}</strong>
                     </div>
                  @endif

                   <a href="{{ route('spp.create') }}" class="btn btn-success btn-md m-4">
                     <i class="fa fa-plus"></i> Tambah SPP
                   </a>
                   
                   <table class="table table-striped table-bordered">
                     <thead>
                       <tr>
                        <th>No</th>
                        <th>Tahun</th>
                        <th>Nominal</th>
                        <th>Aksi</th>
                       </tr>
                     </thead>
                     <tbody>
                     @foreach ($spp as $spp)
                     <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $spp->tahun }}</td>
                        <td>Rp. {{ number_format($spp->nominal, 2, ',', '.') }}</td>
                        <td>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <a href="{{ route('spp.edit', $spp->id) }}" class="btn btn-sm btn-secondary mx-1 shadow" 
                                title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                              </a>
                            </div>

                            <form method="POST" action="{{ route('spp.destroy', $spp->id) }}">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm btn-delete">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                              </button>
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
       title: "Konfirmasi Hapus SPP",
       text: "Apakah Anda Yakin Akan Menghapus SPP ini?",
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