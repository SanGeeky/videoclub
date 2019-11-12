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
        return view('catalog.edit', array('pelicula'=>Movie::findOrFail($id))); 
    }

    // Save a new movie
    public function postCreate(Request $new_movie)
    {
        $p = new Movie;

        $p->title = $new_movie->input('title');

        $p->year = $new_movie->input('year');

        $p->director = $new_movie->input('director');

        $p->poster = $new_movie->input('poster');

        $p->synopsis = $new_movie->input('synopsis'); 
        
        $p->save();

        return view('catalog.index', array('listaPeliculas'=> Movie::all()));
    }

    // Update the info about a movie 
    public function putEdit(Request $movie)
    {
        $id = $movie->id;
        Movie::where('id', $id)
            ->update(
                ['title' => $movie->title,
                'year' => $movie->year,
                'director' => $movie->director,
                'poster' => $movie->poster,
                'synopsis' => $movie->synopsis],
            );

        return view('catalog.show', array('pelicula' => Movie::findOrFail($id))); 

    }

    

}


