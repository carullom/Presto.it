@extends('layouts.app')

@section('content')

@if($announcements)

<div class="container-fluid container-bg-8 py-5 ">
<div class="container py-5">
    <div class="row py-5">
      <div class="col-12 text-center  ">
        <h2 class="font-weight-bold h2title ">Annunci inseriti</h2>
      </div>
      <div class="section-title-divider1"></div>
        <div class="col-12">
            <div class="table-responsive shadow">
            <table class="table table-striped ">
                <thead>
                  <tr class="font-weight-bold bg-warning title-ann h4">
                    <th scope="col">Id <i class="far fa-id-badge pl-2"></i></th>
                    <th scope="col">Titolo <i class="fas fa-pen-alt pl-2"></i></th>
                    <th scope="col">Utente <i class="fas fa-user pl-2"></i></th>
                    <th scope="col">Inserito <i class="far fa-clock pl-2"></i></th>
                    <th scope="col">Stato <i class="fas fa-toggle-on pl-2"></i></th>
                    
                  </tr>
                </thead>
                <tbody>
                    @foreach ($announcements as $announcement)
                    <tr class="h5">
                        <th scope="row">{{$announcement->id}}</th>
                        <td>{{$announcement->title}}</td>
                        <td>{{$announcement->user->name}}</td>
                        <td>{{$announcement->created_at}}</td>
                        <td>{{-- {{$announcement->is_accepted}} --}} @if($announcement->is_accepted==1) <i class="fas fa-check text-success"></i> @else <i class="fas fa-times text-danger"></i>  @endif </td>
                      </tr>
                    @endforeach
                  
                </tbody>
              </table>
            </div>   
        </div>
    </div>
</div>
</div>
@endif
@endsection