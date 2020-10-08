@extends('admin.main')
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Carousel</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Carousel</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Carousel</li>
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
                            <h3 class="mb-0 text-white">Carousel List</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{route("carousel.create")}}" class="btn btn-sm btn-primary">Create Carousel</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            @foreach ($cr as $item)
            <div class="card bg-default shadow">
                <div class="card-header bg-transparent border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                        <h3 class="mb-0 text-white">Carousel {{$loop->iteration}}</h3>
                        </div>

                    </div>
                </div>
                <img src="{{asset('storage/images/carousel/'.$item->image)}}" width="100%" alt="" srcset="">
                <div class="card-body text-right">
                    <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <a class="dropdown-item" href="{{route("carousel.edit",[$item->id])}}">Edit</a>
                            <a class="dropdown-item" href="javascript:void(0)"
                                onclick="deletedata({{$item->id}})">Delete</a>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        @if($loop->iteration % 1 == 0)
        <div class="col-md-3">
            @endif
            @endforeach
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
                text: "Once deleted, you will not be able to recover this imaginary image!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                ajax();
                $.ajax({
                    url:"/admin/carousel/"+id,
                    method:"DELETE",
                    success:function(data){
                        swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                        });
                        window.setTimeout(function(){window.location.href="/admin/carousel"},1500);

                    }
                })
            }
            });
    }
</script>
@endsection
