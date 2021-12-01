@extends('layouts.app')
@section('content')
    
<div class="container-fluid container-bg-5">
<div class="container pt-3 mt-5 ">
    <div class="row my-5 py-4">
        <div class="col-12 pt-3 align-self-center">
        <h2 class="category-title text-uppercase">  Annunci per categoria : <span class="product-title text-capitalize">{{$category->name}} </span> <i class="fas fa-boxes"></i></h2>
      </div>
    </div>
    <div class="row">
        @foreach ($announcements as $announcement)
            
      @include('_announcement')
        
        @endforeach
    </div>  
<div class="row py-4    ">
    <div class="col-12">
        {{$announcements->links()}}
    </div>
</div>
</div>
</div>









































@endsection