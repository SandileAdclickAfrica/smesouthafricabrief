<?php

namespace App\Http\Controllers;

use App\Services\TmdbService;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Statamic\Facades\Entry;

class BeehiiveController extends Controller
{

//    public function index(){
//
//        $entry = Entry::find('home');
//        // Fetch or generate data
//        return view('home', [
//            'content' => $entry->get('content'),
//            'message' => 'Hello from the controller!',
//            'posts' => [
//                ['title' => 'First Post'],
//                ['title' => 'Second Post'],
//            ],
//        ]);
//    }

    protected $movies;

    public function index(Request $request){


        $entry = Entry::whereCollection('pages')
            ->where('slug', 'home')
            ->where('published', true)
            ->first();

        if ($request->isMethod('post')) {

            $validator = Validator::make($request->all(), [
                'email_address' => 'required|email',
            ]);

            if ($validator->fails()) {

                return (new \Statamic\View\View)
                    ->template('home')
                    ->layout('layout')
                    ->cascadeContent($entry)
                    ->with([
                        'posts' => [
                            ['title' => 'First Post'],
                            ['title' => 'Second Post'],
                        ],
                        'errors' => $validator->errors()->all()[0]
                    ]);

            }else{

                return (new \Statamic\View\View)
                    ->template('home')
                    ->layout('layout')
                    ->cascadeContent($entry)
                    ->with([
                        'posts' => [
                            ['title' => 'First Post'],
                            ['title' => 'Second Post'],
                        ],
                    ]);
            }
        }else{

            return (new \Statamic\View\View)
                ->template('home')
                ->layout('layout')
                ->cascadeContent($entry)
                ->with([
                    'posts' => [
                        ['title' => 'First Post'],
                        ['title' => 'Second Post'],
                    ],
            ]);
        }
    }

    public function subscribe(Request $request)
    {
        dd( 'sandile' );
    }


//    public function index(){
//
//        $entry = Entry::query()
//            ->where('slug', 'home') // or use ->where('uri', '/') if needed
//            ->first();
//
//        return view('pages.home', [
//            'entry' => $entry,
//        ]);
//    }

//    public function about(){
//
//        $entry = Entry::query()
//            ->where('slug', 'about') // or use ->where('uri', '/') if needed
//            ->first();
//
//        return view('pages.home', ['entry' => $entry]);
//    }

}
