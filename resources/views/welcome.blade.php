@extends('layouts.app')

@section('content')
@if (session('announcement.created.success'))
<div class="modal fade text-center py-5 my-5" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-warning">
        <div class="modal-body text-center">
           <img src="/img/presto2.png" class="modal-img  "  >
          <h2 class="py-5 my-4 h2title">L'annuncio inserito è <br> in attesa di revisione.</h2> 
         
          @if (session('access.denied.revisor.only'))
          <div class="alert alert-danger text-center">
            <h3>Accesso non consentito - solo per i revisori</h3>
          </div>
              
          @endif
        
        </div>
      </div>
    </div>
  </div>
  <script>$('#exampleModal').modal('toggle')</script>
@endif


          {{-- <form action="{{route('public.search')}}" method="GET" class="mt-5">
            <div class="form-box">
            <input type="text" class="search-field h5 shadow" placeholder=" {{__('ui.search')}}..."  name="search"/>
            <button class="search-btn h5 shadow" type="submit">{{__('ui.search')}}</button>
            </div>
            </form>
{{-- </header> --}} 


<header>

  <div class="demo-cont">
    
    <!-- slider start -->
    <div class="fnc-slider example-slider">
      <div class="fnc-slider__slides">
        <!-- slide start -->
        <div class="fnc-slide m--blend-green m--active-slide">
          <div class="fnc-slide__inner">
            <div class="fnc-slide__mask">
              <div class="fnc-slide__mask-inner"></div>
            </div>
            <div class="fnc-slide__content">
              <div class="">
              <h2 class="fnc-slide__heading mb-sm-0 mb-md-5">
                <div class="fnc-slide__heading-line">
                  <span>{{__('ui.welcomeTo')}} </span>
                </div>
                <div class="fnc-slide__heading-line">
                  <span class="presto presto2 pr-5">
                   {{--  <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="mb-5" src="/img/presto2.png" width="120px" alt="">                     
                    </a> --}}
                    Presto.it <i class="far fa-laugh-wink"></i>!
                  </span>
                  
                  
                </div>
              </h2>
              </div>
            </div>
          </div>
        </div>
        <!-- slide end -->
        <!-- slide start -->
        <div class="fnc-slide m--blend-dark">
          <div class="fnc-slide__inner">
            <div class="fnc-slide__mask">
              <div class="fnc-slide__mask-inner"></div>
            </div>
            <div class="fnc-slide__content">
              <div class="">
              <h2 class="fnc-slide__heading ">
                <div class="fnc-slide__heading-line">
                  <span>{{__('ui.chooseBetween')}}</span>
                </div>
                <div class="fnc-slide__heading-line">
                  <span>{{__('ui.thousandsOfAnnouncements')}} <i class="far fa-comments"></i> ...</span>
                </div>
              </h2>
              
              </div>
            </div>
          </div>
        </div>
        <!-- slide end -->
        <!-- slide start -->
        <div class="fnc-slide m--blend-red">
          <div class="fnc-slide__inner">
            <div class="fnc-slide__mask">
              <div class="fnc-slide__mask-inner"></div>
            </div>
            
            <div class="fnc-slide__content">
              <div class="">
              <h2 class="fnc-slide__heading">
                <div class="fnc-slide__heading-line">
                  <span>{{__('ui.sellYours')}}</span>
                </div>
                <div class="fnc-slide__heading-line">
                  <span>{{__('ui.products')}} <i class="far fa-handshake"></i> ...</span>
                </div>
              </h2>
              
            </div>
            </div>
          </div>  
        </div>
        <!-- slide end -->
        <!-- slide start -->
        <div class="fnc-slide m--blend-blue">
          <div class="fnc-slide__inner">
            <div class="fnc-slide__mask">
              <div class="fnc-slide__mask-inner"></div>
            </div>
            <div class="fnc-slide__content">
              <div class="">
              <h2 class="fnc-slide__heading ">
                <div class="fnc-slide__heading-line">
                  <span>{{__('ui.takeAdvantageOf')}}</span>
                </div>
                <div class="fnc-slide__heading-line">
                  <span>{{__('ui.ourBestOffers')}} <i class="far fa-thumbs-up"></i>! </span>
                </div>
              </h2>
              
              </div>
            </div>
          </div>
        </div>
        <!-- slide end -->
      </div>
      <nav class="fnc-nav">
        <div class="fnc-nav__bgs">
          <div class="fnc-nav__bg m--navbg-green m--active-nav-bg"></div>
          <div class="fnc-nav__bg m--navbg-dark"></div>
          <div class="fnc-nav__bg m--navbg-red"></div>
          <div class="fnc-nav__bg m--navbg-blue"></div>
        </div>
        <div class="fnc-nav__controls">
          <button class="fnc-nav__control">
            Presto.it
            <span class="fnc-nav__control-progress font-mobile"></span>
          </button>
          <button class="fnc-nav__control">
            {{__('ui.buy')}}
            <span class="fnc-nav__control-progress font-mobile"></span>
          </button>
          <button class="fnc-nav__control">
            {{__('ui.sell')}}
            <span class="fnc-nav__control-progress font-mobile"></span>
          </button>
          <button class="fnc-nav__control">
            {{__('ui.earn')}}
            <span class="fnc-nav__control-progress font-mobile"></span>
          </button>
        </div>
      </nav>
    </div>
    <!-- slider end -->
  </div>

  
</header>

<div class="container-fluid container-bg-1 pb-3 ">

  {{-- Search Bar --}}
<div class="container container-search py-md-0 py-lg-3">
  <div class="row">
    <div class=" col-12">
    <form action="{{route('public.search')}}" method="GET" class="mt-3">
      <div class="form-box shadow">
      <input type="text" class="search-field h5 shadow" placeholder=" {{__('ui.search2')}}..."  name="search"/>
      <button class="search-btn h5 shadow" type="submit">{{__('ui.search')}} <i class="fas fa-arrow-right pl-2"></i></button>
      </div>
      </form>
    </div>
  </div>
</div>

{{-- Counter --}}


<div class="container my-5 py-3 text-center ">
  <div class="row">
    <div class="col-6 col-md-3  bg-custom-1 text-white py-4 border-custom1 wow animate__animated animate__fadeInLeft">
      <i class="fas fa-users fa-3x  "></i>
      <div id="number1" class=" pt-4"> {{\App\User::UsersCounter()}}</div>
      <span class="span-category"></span>
      <div class="pt-1 category">Utenti registrati</div>
    </div>
    <div class="col-6 col-md-3  bg-custom-2 text-white py-4  border-custom1 wow animate__animated animate__fadeInLeftBig">
      <i class="fas fa-copy fa-3x "></i>
      <div id="number2" class=" pt-4">{{\App\Announcement::AnnouncementsCounter()}}</div> 
      <span class="span-category"></span>
      <div class="pt-1 category">Annunci pubblicati</div>     
    </div>
    <div class="col-6 col-md-3  bg-custom-3 text-white py-4 border-custom1 wow animate__animated animate__fadeInRightBig">
      <i class="fas fa-boxes fa-3x "></i>
      <div id="number3" class=" pt-4">10</div>
      <span class="span-category"></span>
      <div class="pt-1 category">Categorie</div>
    </div>
    <div class="col-6 col-md-3  bg-custom-4 text-white py-4 border-custom1 wow animate__animated animate__fadeInRight">
      <i class="fas fa-smile-wink fa-3x "></i>
      <div id="number4" class=" pt-4">1000</div> 
      <span class="span-category"></span>
      <div class="pt-1 category h6">Opportunità</div>    
    </div>
  </div>
</div>

</div> <!--End Container-bg-->

{{-- Carosello Sezione Categorie --}}

<div class="container my-5">
  <div class="row ">
    <div class="col-12 text-center pt-3 mt-2 wow animate__animated animate__heartBeat">
      <h2 class="font-weight-bold h2title">{{__('ui.category')}}</h2>
    </div>
    <div class="section-title-divider1"></div>
  </div>

  <!--Carousel Wrapper-->
  <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">



    <!--Slides-->
    <div class="carousel-inner pt-4" role="listbox">
     
      <!--First slide-->
      <div class="carousel-item active">

        <div class="row">
          <div class="col-12 col-md-4">
            <figure class="snip1166 shadow navy hover label1">
              <img src="/img/cat1.jpg" class="img-fluid" alt="sample72"/>
              <figcaption>
                <h3> <i class="fas fa-tshirt pr-2"></i> Abbigliamento</h3>
                <div>
                </div><a href="http://localhost:8000/category/Abbigliamento/1/announcements"></a>
              </figcaption>
            </figure>
          </div>

          <div class="col-12 col-md-4 clearfix ">
            <figure class="snip1166 shadow navy hover label2">
              <img src="/img/cat2.jpg" class="img-fluid" alt="sample72"/>
              <figcaption >
                <h3><i class='fas fa-mobile-alt pr-2'></i> Elettronica</h3>
                <div>
                </div><a href="http://localhost:8000/category/Elettronica/5/announcements"></a>
              </figcaption>
            </figure>
          </div>

          <div class="col-12 col-md-4 clearfix ">
            <figure class="snip1166 shadow navy hover label3">
              <img src="/img/cat3.jpg" class="img-fluid" alt="sample72"/>
              <figcaption>
                <h3> <i class="fas fa-car pr-2"></i> Auto</h3>
                <div>
                </div><a href="http://localhost:8000/category/Auto/4/announcements"></a>
              </figcaption>
            </figure>
          </div>
        </div>

      </div>
      <!--/.First slide-->

      <!--Second slide-->
      <div class="carousel-item">

        <div class="row">
          <div class="col-12 col-md-4">
            <figure class="snip1166 shadow navy hover label1">
              <img src="/img/cat4.jpg" class="img-fluid" alt="sample72"/>
              <figcaption>
                <h3> <i class='fas fa-music pr-2'></i> Musica</h3>
                <div>
                </div><a href="http://localhost:8000/category/Musica/8/announcements"></a>
              </figcaption>
            </figure>
          </div>

          <div class="col-12 col-md-4 clearfix ">
            <figure class="snip1166 shadow navy hover label2">
              <img src="/img/cat5.jpg" class="img-fluid" alt="sample72"/>
              <figcaption>
                <h3> <i class='fas fa-running pr-2'></i> Sport</h3>
                <div>
                </div><a href="http://localhost:8000/category/Sport/9/announcements"></a>
              </figcaption>
            </figure>
          </div>

          <div class="col-12 col-md-4 clearfix  d-md-block">
            <figure class="snip1166 shadow navy hover label3">
              <img src="/img/cat6.jpg" class="img-fluid" alt="sample72"/>
              <figcaption>
                <h3> <i class='fas fa-home pr-2'></i> Arredamento</h3>
                <div>
                </div><a href="http://localhost:8000/category/Arredamento/3/announcements"></a>
              </figcaption>
            </figure>
          </div>
        </div>

      </div>
      <!--/.Second slide-->
    </div>
    <!--/.Slides-->

<!--Controls-->
<div class="controls-top text-center pt-3">
  <a class="text-dark" href="#multi-item-example " data-slide="prev"><i class="fas fa-chevron-circle-left fa-3x"></i></a>
  <a class="text-dark" href="#multi-item-example" data-slide="next"><i class="fas fa-chevron-circle-right fa-3x"></i></a>
</div>
<!--/.Controls-->

  </div>
  <!--/.Carousel Wrapper-->


</div>



{{-- Sezione Ultimi annunci inseriti --}}
<div class="container-fluid container-bg-1">
<div class="container photomast pb-5">
  <div class="row">
    <div class="col-12 text-center pt-5 mt-2 wow animate__animated animate__heartBeat">
      <h2 class="font-weight-bold h2title ">{{__('ui.welcomeTitle')}}</h2>
    </div>
    <div class="section-title-divider1"></div>
  </div>
    
  <div class="row">
    <div class="card-group py-5">
    
      @foreach ($announcements as $announcement)
       @include('_announcement')
       @endforeach

 
  </div>
 </div>
</div>
</div> <!-- /.container -->

</div>

@push('script')

<script>
    $(".hover").mouseleave(
    function () {
      $(this).removeClass("hover");
    }
  );
</script>


<script>
  (function() {
  var $$ = function(selector, context) {
    var context = context || document;
    var elements = context.querySelectorAll(selector);
    return [].slice.call(elements);
  };
  function _fncSliderInit($slider, options) {
    var prefix = ".fnc-";
    var $slider = $slider;
    var $slidesCont = $slider.querySelector(prefix + "slider__slides");
    var $slides = $$(prefix + "slide", $slider);
    var $controls = $$(prefix + "nav__control", $slider);
    var $controlsBgs = $$(prefix + "nav__bg", $slider);
    var $progressAS = $$(prefix + "nav__control-progress", $slider);
    var numOfSlides = $slides.length;
    var curSlide = 1;
    var sliding = false;
    var slidingAT = +parseFloat(getComputedStyle($slidesCont)["transition-duration"]) * 1000;
    var slidingDelay = +parseFloat(getComputedStyle($slidesCont)["transition-delay"]) * 1000;
    var autoSlidingActive = false;
    var autoSlidingTO;
    var autoSlidingDelay = 5000; // default autosliding delay value
    var autoSlidingBlocked = false;
    var $activeSlide;
    var $activeControlsBg;
    var $prevControl;
    function setIDs() {
      $slides.forEach(function($slide, index) {
        $slide.classList.add("fnc-slide-" + (index + 1));
      });
      $controls.forEach(function($control, index) {
        $control.setAttribute("data-slide", index + 1);
        $control.classList.add("fnc-nav__control-" + (index + 1));
      });
      $controlsBgs.forEach(function($bg, index) {
        $bg.classList.add("fnc-nav__bg-" + (index + 1));
      });
    };
    setIDs();
    function afterSlidingHandler() {
      $slider.querySelector(".m--previous-slide").classList.remove("m--active-slide", "m--previous-slide");
      $slider.querySelector(".m--previous-nav-bg").classList.remove("m--active-nav-bg", "m--previous-nav-bg");
      $activeSlide.classList.remove("m--before-sliding");
      $activeControlsBg.classList.remove("m--nav-bg-before");
      $prevControl.classList.remove("m--prev-control");
      $prevControl.classList.add("m--reset-progress");
      var triggerLayout = $prevControl.offsetTop;
      $prevControl.classList.remove("m--reset-progress");
      sliding = false;
      var layoutTrigger = $slider.offsetTop;
      if (autoSlidingActive && !autoSlidingBlocked) {
        setAutoslidingTO();
      }
    };
    function performSliding(slideID) {
      if (sliding) return;
      sliding = true;
      window.clearTimeout(autoSlidingTO);
      curSlide = slideID;
      $prevControl = $slider.querySelector(".m--active-control");
      $prevControl.classList.remove("m--active-control");
      $prevControl.classList.add("m--prev-control");
      $slider.querySelector(prefix + "nav__control-" + slideID).classList.add("m--active-control");
      $activeSlide = $slider.querySelector(prefix + "slide-" + slideID);
      $activeControlsBg = $slider.querySelector(prefix + "nav__bg-" + slideID);
      $slider.querySelector(".m--active-slide").classList.add("m--previous-slide");
      $slider.querySelector(".m--active-nav-bg").classList.add("m--previous-nav-bg");
      $activeSlide.classList.add("m--before-sliding");
      $activeControlsBg.classList.add("m--nav-bg-before");
      var layoutTrigger = $activeSlide.offsetTop;
      $activeSlide.classList.add("m--active-slide");
      $activeControlsBg.classList.add("m--active-nav-bg");
      setTimeout(afterSlidingHandler, slidingAT + slidingDelay);
    };
    function controlClickHandler() {
      if (sliding) return;
      if (this.classList.contains("m--active-control")) return;
      if (options.blockASafterClick) {
        autoSlidingBlocked = true;
        $slider.classList.add("m--autosliding-blocked");
      }
      var slideID = +this.getAttribute("data-slide");
      performSliding(slideID);
    };
    $controls.forEach(function($control) {
      $control.addEventListener("click", controlClickHandler);
    });
    function setAutoslidingTO() {
      window.clearTimeout(autoSlidingTO);
      var delay = +options.autoSlidingDelay || autoSlidingDelay;
      curSlide++;
      if (curSlide > numOfSlides) curSlide = 1;
      autoSlidingTO = setTimeout(function() {
        performSliding(curSlide);
      }, delay);
    };
    if (options.autoSliding || +options.autoSlidingDelay > 0) {
      if (options.autoSliding === false) return;
      autoSlidingActive = true;
      setAutoslidingTO();
      $slider.classList.add("m--with-autosliding");
      var triggerLayout = $slider.offsetTop;
      var delay = +options.autoSlidingDelay || autoSlidingDelay;
      delay += slidingDelay + slidingAT;
      $progressAS.forEach(function($progress) {
        $progress.style.transition = "transform " + (delay / 1000) + "s";
      });
    }
    $slider.querySelector(".fnc-nav__control:first-child").classList.add("m--active-control");
  };
  var fncSlider = function(sliderSelector, options) {
    var $sliders = $$(sliderSelector);
    $sliders.forEach(function($slider) {
      _fncSliderInit($slider, options);
    });
  };
  window.fncSlider = fncSlider;
  }());
  /* not part of the slider scripts */
  /* Slider initialization
  options:
  autoSliding - boolean
  autoSlidingDelay - delay in ms. If audoSliding is on and no value provided, default value is 5000
  blockASafterClick - boolean. If user clicked any sliding control, autosliding won't start again
  */
  fncSlider(".example-slider", {autoSlidingDelay: 4000});
  var $demoCont = document.querySelector(".demo-cont");
  [].slice.call(document.querySelectorAll(".fnc-slide__action-btn")).forEach(function($btn) {
  $btn.addEventListener("click", function() {
    $demoCont.classList.toggle("credits-active");
  });
  });
  document.querySelector(".demo-cont__credits-close").addEventListener("click", function() {
  $demoCont.classList.remove("credits-active");
  });
  document.querySelector(".js-activate-global-blending").addEventListener("click", function() {
  document.querySelector(".example-slider").classList.toggle("m--global-blending-active");
  });
</script>





@endpush
@endsection




