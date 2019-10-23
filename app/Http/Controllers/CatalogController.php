<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;


class CatalogController extends Controller
{
    ///Return view for index
    public  function getIndex()
    {
        //Obtener Peliculas mediante consulta al Modelo Movie
        return view('catalog.index', array('listaPeliculas'=> Movie::all()));
    }

    // Return Show Catalog
    public function getShow($id) 
    {
        return view('catalog.show', array('pelicula' => Movie::findOrFail($id))); 
    }

    /// Return Create
    public function getCreate() 
    { 
        return view('catalog.create'); 
    }

    // Return Edit
    public function getEdit($id) 
    { 
        return view('catalog.edit', array('id'=>Movie::findOrFail($id))); 
    }

    

}


