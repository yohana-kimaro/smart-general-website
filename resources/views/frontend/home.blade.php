<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <title>Smart General Company</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicons -->
  <link href="{{ asset('frontend/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('frontend/img/apple-touch-icon.png') }}" rel="apple-touch-icon">



  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,600,700|Lato:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('frontend/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('frontend/lib/nivo-slider/css/nivo-slider.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/lib/owlcarousel/owl.carousel.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/lib/owlcarousel/owl.transitions.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/lib/animate/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/lib/venobox/venobox.css') }}" rel="stylesheet">

  <!-- Nivo Slider Theme -->
  <link href="{{ asset('frontend/css/nivo-slider-theme.css') }}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">

  <!-- Responsive Stylesheet File -->
  <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">
</head>

<body data-spy="scroll" data-target="#navbar-example">

  <div id="preloader"></div>

  <header>
    <!-- header-area start -->
    <div id="sticker" class="header-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">

            <!-- Navigation -->
            <nav class="navbar navbar-default">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <!-- Brand -->
                <a class="navbar-brand page-scroll sticky-logo" href="/">
                  <h1><span>Smart</span>General</h1>
                  <!-- Uncomment below if you prefer to use an image logo -->
                  <!-- <img src="img/logo.png" alt="" title=""> -->
                </a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                <ul class="nav navbar-nav navbar-right">
                  <li class="active">
                    <a class="page-scroll" href="#home">Home</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#about">About</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#services">Services</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#solutions">Solutions</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#projects">Projects</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#contact">Contact</a>
                  </li>
                </ul>
              </div>
              <!-- navbar-collapse -->
            </nav>
            <!-- END: Navigation -->
          </div>
        </div>
      </div>
    </div>
    <!-- header-area end -->
  </header>
  <!-- header end -->

  <!-- Start Slider Area -->
  <div id="home" class="slider-area">
    <div class="bend niceties preview-2">
      <div id="ensign-nivoslider" class="slides">

        @foreach($sliders as $key=>$slider)
        <img src="{{ asset($slider->image) }}" alt="" />
        @endforeach
      </div>
    </div>
  </div>
  <!-- End Slider Area -->

  <!-- Start About area -->
  <div id="about" class="about-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>{{ __('About Us') }}</h2>
          </div>
        </div>
      </div>
      @foreach($aboutus as $about)
      <div class="row">
        <!-- single-well start-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-left">
            <div class="single-well">
              <a href="#">
                <img src="{{ asset($about->image)}}" alt="">
              </a>
            </div>
          </div>
        </div>
        <!-- single-well end-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-middle">
            <div class="single-well">
              <a href="#">
                <h4 class="sec-head">{{ $about->header}}</h4>
              </a>
              <p>{{ $about->description }}</p>
            </div>
          </div>
        </div>
        <!-- End col-->
      </div>
      @endforeach

    </div>
  </div>
  <!-- End About area -->

  <!-- Start Service area -->
  <div id="services" class="services-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline services-head text-center">
            <h2>{{ __('Our Services') }}</h2>
          </div>
        </div>
      </div>
      <div class="row text-center">
        <div class="services-contents">
          <!-- Start Left services -->
          @foreach($services as $serv)
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <img src="{{ asset($serv->image) }}" alt="" />
                  </a>
                  <h4>{{ $serv->header}}</h4>
                  <p>{{ $serv->description }}</p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <!-- End Service area -->

  <!-- Start Solution area -->
  <div id="solutions" class="services-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline services-head text-center">
            <h2>{{ __('Our Solutions') }}</h2>
          </div>
        </div>
      </div>
      <div class="row text-center">
        <div class="services-contents">
          <!-- Start Left services -->
          @foreach($solutions as $solut)
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <img src="{{ asset($solut->image) }}" alt="" />
                  </a>
                  <h4>{{ $solut->header}}</h4>
                  <p>{{ $solut->description }}</p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <!-- End Solution area -->

  <!-- Start Projects Area -->
  <div id="projects" class="blog-area">
    <div class="blog-inner area-padding">
      <div class="blog-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>{{__('Our Projects')}}</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Start Left Blog -->
          @foreach($projects as $project)
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="single-blog">
              <div class="single-blog-img">
                <a>
                  <img src="{{ asset($project->image)}}" alt="">
                </a>
              </div>
              <div class="blog-text mb-8">
                <h4>{{ $project->header}}</h4>
                <p>{{ $project->description }}</p>
              </div>
            </div>
            <!-- Start single blog -->
          </div>
          @endforeach
          <!-- End Left Blog-->
        </div>
      </div>
    </div>
  </div>
  <!-- End Blog -->

  <!-- Start contact Area -->
  <div id="contact" class="contact-area">
    @foreach($contactinfo as $contact)
    <div class="contact-inner area-padding">
      <div class="contact-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>{{ __('Contact Us') }}</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-mobile"></i>
                <p>{{$contact->phones}}<br>
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-envelope-o"></i>
                <p>{{$contact->emails}}<br>
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-map-marker"></i>
                <p>{{$contact->address}}<br>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">

          <!-- Start Google Map -->
          <!-- <div class="col-md-6 col-lg-12 col-sm-6 col-xs-12"> -->
          <!-- Start Map -->
          <!-- <div id="google-map" data-latitude="40.713732" data-longitude="-74.0092704"></div> -->
          <!-- End Map -->
          <!-- </div> -->
          <!-- End Google Map -->
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <!-- End Contact Area -->

  <!-- Start Footer bottom Area -->
  <footer>
    <div class="footer-area-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="copyright text-center">
              <p>
                &copy; <?= date('Y'); ?> <strong>{{ __('Smart General Company') }}</strong>{{ __(' | All Rights Reserved') }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="{{ asset('frontend/lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('frontend/lib/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('frontend/lib/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('frontend/lib/knob/jquery.knob.js') }}"></script>
  <script src="{{ asset('frontend/lib/wow/wow.min.js') }}"></script>
  <script src="{{ asset('frontend/lib/parallax/parallax.js') }}"></script>
  <script src="{{ asset('frontend/lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('frontend/lib/nivo-slider/js/jquery.nivo.slider.js') }}" type="text/javascript"></script>
  <script src="{{ asset('frontend/lib/appear/jquery.appear.js') }}"></script>
  <script src="{{ asset('frontend/lib/isotope/isotope.pkgd.min.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script>

  <!-- Contact Form JavaScript File -->
  <script src="{{ asset('frontend/contactform/contactform.js') }}"></script>

  <script src="{{ asset('frontend/js/main.js') }}"></script>
</body>

</html>