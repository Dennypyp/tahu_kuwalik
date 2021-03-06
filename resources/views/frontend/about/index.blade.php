@extends('frontend.main')
@section('content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Order</h2>
            <ol>
                @if(isset(Auth()->user()->name))
                <form  action="{{ route('logout') }}" method="POST">
                  @csrf
                  <li><button type="submit" class="btn btn-warning">Logout</button></li>
                </form>
                @endif
            </ol>
        </div>

    </div>
</section>
<!-- End Breadcrumbs -->

<section id="banner" class="d-flex justify-content-center" data-aos="zoom-in">
    <img src="{{asset('frontend/assets/img/logo_tahu.png')}}" class="img-fluid" alt="">
</section>

<section id="about">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Bagaimana metode pembayarannya ?</h2>
        </div>
        <p align="center" class="mt-3" data-aos="fade-up">
            Pembayaran dapat dilakukan dengan metode transfer pada nomor rekening berikut:
            <br>
            <b>BCA 2150299635 a/n Abu Hanif Rahmatullah</b>
            
            
        </p>
    </div>
    <section id="table-pesan" data-aos="fade-up">
        <div class="container">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tangal Pesan</th>
                    <th scope="col">Email</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Varian</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total</th>
                    <th scope="col">Catatan</th>
                    <th scope="col">Bukti</th>
                    <th scope="col">Status</th>
                    <th scope="col">Kwitansi</th>
                  </tr>
                </thead>
                <tbody>
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
                            @if($item->image == null)
                            <button type="button" data-toggle="modal" data-target="#exampleModal{{$item->id}}" class="btn btn-sm btn-primary">Upload Bukti Transfer</button>
                            @else
                            <div class="alert alert-primary" role="alert">
                                Bukti sudah Terupload
                            </div>
                            @endif
    
                        </td>
    
                        <td>
                            {{$item->status}}
                        </td>
                        <td>
                            <a href="/kwitansi/{{$item->id}}">Cetak Kwitansi</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </section>
</section>


<!-- Modal -->
@foreach ($pesan as $item)


<div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Pembayaran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="POST" action="{{route('frontend.pesan.update',[$item->id])}}" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <div class="form-group">
                  <label for="exampleFormControlFile1">Upload Bukti Transfer</label>
                  <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Upload</button>
        </div>
    </form>
      </div>
    </div>
  </div>
@endforeach

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h2>Contact</h2>
        </div>

        <div class="row">

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="contact-about">
                    <h3 style="color: #a68b2c;">Tahu Kuwalik</h3>
                    <p>Selalu menyajikan kerenyahan untuk anda </p>

                </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                <div class="info">
                    <div>
                        <i class="ri-map-pin-line"></i>
                        <p>Ketabang, Surabaya</p>
                    </div>

                    <div>
                        <i class="ri-mail-send-line"></i>
                        <p>tahukuwalik@gmail.com</p>
                    </div>

                    <div>
                        <i class="ri-phone-line"></i>
                        <p>+62 815-5106-629</p>
                    </div>

                    <div>
                        <i class="bx bxl-instagram"></i>
                        <p>tahu.kwalik</p>
                    </div>

                </div>
            </div>

            <div class="col-lg-5 col-md-12" data-aos="fade-up" data-aos-delay="300">
                <img src="{{asset('frontend/assets/img/contact.png')}}" class="img-fluid" alt="">
            </div>

        </div>

    </div>
</section>
<!-- End Contact Section -->

{{-- Whatsapp --}}
<div class="fixed-bottom">
    <a href="https://api.whatsapp.com/send?phone=628155106629" target="_blank"><img src="{{asset('frontend/assets/img/chatwa.png')}}" alt="Chat Whatsapp" width="10%" style="float: right; margin: 20px; margin-right: 70px"></a>
</div>
{{-- End Whatsapp --}}
@endsection
