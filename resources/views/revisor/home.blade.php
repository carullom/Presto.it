@extends('layouts.app')

@section('content')


@if ($announcement)

<div class="container-fluid container-bg-4 py-5">
<div class="container py-5"> 
   <h2 class="h2title text-center pt-5 font-weight-bold">Gli annunci da visionare</h2>
   <div class="section-title-divider3"></div>  
   <div class="row justify-content-center">
      
      <div class="col-md-8 wow animate__animated animate__zoomIn">
         <div class="card shadow">
            <div class="card-header h3 font-weight-bold title-ann text-center text-white bg-custom2">Annuncio # {{$announcement->id}}</div>
            <div class="card-body ann-rev">
               <div class="row">
                  <div class="col-md-3">
                     <label for="user" class="font-weight-bold"> <i class="fas fa-user pr-2"></i> UTENTE</label>
                     </div>
                     <div class="col-md-9">
                        # {{ $announcement ->user->id}},
                        {{$announcement ->user->name}},
                        {{$announcement ->user->email}}
                     </div>
                  </div>
                  <hr>
                  <div class="row my-4">
                     <div class="col-md-3">
                        <label for="title" class="font-weight-bold"> <i class="fas fa-pencil-alt pr-2"></i> TITOLO</label>
                     </div>
                     <div class="col-md-9"> {{$announcement->title}}</div>
                  </div>
                  <div class="row my-4">
                     <div class="col-md-3">
                        <label for="body" class="font-weight-bold"> <i class="far fa-sticky-note pr-2"></i>DESCRIZIONE</label>
                     </div>
                     <div class="col-md-9"> {{$announcement->body}}</div>
                  </div>
                  <div class="row my-4">
                     <div class="col-md-3">
                        <label for="price " class="font-weight-bold"><i class="fas fa-euro-sign pr-2"></i>PREZZO</label>
                     </div>
                     <div class="col-md-9"> {{$announcement->price}} € </div>
                  </div>
                  <hr>  
                  <div class="row my-4">
                     <div class="col-md-3">
                        <label for="images" class="font-weight-bold"> <i class="fas fa-image pr-2"></i>IMMAGINI</label>
                     </div>
                     <div class="col-md-9">
                        <div class="row mb-2">
                           <div class="col-md-8 col-lg-9">
                              @foreach ($announcement->images as $image)
                              
                              
                              <img 
                              src="{{ $image->getUrl(300, 150)}}" 
                              class="rounded my-3 img-fluid" alt="">
                              <div class="font-weight-bold">
                                 CONTENUTI PER ADULTI<div class="ldBar label-center" style="width:100%;height:60px", data-stroke="data:ldbar/res,gradient(0,2,#ffe924,#f46346,#01c4df)",
                                 data-preset="rainbow"
                                 data-value="
                                 @if($image->adult=='UNKNOWN') 0 
                                 @elseif($image->adult=='VERY_UNLIKELY') 100 
                                 @elseif($image->adult=='UNLIKELY') 75 
                                 @elseif($image->adult=='POSSIBLE') 50
                                 @elseif($image->adult=='LIKELY') 25
                                 @else 0
                                 @endif"></div><br>
                                 CONTENUTI DENIGRATORI  <div class="ldBar label-center" style="width:100%;height:60px", data-stroke="data:ldbar/res,gradient(0,2,#ffe924,#f46346,#01c4df)",
                                 data-preset="rainbow"
                                 data-value="
                                 @if($image->spoof=='UNKNOWN') 0 
                                 @elseif($image->spoof=='VERY_UNLIKELY') 100 
                                 @elseif($image->spoof=='UNLIKELY') 75 
                                 @elseif($image->spoof=='POSSIBLE') 50
                                 @elseif($image->spoof=='LIKELY') 25
                                 @else 0
                                 @endif"></div><br>
                                 CONTENUTI MEDICI <div class="ldBar label-center" style="width:100%;height:60px", data-stroke="data:ldbar/res,gradient(0,2,#ffe924,#f46346,#01c4df)",
                                 data-preset="rainbow"
                                 data-value="
                                 @if($image->medical=='UNKNOWN') 0 
                                 @elseif($image->medical=='VERY_UNLIKELY') 100 
                                 @elseif($image->medical=='UNLIKELY') 75 
                                 @elseif($image->medical=='POSSIBLE') 50
                                 @elseif($image->medical=='LIKELY') 25
                                 @else 0
                                 @endif"></div><br>
                                 CONTENUTI VIOLENTI <div class="ldBar label-center" style="width:100%;height:60px", data-stroke="data:ldbar/res,gradient(0,2,#ffe924,#f46346,#01c4df)",
                                 data-preset="rainbow"
                                 data-value="
                                 @if($image->violence=='UNKNOWN') 0 
                                 @elseif($image->violence=='VERY_UNLIKELY') 100 
                                 @elseif($image->violence=='UNLIKELY') 75 
                                 @elseif($image->violence=='POSSIBLE') 50
                                 @elseif($image->violence=='LIKELY') 25
                                 @else 0
                                 @endif"></div><br>
                                 CONTENUTI RAZZISTI <div class="ldBar label-center" style="width:100%;height:60px", data-stroke="data:ldbar/res,gradient(0,2,#ffe924,#f46346,#01c4df)",
                                 data-preset="rainbow"
                                 data-value="
                                 @if($image->racy=='UNKNOWN') 0 
                                 @elseif($image->racy=='VERY_UNLIKELY') 100 
                                 @elseif($image->racy=='UNLIKELY') 75 
                                 @elseif($image->racy=='POSSIBLE') 50
                                 @elseif($image->racy=='LIKELY') 25
                                 @else 0
                                 @endif"></div><br>
                                 {{-- {{$image->id}} <br>
                                 {{$image->file}} <br>
                                 {{Storage::url($image->file)}} <br>--}}
                                 <hr>
                                 <div>ETICHETTE
                                    <p>
                                       @if($image->labels)
                                       @foreach( $image->labels as $label) 
                                       <li>{{ $label }} </li>
                                       
                                       @endforeach
                                       
                                       @endif
                                    </p>
                                 </div>
                              </div>
                              @endforeach
                           </div>
                           
                        </div>
                        
                     </div>
                  </div>
               </div>
               
               
               
               <div class="card-footer">
               <div class="row justify-content-center py-2">
                  
                  <div class="col-6 text-center  ">
                     <form action="{{route('revisor.reject', $announcement->id)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger px-4 shadow">Rifiuta</button>
                     </form>
                  </div>
                  <div class="col-6 text-center ">
                     <form action="{{route('revisor.accept', $announcement->id)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success px-4 shadow">Accetta</button>
                     </form>
                  </div>
               </div>
               @else
               <div class="container-fluid container-bg-4 py-5">  
               <div class="container py-5 my-5">
                  <div class="row justify-content-center my-5">
                     <div class="col-md-6 py-5">
                        <h2 class="h2title pt-5 mt-5 pb-2 text-center">Non ci sono annunci da revisionare</h2>
                        <div class="section-title-divider3 "></div> 
                     </div>
                  </div>
               </div> <!--contanainer-->
               </div>
            </div>
         </div>
             @endif
               @endsection
