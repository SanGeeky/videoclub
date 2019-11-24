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

        notify()->success('Pelicula Añadida Correctamente')->delay(1500);
        return redirect('catalog');
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

        
        notify()->success('Pelicula Modificada Correctamente')->delay(1500);
        return redirect()->action('CatalogController@getShow', [$id]);

        //return view('catalog.show', array('pelicula' => Movie::findOrFail($id))); 
    }

    // Rent the Movie
    public function putRent(Request $movie)
    {
        $id = $movie->id;
        Movie::where('id', $id)
            ->update(['rented' => TRUE]);

        notify()->success('Pelicula Rentada!')->delay(1500);
        return redirect()->action('CatalogController@getShow', [$id]);

    }

    // Return the Movie
    public function putReturn(Request $movie)
    {
        $id = $movie->id;
        Movie::where('id', $id)
            ->update(['rented' => FALSE]);
        
        notify()->warning('Pelicula Devuelta')->delay(1500);
        return redirect()->action('CatalogController@getShow', [$id]);

    }

    // Delete a Movie
    public function deleteMovie(Request $movie)
    {
        $id = $movie->id;
        Movie::where('id', $id)
            ->delete();
        
        notify()->error('Pelicula Devuelta')->delay(1500);
        return redirect('catalog');

    }
    

}


