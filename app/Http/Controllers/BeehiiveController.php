<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Statamic\Facades\Entry;
use Statamic\Facades\Nav;

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


    public function index(){

        $entry = Entry::whereCollection('pages')
            ->where('slug', 'home')
            ->where('published', true)
            ->first();

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
