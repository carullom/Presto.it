@extends('layouts.app')
@section('content')

<div class="container-fluid container-bg-1">
 <div class="container mt-5 py-5">
  <div class="row my-5">
    <div class="col-12">
    <h1 class="h2title pb-1 font-weight-bold"> Dettaglio prodotto <i class="fas fa-cart-arrow-down"></i></h1>
  </div>
</div>

<div class="bg-light pt-3 shadow px-5 rounded">
  <div class="row my-4 align-items-center pb-5">
    <div class="col-12 col-md-6 ">
      <div class="carousel-container position-relative row shadow">
    
        <!-- Sorry! Lightbox doesn't work - yet. -->     
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            @foreach ($announcement->images as $key => $image)
          <div class="carousel-item @if($key == 0) active @endif" data-slide-number="{{$loop->index}}">
              <img src="{{$image->getUrl(600,400)}}" class="d-block  img-fluid" alt="..." data-remote="{{$image->getUrl(300,150)}}" data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
            </div>
            @endforeach
            
          </div>
        </div>
        
        <!-- Carousel Navigation -->
        <div id="carousel-thumbs" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="row mx-0">
                @foreach ($announcement->images as $image)
                <div id="carousel-selector-{{$loop->index}}" class="thumb col-4 col-sm-2 px-1 py-2 selected" data-target="#myCarousel" data-slide-to="{{$loop->index}}">
                  
                  <img src="{{$image->getUrl(300,150)}}" class="img-fluid" alt="...">
                </div>
                @endforeach
                {{-- <div id="carousel-selector-1" class="thumb col-4 col-sm-2 px-1 py-2" data-target="#myCarousel" data-slide-to="1">
                  <img src="https://source.unsplash.com/tXqVe7oO-go/600x400/" class="img-fluid" alt="...">
                </div>
                <div id="carousel-selector-2" class="thumb col-4 col-sm-2 px-1 py-2" data-target="#myCarousel" data-slide-to="2">
                  <img src="https://source.unsplash.com/qlYQb7B9vog/600x400/" class="img-fluid" alt="...">
                </div>
                <div id="carousel-selector-3" class="thumb col-4 col-sm-2 px-1 py-2" data-target="#myCarousel" data-slide-to="3">
                  <img src="https://source.unsplash.com/QfEfkWk1Uhk/600x400/" class="img-fluid" alt="...">
                </div>
                <div id="carousel-selector-4" class="thumb col-4 col-sm-2 px-1 py-2" data-target="#myCarousel" data-slide-to="4">
                  <img src="https://source.unsplash.com/CSIcgaLiFO0/600x400/" class="img-fluid" alt="...">
                </div>
                <div id="carousel-selector-5" class="thumb col-4 col-sm-2 px-1 py-2" data-target="#myCarousel" data-slide-to="5">
                  <img src="https://source.unsplash.com/a_xa7RUKzdc/600x400/" class="img-fluid" alt="...">
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="row mx-0">
                <div id="carousel-selector-6" class="thumb col-4 col-sm-2 px-1 py-2" data-target="#myCarousel" data-slide-to="6">
                  <img src="https://source.unsplash.com/uanoYn1AmPs/600x400/" class="img-fluid" alt="...">
                </div>
                <div id="carousel-selector-7" class="thumb col-4 col-sm-2 px-1 py-2" data-target="#myCarousel" data-slide-to="7">
                  <img src="https://source.unsplash.com/_snqARKTgoc/600x400/" class="img-fluid" alt="...">
                </div>
                <div id="carousel-selector-8" class="thumb col-4 col-sm-2 px-1 py-2" data-target="#myCarousel" data-slide-to="8">
                  <img src="https://source.unsplash.com/M9F8VR0jEPM/600x400/" class="img-fluid" alt="...">
                </div>
                <div id="carousel-selector-9" class="thumb col-4 col-sm-2 px-1 py-2" data-target="#myCarousel" data-slide-to="9">
                  <img src="https://source.unsplash.com/Q1p7bh3SHj8/600x400/" class="img-fluid" alt="...">
                </div> --}}
                <div class="col-2 px-1 py-2"></div>
                <div class="col-2 px-1 py-2"></div>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carousel-thumbs" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carousel-thumbs" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        
        </div> <!-- /row -->
     </div>
     
   
    <div class="col-12 col-md-6 pl-lg-5 ">
      <h2 class="product-title1 pt-3 font-weight-bold">{{$announcement->title}}</h2>
      <h4 class="font-weight-bold pt-3">Categoria: <a href="{{route('public.announcements.category',[
        $announcement->category->name,
        $announcement->category->id,
        ])}}"> {{$announcement->category->name}}</a></h4>
        <hr>
        <p class="product-description pt-4 h5">{{$announcement->body}}</p>  
        <div class="row py-4">
          <div class="col-6"> <h5 class="price"> PREZZO: <span> {{$announcement->price}} €</span></h5></div>
          <div class="col-6"> <button class="add-to-cart btn btn-default btn-warning shadow" type="button"> <i class="fas fa-shopping-cart"></i> Acquista</button></div>
        </div>
        <hr>
        <h5 class="pt-3 text-muted">Inserito il {{$announcement->created_at->format('d/m/Y')}} da 
          {{$announcement->user->name}} </h5>
          <button type="button" class="btn mt-3 btn-warning shadow" data-toggle="modal" data-target="#exampleModal">  <i class="fas fa-envelope-open"></i>
             Contatta il venditore
          </button>
    </div>
  </div>

 </div>

   


{{-- modale --}}
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   
  <div class="modal-dialog "> 
 
    <div class="modal-content shadow bg-warning">
      
      <div class="row justify-content-center my-5">
       
        <div class="col-10 col-md-8"> 
         
          <div class="pb-3">
              <h3 class="pb-3 title-ann2 text-center font-weight-bold">Contatta il venditore</h3>

          </div>
            <form method="POST" action="{{route('revisor.submit')}}">
            @csrf
            <div class="form-group py-2">
                  <label for="exampleInputAnn" class="text-uppercase font-weight-bold"> <i class="far fa-sticky-note"></i>  Annuncio #</label>
                  <input type="text" name="announcement" class="form-control" id="exampleInputAnn" aria-describedby="announcementHelp" value="{{$announcement->id}}">
              </div>
                <div class="form-group py-2">
                    <label for="exampleInputEmail1" class="text-uppercase font-weight-bold"><i class="fas fa-envelope-open-text pr-2"></i> Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" {{-- value="{{Auth::user()->email}}"--}}>
                </div>
                <div class="form-group py-2">
                    <label for="exampleFormControlTextarea1" class="text-uppercase font-weight-bold"> <i class="far fa-comment pr-2"></i> Messaggio</label>
                    <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3" placeholder="..."></textarea>
                </div>
                <div class="text-center">
                 <button class="btn btn-dark text-white shadow px-5 font-weight-bold" type="submit">Invia</button>    
                </div>
            </form>
        </div>
       </div>
     
    </div>
    </div>
  </div>
</div>
</div>
</div>  

@endsection