@extends('layouts.app')

@section('content')

@if(count($users)>0)

<div class="container my-5 py-5">
    <div class="row my-5 py-5">
      <div class="col-12 text-center">
        <h2 class="font-weight-bold h2title "> Lista richieste revisore</h2>
      </div>
      <div class="section-title-divider3"></div>
        <div class="col-12">
            <div class="table-responsive shadow">
            <table class="table table-striped ">
                <thead>
                  <tr class="font-weight-bold bg-custom2 text-white title-ann h4">
                    <th scope="col">Id <i class="far fa-id-badge pl-2"></i></th>
                    <th scope="col">Nome <i class="fas fa-pen-alt pl-2"></i></th>
                    <th scope="col">Email <i class="fas fa-user pl-2"></i></th>
                     <th scope="col">Azione <i class="fas fa-check-square pl-2"></i></th>
                   
                  
                    
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="h5">
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td><form action="{{route('revisor.revisor', $user->id)}}" method="POST">
                          @csrf
                          <button type="submit" class="btn btn-success accetta"><i class="fas fa-check fa-1x"></i></button></form>
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
        <h2 class="h2title pt-5 mt-5 pb-2">Non ci sono richieste per diventare revisore</h2>
        <div class="section-title-divider1 "></div> 
     </div>
  </div>
</div>
</div>
@endif
@endsection