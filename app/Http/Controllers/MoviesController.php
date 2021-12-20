<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MoviesController extends Controller
{

    public function index()
    {
        $movies = Movie::all();
        return view("movie.index", compact("movies"));
    }


    public function create()
    {
        return view("movie.create");
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'movie_name'=>'required',
            'movie_description'=>'required',
            'movie_gener'=>'required'
        ]);

        Movie::create([
        'movie_name'=>$request->movie_name,
        'movie_description'=>$request->movie_description,
        'movie_gener'=>$request->movie_gener
        ]);
        return redirect('movies')->with('succes', 'you added new movie');
    }

    public function show($id)
    {
        $movie=Movie::find($id);
        return view('movie.show',compact('movie'));
    }
    
    
    public function edit($id)
    {
        $movie=Movie::find($id);
        return view('movie.update',compact('movie'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'movie_name'=>'required',
            'movie_description'=>'required',
            'movie_gener'=>'required'
        ]);

        Movie::where('id',$id)->update([
            'movie_name'=>$request->movie_name,
            'movie_description'=>$request->movie_description,
            'movie_gener'=>$request->movie_gener
            ]);
            return redirect('movies')->with('success','Movie Updated successfully');
    }

    public function destroy($id)
    {
        Movie::destroy($id);
        return redirect('movies')->with('success','Movie deleted successfully');
    }
}
