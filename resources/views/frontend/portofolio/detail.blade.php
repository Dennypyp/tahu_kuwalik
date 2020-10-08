@extends('frontend.main')
@section('content')
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Varian</h2>
            <ol>
                <li><a href="/">Home</a></li>
                <li>Varian</li>
            </ol>
        </div>

    </div>
</section>
<section id="portfolio-details" class="portfolio-details">
    <div class="container">

        <div class="row">

            <div class="col-lg-8">
                <h2 class="portfolio-title">Detail Varian</h2>
                <div class="owl-carousel portfolio-details-carousel owl-loaded owl-drag">



                    <div class="owl-stage-outer">
                        <div class="owl-stage"
                            style="transform: translate3d(-2190px, 0px, 0px); transition: all 0.25s ease 0s; width: 5110px;">
                            <div class="owl-item cloned" style="width: 730px;">
                                <img src="{{asset('storage/images/portfolio/'.$portfolio->image)}}" class="img-fluid"
                                    alt="">
                            </div>

                        </div>
                    </div>
                    {{-- <div class="owl-nav disabled">
                        <button type="button" role="presentation" class="owl-prev">
                            <span aria-label="Previous">‹</span></button><button type="button" role="presentation"
                            class="owl-next"><span aria-label="Next">›</span></button></div>
                    <div class="owl-dots">
                        <button role="button" class="owl-dot"><span></span></button><button
                            role="button" class="owl-dot active"><span></span></button><button role="button"
                            class="owl-dot"><span></span></button></div> --}}
                </div>
            </div>

            <div class="col-lg-4 portfolio-info">
                <h3>Informasi Varian</h3>


                <p>
                    {{$portfolio->description}}
                </p>
            </div>

        </div>

    </div>
</section>
@endsection
