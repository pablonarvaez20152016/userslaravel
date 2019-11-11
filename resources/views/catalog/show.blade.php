@extends('layouts.master')
@section('links')
<link rel="stylesheet" href="{{ url('/assets/bootstrap/css/vistaspersonalizadas.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
     <div class="row"> 
          <div class="col-sm-4">
             <img src="{{$pelicula-> poster}}" alt="">     
          </div>      
          <div class="col-sm-8"> 
              <h1>{{$pelicula->title}}</h1>
              <h2>{{$pelicula->year}}</h2> 
              <br>
              <h2>{{$pelicula->director}}</h2>
              <p><b>Resumen: </b>{{$pelicula->synopsis}}</p>
              <br>
                @if($pelicula->rented)
                  <b>Estado: </b> pelicula actualmente alquilada <br>
                  <button type="button" class="btn btn-danger"> Devolver Pelicula</button>
                @else
                  <b>Estado: </b> Pelicula disponible <br>
                    <button type="button" class="btn btn-danger">Alquilar Pelicula</button>
                @endif
              
                
                
                <a href="{{ url('catalog/edit/' . $pelicula->id) }}" class="btn btn-warning"><i class="fa fa-spinner fa-spin"></i>Editar Pelicula</a> 
                <button type="button" class="btn btn-outline-dark"><b ><</b><a href="{{ url('catalog/') }}">Volver al Listado</a> </button>
          </div> 
       </div>
@stop
