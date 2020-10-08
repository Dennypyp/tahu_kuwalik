@extends('frontend.main')
@section('herosection')
<section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner mt-3">
                @foreach ($cr as $key => $item)
                <div class="carousel-item  {{$key == 0 ? 'active' : '' }}">
                    <img class="d-block w-100" src="{{asset('storage/images/carousel/'.$item->image)}}" alt="First slide">
                </div>
                @endforeach

            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

</section>
@endsection
@section('content')
<!-- ======= About Us Section ======= -->
<section id="about" class="about">
    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h2>About Us</h2>
        </div>

        <div class="row content">
            
            <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="300">
                <p>
                    Tahu Kuwalik adalah makanan ringan yang sangat renyah. Terbuat dari tahu yang mempunyai beberapa varian.
                </p>
                <!-- <a href="#" class="btn-learn-more">Learn More</a> -->
            </div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-aos="fade-up" data-aos-delay="300">
                Pesan Sekarang!!!
              </button>
            {{-- <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="150">
                
                    <a href="https://api.whatsapp.com/send?phone=628155106629" target="_blank" class="pesan btn btn-dark btn-lg btn-block">Pesan Sekarang!!!</a>
                
            </div> --}}
        </div>

    </div>
</section><!-- End About Us Section -->

<!-- ======= Counts Section ======= -->
<section id="counts" class="counts">
    <div class="container">
        <div class="row">
            @foreach ($about as $item)
            @if ($item->category=="Ranah Tahu Kuwalik")
            <div class="col-lg-6 order-1 order-lg-2 d-flex flex-column justify-content-center" data-aos="fade-left"
                data-aos-delay="200">
                <h1 data-aos="fade-up">{{$item->title}}</h1>
                <p data-aos="fade-up" class="mt-3">
                    {{$item->description}}
                </p>
            </div>

            <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 hero-img" data-aos="fade-up">
                <img src="{{asset('frontend/assets/img/robot.png')}}" class="img-fluid" alt="">
            </div>
            @endif
            @endforeach
        </div>

        <div class="row">
            @foreach ($about as $item)
            @if ($item->category=="Program Tahu Kuwalik")
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
                <img src="{{asset('frontend/assets/img/img2.png')}}" class="img-fluid" alt="">
            </div>

            <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center"
                data-aos="fade-up">
                <h1 data-aos="fade-up">{{$item->title}}</h1>
                <p data-aos="fade-up" class="mt-3">
                    {{$item->description}}
                </p>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>
<!-- End Counts Section -->

<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg">
    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h2>Services</h2>
        </div>

        <div class="row">
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                @foreach ($service as $item)
                <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon"><i class="bx bxl-dribbble"></i></div>
                    <h4 class="title"><a href="">{{$item->title}}</a></h4>
                    <p class="description">{{$item->description}}
                    </p>
                </div>
            </div>
            @if($loop->iteration % 1 == 0)
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                @endif
                @endforeach
            </div>
        </div>

    </div>
</section>
<!-- End Services Section -->

<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h2>Varian</h2>
        </div>

       
        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="400">
            @foreach ($portfolio as $item)
            <div class="col-lg-4 col-md-6 portfolio-item {{$item->filter}}">

                <div class="portfolio-wrap">
                    <img src="{{asset('storage/images/portfolio/'.$item->image)}}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>{{$item->title}}</h4>
                        <p>{{$item->catgory}}</p>
                        <div class="portfolio-links">
                            <a href="{{asset('storage/images/portfolio/'.$item->image)}}" data-gall="portfolioGallery"
                                class="venobox" title="App 1"><i class="bx bx-plus"></i></a>
                            <a href="{{route("frontend.portofolio.show",[$item->id])}}" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach



        </div>

    </div>
</section>
<!-- End Portfolio Section -->

<!-- ======= Team Section ======= -->
<section id="team" class="team section-bg">
    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h2>Team</h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                @foreach ($team as $item)


                <div class="member" data-aos="fade-up" data-aos-delay="100">
                    <div class="member-img">
                        <img src="{{asset('storage/images/team/'.$item->image)}}" class="img-fluid" alt="">
                        <div class="social">
                            <a href=""><i class="icofont-twitter"></i></a>
                            <a href=""><i class="icofont-facebook"></i></a>
                            <a href=""><i class="icofont-instagram"></i></a>
                            <a href=""><i class="icofont-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4>{{$item->name}}</h4>
                        <span>{{$item->status}}</span>
                    </div>
                </div>
            </div>
            @if($loop->iteration % 1 == 0)
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                @endif

                @endforeach
            </div>

        </div>

    </div>
</section>
<!-- End Team Section -->

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
                    <p>Memberikan pelayanan untuk pembuatan prototype sekaligus produk jadi. </p>

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

{{-- Modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pesan Tahu Kuwalik</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('frontend.pesan.store')}}" >
                    @csrf
                        <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Nama Pelanggan</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nama">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="alamat">
                        </div>
                    <label for="">Varian</label>
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
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jumlah</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="jumlah">
                        </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Total</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="total">
                    </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Catatan</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="catatan"></textarea>
                        </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Pesan</button>
                </div>
                </form>
        </div>
        </div>
    </div>
{{-- End Modal --}}

@endsection
