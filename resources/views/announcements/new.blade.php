@extends('layouts.app')

@section('content')

<div class="container-fluid container-bg-4 py-5">
<div class="container py-5">
    <div class="row pt-5">
        <div class="col-12 col-md-8 col-lg-6 offset-md-3 pt-5">
            @if ($errors->any())
            <div class="alert alert-danger font-weight-bold h4 text-center">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif 
        </div>


        <div class="col-12 col-md-8 col-lg-6 offset-md-3 wow animate__animated animate__fadeInDown">
            <div class="card shadow">
               <div class="card-header h3 font-weight-bold bg-warning title-ann text-center mb-3"><i class="fas fa-id-card pr-3"></i>Nuovo annuncio</div> 
               <div class="card-body">
                <form action="{{route('announcement.create')}}" method="POST">
                    @csrf
                    <input 
                    type="hidden"
                    name="uniqueSecret"
                    value="{{$uniqueSecret}}"
                    >
                    <div class="form-group font-weight-bold text-uppercase">
                        <label for="title"> <i class="fas fa-pencil-alt pr-2"></i>Titolo</label>
                        <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" value="{{old('title')}}">
                    </div>
                    <div class="form-group font-weight-bold text-uppercase">
                        <label for="body"> <i class="far fa-sticky-note pr-2"></i>Descrizione</label>
                        <textarea type="text" name="body" class="form-control" id="body" value="{{old('body')}}">
                        </textarea>
                    </div>
                    <div class="form-group font-weight-bold text-uppercase">
                        <label for="price "><i class="fas fa-euro-sign pr-2"></i>Prezzo</label>
                        <input type="text" name="price" class="form-control" id="price" value="{{old('price')}}">
                    </div>
    
                    <div class="pt-3">
                        <select name="category" id="category" class="text-uppercase">
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}"
                                {{old('category')==$category->id?'selected':''}}
                                >{{$category->name}}</option>
                                
                            @endforeach
                        </select>
                     </div>
                     <div class="form-group font-weight-bold text-uppercase mt-5">
                        <label for="images"> <i class="fas fa-image pr-2"></i>Immagini</label>
                       
                           <div class="dropzone" id="drophere"></div>
                           @error('images')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{$message}}</strong>
                           </span>
                           @enderror
                      
                    </div>
                    <div class="text-center ">
                    <button type="submit" class="btn btn-warning mt-5 shadow px-4" ><i class="fas fa-file-import pr-2"></i>Inserisci</button>
                </div>
                </form>
               </div>

            </div>
        </div>
       
       
        {{-- <div class="col-12 col-md-8 col-lg-6 offset-md-3 shadow ">
        
        
        
        <form action="{{route('announcement.create')}}" method="POST">
                @csrf
                <input 
                type="hidden"
                name="uniqueSecret"
                value="{{$uniqueSecret}}"
                >
                <div class="form-group font-weight-bold text-uppercase">
                    <label for="title ">Titolo</label>
                    <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" value="{{old('title')}}">
                </div>
                <div class="form-group font-weight-bold text-uppercase">
                    <label for="body ">Annuncio</label>
                    <input type="text" name="body" class="form-control" id="body" value="{{old('body')}}">
                </div>
                <div class="form-group font-weight-bold text-uppercase">
                    <label for="price ">Prezzo</label>
                    <input type="text" name="price" class="form-control" id="price" value="{{old('price')}}">
                </div>

                <div class="pt-3">
                    <select name="category" id="category" class="text-uppercase">
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}"
                            {{old('category')==$category->id?'selected':''}}
                            >{{$category->name}}</option>
                            
                        @endforeach
                    </select>
                 </div>
                 <div class="form-group font-weight-bold text-uppercase mt-4">
                    <label for="images ">Immagini</label>
                   
                       <div class="dropzone" id="drophere"></div>
                       @error('images')
                       <span class="invalid-feedback" role="alert">
                       <strong>{{$message}}</strong>
                       </span>
                       @enderror
                  
                </div>
                
                <button type="submit" class="btn btn-warning mt-5 shadow" >Inserisci</button>
            </form> --}}
        </div>
    </div>
</div>
</div>

@endsection