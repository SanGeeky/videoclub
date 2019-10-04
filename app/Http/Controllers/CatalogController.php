<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
    ///Return view for index
    public  function getIndex()
    {
        return view('catalog.index');
    }

    // Return Show Catalog
    public function getShow($id) 
    { 
        return view('catalog.show', array('id'=>$id)); 
    }

    /// Return Create
    public function getCreate() 
    { 
        return view('catalog.create'); 
    }

    // Return Edit
    public function getEdit($id) 
    { 
        return view('catalog.edit', array('id'=>$id)); 
    }
}
