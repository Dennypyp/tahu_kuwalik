@extends('admin.main')

@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row">

        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Create Team </h3>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                <form method="POST" action="{{route('team.update',[$team->id])}}" enctype="multipart/form-data">
                    @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        {{$errors->first()}}
                    </div>
                    @endif
                    {{method_field("PUT")}}
                    @csrf
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="name">Name</label>
                                    <input type="text" id="name" value="{{$team->name}}" required name="name" class="form-control" placeholder="John Doe">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="status">Status</label>
                                        <input type="text" id="status" value="{{$team->status}}" required name="status" class="form-control" placeholder="Founder">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="image">Image</label>
                                        <input type="file" id="image"  name="image" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" name="save" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
