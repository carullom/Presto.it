@extends('layouts.app')

@section('content')

<div class="container-fluid container-bg-7 ">
    <div class="container py-5">
        <div class="row justify-content-center py-5">
            <div class="col-md-8 py-5 wow animate__animated animate__rollIn">
                <div class="card shadow ">
                    <h2 class="card-header font-weight-bold bg-warning title-ann text-center">Profilo<i class="far fa-id-card pl-3"></i> </h2>
                    
                    <div class="card-body">
                       
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        
                        <h3 class="font-weight-bold text-center py-3">Benvenuto/a nella tua area personale di Presto.it!</h3>
                        <hr> 
                        <div class="row">
                        <div class="col-12 col-md-4 text-center">
                            <div> 
                                <img alt="User Pic" src="/img/6292.jpg" id="profile-image1" class="img-circle img-responsive">
                                <input id="profile-image-upload" class="hidden" type="file">
                            </div>

                        </div>
                        <div class="col-12 col-md-8 text-center">
                        @if (Auth::user()->is_revisor) 
                        <h3 class="py-3 font-weight-bold text-center"><i class="fas fa-user-shield text-danger px-3" title="Is_Revisor"></i>{{ Auth::user()->name }} sei un revisore  </h3>
                        @else
                        <h3 class="py-3 font-weight-bold text-center"><i class="fas fa-user text-success px-3" title="Is_Normal"></i>{{ Auth::user()->name }} sei un utente basic </h3>
                        @endif
                    </div>
                   </div>     
                   <hr>
                   <div class="row">
                    <div class="col-12 col-md-4">
                    <h4 class="pb-4 pt-2 font-weight-bold text-left"> <i class="fas fa-envelope-open pr-2"></i> Email  </h4>
                       </div>
                       <div class="col-12 col-md-8">
                        <h4 class="pb-4 pt-2 font-weight-bold text-center "><span class="text-primary"> {{Auth::user()->email}} </span></h4>
                       </div>
                   </div>
                       
                   <div class="row">
                    <div class="col-12 col-md-4">
                    <h4 class="pb-4 pt-2 font-weight-bold text-left"> <i class="fas fa-sticky-note"></i> Annunci </h4>
                       </div>
                       <div class="col-12 col-md-8">
                        <h4 class=" pb-4 pt-2 font-weight-bold text-center h3"> 
                            <a class="text-decoration-none text-success" href="{{route('revisor.historical')}}">{{\App\Announcement::AnnouncementsForUser()}}<i class="fas fa-check-circle pl-1"></i></a>
                        </h4>
                       </div>
                   </div>
                   <div class="row">
                    <div class="col-12 col-md-4">
                    <h4 class=" pb-4 pt-2 font-weight-bold text-left"> <i class="fas fa-calendar-alt"></i> Registrato/a </h4>
                       </div>
                       <div class="col-12 col-md-8">
                         <h4 class="pb-4 pt-2 font-weight-bold text-center text-muted ">{{Auth::user()->created_at}} </h4>
                       </div>
                   </div>
                        
                       
                   
                    </div> <!--End-card body-->  
                </div>
            </div>
        </div>
    </div>
</div>



@push('script')
<script>
    $(function() {
        $('#profile-image1').on('click', function() {
            $('#profile-image-upload').click();
        });
    });       
</script>  
@endpush



@endsection
