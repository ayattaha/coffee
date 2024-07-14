<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ContactMessage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
          $title="Admin Page";
        
        $users=User::get();
        $unreadMessages = ContactMessage::where('is_read', false)->orderBy('created_at', 'desc')->get();
        return view('admin.users',compact('title','users','unreadMessages'));
        //return view('home');
    }
    
         
}
