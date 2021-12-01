<nav class="navbar  navbar-expand-ipad navbar-expand-lg navbar-light bg-white shadow-sm fixed-top pt-2 navbar-ipad">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img class="mb-2" src="/img/presto2.png" width="50px" alt="">
             Presto.it
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        CATEGORIE
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($categories as $category)
                       
                        <a class="dropdown-item" href="{{route('public.announcements.category',[
                        $category->name,
                        $category->id
                    ])}}"><i class="{{$fonts[$category->id]}}"></i>  {{$category->name}} </a>
                        
                        @endforeach
                        
                    </div>
                </li>  
                <li class=""><a href="{{route('announcement.new')}}" class="btn font-weight-bold px-0 px-lg-2">{{__('ui.announcement')}}</a>
                </li> 
               
            </ul>
            
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li>
                    <form action="{{route('public.search')}}" method="GET" class=" mt-1">
                        <input type="text" name="search" placeholder="Cerca"  >
                        <button class="btn btn-warning btn-sm mr-lg-3 searchbtn shadow btn-ipadpro" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </li>
                
                
                
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-dark font-weight-bold" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-dark font-weight-bold" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                
                @if ((Auth::user()->is_revisor)==1)
                <li class="nav-item dropdown">
                    {{-- <a href="{{route('revisor.home')}}" class="nav-link">
                        Revisore
                        <span class="badge badge-pill badge-warning">
                            {{\App\Announcement::ToBeRevisionedCount()}}
                        </span>
                    </a> --}}
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-uppercase text-dark font-weight-bold" href="{{route('revisor.home')}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> 
                        Revisore
                        <span class="badge badge-pill badge-warning">
                            {{\App\Announcement::ToBeRevisionedCount()}}
                        </span>
                    </a>
                    
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{route('revisor.home')}}">Da approvare <span class="badge badge-pill badge-success">
                            {{\App\Announcement::ToBeRevisionedCount()}}
                        </span></a>
                        <a class="dropdown-item" href="{{route('revisor.historicalRevisor')}}"> Rifiutati <span class="badge badge-pill badge-danger">
                            {{\App\Announcement::ToBeRejectedCount()}}
                        </span></a> 
                        <a class="dropdown-item" href="{{route('revisor.userRevisor')}}"> Nomina revisore </a>
                       
                    </div>
                    
                </li>
                
                @endif
                
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('home') }}">Profilo</a>
                        <a class="dropdown-item" href="{{route('revisor.historical')}}"> Storico</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                   
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            @endguest
            
            <li class="nav-item">
                @include('layouts._locale', ['lang' => 'it', 'nation' => 'it'])
                 </li>
                 <li class="nav-item">
                     @include('layouts._locale', ['lang' => 'en', 'nation' => 'gb'])
                 </li>
                 <li class="nav-item">
                     @include('layouts._locale', ['lang' => 'es', 'nation' => 'es'])
                 </li>
                {{--  <li class="nav-item dropdown">
                    <a id="nanvbarDropdown2" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        @include('layouts._locale', ['lang' => 'it', 'nation' => 'it'])<span class="caret"></span>
                    </a>
                    
                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                       <a class="dropdown-item"> @include('layouts._locale', ['lang' => 'en', 'nation' => 'gb'])</a>
                       <a class="dropdown-item"> @include('layouts._locale', ['lang' => 'es', 'nation' => 'es'])</a>
                    </div>
                </li>  --}}
        </ul>
    </div>
</div>
</nav>