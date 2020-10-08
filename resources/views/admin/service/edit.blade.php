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
                            <h3 class="mb-0">Create Service </h3>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route("service.update",[$service->id])}}">
                        @csrf
                        {{method_field("PUT")}}
                        @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            {{$errors->first()}}
                        </div>
                        @endif
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="title">Title</label>
                                        <input type="text" name="title" required id="title" class="form-control"
                                            placeholder="Title" value="{{$service->title}}">
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- Description -->
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Description</label>
                                <textarea rows="4" name="description"  required
                                    class="form-control">{{$service->description}}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary" name="save">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
