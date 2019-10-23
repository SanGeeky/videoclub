@extends('layouts.master')

@section('content')
    Vista detalle película {{ $pelicula->id }}
    <div class="row">       
        <div class="col-sm-4">           
            <img src="{{$pelicula['poster']}}" style="width: 20vw"/>              
        </div>
        <div class="col-sm-8">           
            <h3>{{$pelicula->title}}</h3>
            
            <span> <b>Año: </b></span>{{ $pelicula->year}}
            <br>
            <span> <b>Director: </b></span>{{ $pelicula['director']}}            
            <br><br>
            <strong>Resumen: </strong> {{ $pelicula->synopsis}}
            <br>
            <strong>Estado:</strong> 
            @if($pelicula->rented)
                Pelicula actualmente alquilada
                <br><br>
                <a href="" role="button"class="btn btn-danger">Devolver Pelicula</a>                
            @else
                Pelicula disponible
                <br><br>
                <a href="" role="button" class="btn btn-primary">Alquilar Pelicula</a>                
            @endif
            <a href="{{ url('/catalog/edit/' . $pelicula->id) }}" role="button" class="btn btn-warning text-white"> <span class="fas fa-pencil-alt"></span> Editar Pelicula</a>
            <a href="{{ url('/catalog') }}" role="button" class="btn btn-default border border-dark"> <span class="fas fa-angle-left"></span> Volver al listado</a>
        </div> 
    </div>
@stop