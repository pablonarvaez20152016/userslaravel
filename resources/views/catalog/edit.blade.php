@extends('layouts.master')
 
@section('links')
<link rel="stylesheet" href="{{ url('/assets/bootstrap/css/vistaspersonalizadas.css') }}">
@endsection
@section('content')
<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Modificar película
         </div>
         <div class="card-body" style="padding:20px">

          <form action="#" method="POST" type="file" enctype="multipart/form-data" name="formulario" id="formulario">
             	
         {{ method_field('PUT') }}
          @csrf
               
               <div class="form-group">
                  <label  for="title:">Titulo</label>
                  <input class="form-control" name="title" id="title" type="text" value="{{$pelicula->title}}" required
                  oninvalid="setCustomValidity('El campo titulo es obligatorio')" oninput="setCustomValidity('')">
               </div>

               <div class="form-group">
                     <label for="year:">Año</label>
                     <input class="form-control" name="year" id="year" type="text" value="{{$pelicula->year}}" 
                     oninvalid="setCustomValidity('El campo año es obligatorio')" oninput="setCustomValidity('')">
               </div>

               <div class="form-group">
                     <label for="director:">Director</label>
                     <input class="form-control" name="director" id="director" type="text" value="{{$pelicula->director}}" required
                     oninvalid="setCustomValidity('El campo director es obligatorio')" oninput="setCustomValidity('')">
               </div>

               <div class="form-group">
                     <label for="poster:">Poster</label>
                     <input class="form-control" name="poster" id="poster" type="text" value="Poster" required
                     oninvalid="setCustomValidity('El campo poster es obligatorio')" oninput="setCustomValidity('')">
               </div>

               <div class="form-group">
                     <label for="synopsis:">Resumen</label>
                     <textarea name="synopsis" id="synopsis" cols="68" rows="10" required
                     oninvalid="setCustomValidity('El campo resumen es obligatorio')" oninput="setCustomValidity('')">
                     {{$pelicula->synopsis}}"</textarea>
               </div>

               <div><button type="submit"  class="btn btn-primary">Modificar Pelicula</button></div>

            </form>

         </div>
      </div>
   </div>
</div>
@stop