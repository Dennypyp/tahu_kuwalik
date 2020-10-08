<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
            <img src="{{asset('frontend/assets/img/icon/logo_tahu.png')}}" class="navbar-brand-img" alt="...">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::path() ==  'admin/dashboard' ? 'active' : ''  }}" href="{{route('dashboard.index')}}">
                            <i class="ni ni-tv-2 {{ Request::path() ==  'admin/dashboard' ? 'text-primary' : 'text-default'  }}"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::path() ==  'admin/varian' ? 'active' : ''  }}" href="{{route('varian.index')}}">
                            <i class="ni ni-bullet-list-67 {{ Request::path() ==  'admin/varian' ? 'text-primary' : 'text-default'  }}"></i>
                            <span class="nav-link-text">Varian</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::path() ==  'admin/team' ? 'active' : ''  }}" href="{{route('team.index')}}">
                            <i class="ni ni-bullet-list-67 {{ Request::path() ==  'admin/team' ? 'text-primary' : 'text-default'  }}"></i>
                            <span class="nav-link-text">Team</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::path() ==  'admin/service' ? 'active' : ''  }}" href="{{route('service.index')}}">
                            <i class="ni ni-bullet-list-67 {{ Request::path() ==  'admin/service' ? 'text-primary' : 'text-default'  }}"></i>
                            <span class="nav-link-text">Service</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::path() ==  'admin/about-us' ? 'active' : ''  }}" href="{{route('about-us.index')}}">
                            <i class="ni ni-bullet-list-67 {{ Request::path() ==  'admin/about-us' ? 'text-primary' : 'text-default'  }}"></i>
                            <span class="nav-link-text">About us</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::path() ==  'admin/carousel' ? 'active' : ''  }}" href="{{route('carousel.index')}}">
                            <i class="ni ni-bullet-list-67 {{ Request::path() ==  'admin/carousel' ? 'text-primary' : 'text-default'  }}"></i>
                            <span class="nav-link-text">Carousel</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::path() ==  'admin/pesan' ? 'active' : ''  }}" href="{{route('pesan.index')}}">
                            <i class="ni ni-bullet-list-67 {{ Request::path() ==  'admin/pesan' ? 'text-primary' : 'text-default'  }}"></i>
                            <span class="nav-link-text">Pesan</span>
                        </a>
                    </li>
                </ul>
                <!-- Divider -->
                <hr class="my-3">
                <!-- Heading -->

            </div>
        </div>
    </div>
</nav>
