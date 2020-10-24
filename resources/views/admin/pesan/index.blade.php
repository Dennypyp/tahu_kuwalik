@extends('admin.main')
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Pesan</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Pesan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pesan</li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <!-- Dark table -->
    <div class="row">
        <div class="col">
            <div class="card bg-default shadow">
                <div class="card-header bg-transparent border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0 text-white">Pesan List</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="/admin/laporan" class="btn btn-sm btn-primary">Export Laporan</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-dark table-flush">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal Pesan</th>
                                <th scope="col">Email</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Varian</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Total</th>
                                <th scope="col">Catatan</th>
                                <th scope="col">Bukti</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($pesan as $item)
                            <tr>
                                <th scope="row">
                                    {{$loop->iteration}}
                                </th>
                                <td>
                                    @php
                                        $tanggal=strtotime($item->created_at);
                                        $date=date("d-m-y",$tanggal);
                                    @endphp
                                    {{$date}}
                                </td>
                                <td>
                                    {{$item->email}}
                                </td>
                                <td>
                                    {{$item->nama}}
                                </td>
                                <td>
                                    {{$item->alamat}}
                                </td>
                                <td>
                                    @php
                                $varian=json_decode($item->varian);
                                
                            @endphp
                            @if ($varian->varian1!=null)
                                {{$varian->varian1}},
                                
                            @else
                                
                            @endif
                            @if ($varian->varian2!=null)
                                {{$varian->varian2}},
                                
                            @else
                                
                            @endif
                            @if ($varian->varian3!=null)
                                {{$varian->varian3}},
                                
                            @else
                                
                            @endif
                            @if ($varian->varian4!=null)
                                {{$varian->varian4}},
                                
                            @else
                                
                            @endif
                                </td>
                                <td>
                                    {{$item->jumlah}}
                                </td>
                                <td>
                                    {{$item->total}}
                                </td>
                                <td>
                                    {{$item->catatan}}
                                </td>
                                <td>
                                    {{$item->image}}
                                </td>
                                <td>
                                    {{$item->status}}
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="{{route("pesan.edit",[$item->id])}}">Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0)"
                                                onclick="deletedata({{$item->id}})">Delete</a>
                                        </div>
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
@endsection
@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function ajax(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    }

    function deletedata(id){
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                ajax();
                $.ajax({
                    url:"/admin/pesan/"+id,
                    method:"DELETE",
                    success:function(data){
                        swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                        });
                        window.setTimeout(function(){window.location.href="/admin/pesan"},1500);

                    }
                })
            }
            });
    }
</script>
@endsection
