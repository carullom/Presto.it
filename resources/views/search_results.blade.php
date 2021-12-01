@extends('layouts.app')
@section('content')
    
<div class="container-fluid container-bg-1 pb-5">
<div class="container py-5">
    <div class="row py-5">
        <div class="col-12">
        <h2 class="category-title text-uppercase pt-5">Risultati per la ricerca: <span class="product-title text-lowercase text-capitalize"> {{$search}} </span></h2>
      </div>
    </div>
    <div class="row">
        @foreach ($announcements as $announcement)
            
      @include('_announcement')
        
        @endforeach
    </div>
</div>
</div>
@endsection