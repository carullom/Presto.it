@extends('layouts.app')

@section('content')

@if ($announcement)

<div class="container py-5 my-5">
   <h2 class="h2title text-center pt-5">Gli annunci eliminati</h2>
   <div class="section-title-divider3"></div>
   <div class="row justify-content-center py-5 ">
      <div class="col-md-8">
         <div class="card shadow">
            <div class="card-header h3 font-weight-bold bg-warning title-ann text-center">Annuncio # {{$announcement->id}}</div>
            <div class="card-body">
               <div class="row">
                  <div class="col-md-3">
                     <p class="font-weight-bold">UTENTE</p  >
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
                     <p class="font-weight-bold">TITOLO </p>
                  </div>
                  <div class="col-md-9"> {{$announcement->title}}</div>
               </div>
               <div class="row my-4">
                  <div class="col-md-3">
                     <p class="font-weight-bold">DESCRIZIONE</p>
                  </div>
                  <div class="col-md-9"> {{$announcement->body}}</div>
               </div>
               <div class="row my-4">
                  <div class="col-md-3">
                     <p class="font-weight-bold">PREZZO</p>
                  </div>
                  <div class="col-md-9"> {{$announcement->price}} € </div>
               </div>
               <div class="row my-4">
                  <div class="col-md-3">
                     <p class="font-weight-bold">IMMAGINI</p>
                  </div>
                  <div class="col-md-9">
                     <div class="row mb-2">
                        <div class="col-md-4">
                           <img src="https://via.placeholder.com/300x150.png" class="rounded" alt="">
                        </div>
                     </div>
                     <div class="row mb-2">
                        <div class="col-md-4">
                           <img src="https://via.placeholder.com/300x150.png" class="roundeD" alt="">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row justify-content-center mt-5">
                  <div class="col-md-6 text-center">
                     <form action="{{route('revisor.restore', $announcement->id)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success px-5 ">Ripristina</button>
                     </form>
                  </div>
               </div>
               @else
               <div class="container my-5 py-3">
                  <div class="row justify-content-center text-center my-5 py-5">
                     <div class="col-md-6 py-5">
                        <h2 class="h2title pt-5 mt-5 pb-2">Non ci sono annunci eliminati</h2>
                        <div class="section-title-divider1 mb-5"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
     
               @endif
               
               @endsection