@extends('layouts.master')

@section('content')
    Vista detalle película {{ $pelicula->id }}
    <div class="row">       
        <div class="col-sm-4">           
            <img src="{{$pelicula->poster}}" style="width: 20vw"/>              
        </div>
        <div class="col-sm-8">           
            <h3>{{$pelicula->title}}</h3>
            
            <span> <b>Año: </b></span>{{ $pelicula->year}}
            <br>
            <span> <b>Director: </b></span>{{ $pelicula->director}}            
            <br><br>
            <strong>Resumen: </strong> {{ $pelicula->synopsis}}
            <br><br>
            <strong>Estado:</strong> 
            @if($pelicula->rented)
                Pelicula actualmente alquilada
                <br><br>
                <form action="{{ action('CatalogController@putReturn', $pelicula->id) }}" method="POST" style="display:inline">
                    {{ method_field('PUT') }} 
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-warning" style="display:inline"> Devolver Pelicula </button>                
                </form>
            @else
                Pelicula disponible
                <br><br>
                <form action="{{ action('CatalogController@putRent', $pelicula->id) }}" method="POST" style="display:inline">
                    @method('PUT')
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-success" style="display:inline"> Alquilar Pelicula </button>             
                </form>
            @endif
            <a href="{{ url('/catalog/edit/' . $pelicula->id) }}" role="button" class="btn btn-primary text-white"> <span class="fas fa-pencil-alt"></span> Editar Pelicula</a>            
            <form action="{{ action('CatalogController@deleteMovie', $pelicula->id) }}" method="POST" style="display:inline">
                {{ method_field('DELETE') }} 
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger" style="display:inline"> Eliminar Pelicula </button>             
            </form>
            <a href="{{ url('/catalog') }}" role="button" class="btn btn-default border border-dark"> <span class="fas fa-angle-left"></span> Volver al listado</a>
        </div> 
    </div>
@stop