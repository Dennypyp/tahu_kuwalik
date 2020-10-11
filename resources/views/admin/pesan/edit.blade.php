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
                            <h3 class="mb-0">Edit Pesan </h3>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route("pesan.update",[$pesan->id])}}"
                        enctype="multipart/form-data">
                        {{method_field("PUT")}}
                        @csrf
                        @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            {{$errors->first()}}
                        </div>
                        @endif
                        <div class="pl-lg-4">
                            {{-- <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="email">Email</label>
                                        <input type="text" id="email" name="email" class="form-control" required placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="nama">Nama</label>
                                        <input type="text" id="nama" name="nama" class="form-control" required placeholder="Nama">
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="alamat">Alamat</label>
                                        <input type="text" id="alamat" name="alamat" class="form-control" required placeholder="Alamat">
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <label class="form-control-label" for="varian">Varian</label>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Rasa Original" name="varian">
                                        <label class="form-check-label" for="inlineCheckbox1">Rasa Original</label>
                                    </div>
                                    </div>
                                </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Rasa Keju" name="varian">
                                        <label class="form-check-label" for="inlineCheckbox1">Rasa Keju</label>
                                    </div>
                                    </div>
                                </div>


                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Rasa Balado" name="varian">
                                        <label class="form-check-label" for="inlineCheckbox1">Rasa Balado</label>
                                    </div>
                                </div>
                            </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Rasa BBQ" name="varian">
                                                    <label class="form-check-label" for="inlineCheckbox2">Rasa BBQ</label>
                                            </div>

                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="jumlah">Jumlah</label>
                                        <input type="text" id="jumlah" name="jumlah" class="form-control" required placeholder="Jumlah">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="total">Total</label>
                                        <input type="text" id="total" name="total" class="form-control" required placeholder="Total">
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <!-- Description -->
                        <div class="pl-lg-4">
                            {{-- <div class="form-group">
                                <label class="form-control-label">Catatan</label>
                                <textarea rows="4" class="form-control" name="catatan" required></textarea>
                            </div> --}}
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="form-control-label" for="image">Bukti Upload</label>
                                    <div class="form-group">

                                        <img src="{{asset('storage/images/pesan/'.$pesan->image)}}" alt="" srcset="">
                                        {{-- <input type="file" id="image" name="image" required class="form-control"> --}}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="Belum Lunas">Belum Lunas</option>
                                            <option value="Lunas">Lunas</option>
                                        </select>

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
