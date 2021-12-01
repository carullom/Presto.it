


  {{-- <div class="col-12 col-md-6 col-lg-4 my-4">
  <a href="{{route('public.announcement.detail', $announcement->id)}}" class="text-decoration-none">
    <div class="card shadow h-100">

      @foreach ($announcement->images as $image)

      <img class="card-img-top img" src="{{$image->getUrl(300,150)}}" alt="Card image cap"> 
      @if ($image)
      @break
      @endif
      @endforeach
    
      
      <div class="card-body">
        <h3 class="card-title ctitle text-uppercase text-dark">{{$announcement->title}}</h3>
        <h4 class="font-weight-bold text-dark ">Categoria: <a href="{{route('public.announcements.category',[
          $announcement->category->name,
          $announcement->category->id,
          ])}}"> {{$announcement->category->name}}</a></h4>
        <p class="card-text">{{$announcement->body}}</p>
        <h5 class="price float-right"> PREZZO: <span> {{$announcement->price}} €</span></h5>
        <div class="py-5 mb-2">
          <button class="add-to-cart btn btn-default btn-warning shadow float-right" type="button"> <i class="fas fa-shopping-cart"></i> Acquista</button>
        </div>
        <h5 class="card-text card-footer "> <small class="text-muted">Inserito da 
          {{$announcement->user->name}} {{$announcement->created_at->format('d/m/Y')}} alle ore {{$announcement->created_at->format('H:i:s')}}</small></h5>
        </div>

      </div>
  </a>
</div> --}}

<div class="col-12 col-md-6 col-lg-4 pb-5 wow animate__animated animate__backInUp ">
  <a href="{{route('public.announcement.detail', $announcement->id)}}" class="text-decoration-none a-card">
    <figure class="snip1249 shadow ">
      <i class="fas fa-shopping-cart text-white"></i>
     <div class="card"> 
      <div class="image">
        @foreach ($announcement->images as $image)
        <img class="card-img-top img" src="{{$image->getUrl(440,320)}}" alt="Card image cap"> 
        @if ($image)
        @break
        @endif
        @endforeach
      </div>
      <figcaption>
        
        <h5 class="text-uppercase text-decoration-none font-weight-bold product-card-title">{{$announcement->title}}</h5> 
        <h5 class="font-weight-bold text-dark ">Categoria: <a href="{{route('public.announcements.category',[
          $announcement->category->name,
          $announcement->category->id,
          ])}}"> {{$announcement->category->name}}</a></h5>
          <hr>  
        <p>{{$announcement->body}}...</p>
  
        <div class="price text-white">
         <p>€ {{$announcement->price}}</p>
        </div>
        <a href="#" class="add-to-cart">Acquista</a>
      </figcaption>
  
      {{-- <h5 class="card-text card-footer footer-ann"> <small class="text-muted">Inserito da 
      {{$announcement->user->name}} {{$announcement->created_at->format('d/m/Y')}} alle ore {{$announcement->created_at->format('H:i:s')}}</small></h5> --}}
    </div>
    </figure>
    
  
  
  </a>
 
</div>