@extends('layouts.app')

@section('content')
<div class="container-fluid container-bg-4 pt-5">
<div class="container py-5">
    <div class="row justify-content-center py-5">
        
        <div class="col-12 col-md-8 col-lg-6 pt-5 wow animate__animated animate__rotateIn"> 
            <div class="card shadow">
                <div class="card-header bg-warning">
                    <h3 class="title-ann font-weight-bold text-center"> Lavora con noi <i class="fas fa-user-shield pl-2"></i></h3>
                </div>  
                <div class="card-body">
                    <form method="POST" action="{{route('revisor.submit')}}">
                        @csrf
                        <div class="form-group py-2">
                            <label for="exampleInputEmail1" class="text-uppercase font-weight-bold"><i class="fas fa-envelope-open-text pr-2"></i>Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{Auth::user()->email}}">
                        </div>
                        
                        <div class="form-group py-2">
                            <label for="exampleFormControlTextarea1" class="text-uppercase font-weight-bold"><i class="far fa-comment pr-2"></i>Messaggio</label>
                            <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3" placeholder="Spiegaci perché vuoi diventare revisore..."></textarea>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-warning shadow px-5 " type="submit"><i class="fas fa-file-import pr-2"></i>Invia</button>    
                        </div> 
                    </form>
                </div>    
            </div>
            
            
            
            
            
            
            
        </div>
    </div>
</div>

<div class="container-fluid container-bg-4">
@endsection

