@extends('layouts.app')

@section('content')

@if(count($announcements)>0)


<div class="container my-5 py-5">
    <div class="row my-5 py-5">
      <div class="col-12 text-center">
        <h2 class="font-weight-bold h2title ">Annunci rifiutati</h2>
      </div>
      <div class="section-title-divider3"></div>
        <div class="col-12">
            <div class="table-responsive shadow">
            <table class="table table-striped ">
                <thead>
                  <tr class="font-weight-bold text-white bg-custom2 title-ann h4">
                    <th scope="col">Id <i class="far fa-id-badge pl-2"></i></th>
                    <th scope="col">Titolo <i class="fas fa-pen-alt pl-2"></i></th>
                    <th scope="col">Utente <i class="fas fa-user pl-2"></i></th>
                    <th scope="col">Inserito <i class="far fa-clock pl-2"></i></th>
                    <th scope="col">Ripristina <i class="fas fa-check-square pl-2"></i></th>
                    <th scope="col">Elimina<i class="fas fa-window-close pl-2"></i></th>
                  
                    
                  </tr>
                </thead>
                <tbody>
                    @foreach ($announcements as $announcement)
                    <tr class="h5">
                        <th scope="row">{{$announcement->id}}</th>
                        <td>{{$announcement->title}}</td>
                        <td>{{$announcement->user->name}}</td>
                        <td>{{$announcement->created_at}}</td>
                        <td><form action="{{route('revisor.restore', $announcement->id)}}" method="POST">
                          @csrf
                          <button type="submit" class="btn btn-success accetta"><i class="fas fa-check fa-1x"></i></button></form>
                      </td>
                      <td><form action="{{route('revisor.delete', $announcement->id)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger rifiuta"><i class="fas fa-times fa-1x"></i></button></form>
                    </td>
                       
                      </tr>
                    @endforeach
                  
                </tbody>
              </table>
            </div>   
        </div>
    </div>
</div>
@else
<div class="container-fluid py-5 my-5">
  <div class="row justify-content-center my-5">
     <div class="col-md-6 py-5 text-center">
        <h2 class="h2title pt-5 mt-5 pb-2">Non ci sono annunci</h2>
        <div class="section-title-divider1 "></div> 
     </div>
  </div>
</div>
</div>

@endif
@endsection