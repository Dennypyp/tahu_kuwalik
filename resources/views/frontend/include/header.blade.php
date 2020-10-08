<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <!-- <h1 class="text-light"><a href="index.html"><span>Tahu Kuwalik</span></a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
      <a href="{{route('frontend.index')}}"><img src="{{asset('frontend/assets/img/logo_tahu.png')}}" alt="" class="img-fluid"></a>
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="{{route('frontend.index')}}">Home</a></li>
          <li><a href="{{route('frontend.portofolio.index')}}">Varian</a></li>
          <li><a href="{{route('frontend.about-us.index')}}">About Us</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header>
