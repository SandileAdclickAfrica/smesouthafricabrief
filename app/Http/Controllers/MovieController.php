<?php

namespace App\Http\Controllers;

use App\Services\TmdbService;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    protected $tmdb;

    public function __construct(TmdbService $tmdb)
    {
        $this->tmdb = $tmdb;
    }

    public function authentication()
    {
        $results = $this->tmdb->authentication();
        return response()->json($results);
    }

    public function trending(Request $request)
    {
        $timeWindow = $request->get('time_window', 'week'); // or 'day'
        $movies = $this->tmdb->getTrendingMovies($timeWindow);
        return response()->json($movies);
    }

    public function search(Request $request)
    {
        $results = $this->tmdb->searchMovies($request->input('q'));
        return response()->json($results);
    }

    public function show($id)
    {
        $movie = $this->tmdb->getMovie($id);
        return response()->json($movie);
    }
}
