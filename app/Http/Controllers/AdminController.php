<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title="Admin Page";
        $unreadMessages = ContactMessage::where('is_read', false)->orderBy('created_at', 'desc')->get();
        return view('admin.users',compact('title','unreadMessages'));
    }

    public function adduser()
    {
        $title="add user";
        $unreadMessages = ContactMessage::where('is_read', false)->orderBy('created_at', 'desc')->get();
        return view('admin.addUser',compact('title','unreadMessages'));
    }

    
    public function addCategory()
    {
        $title="add Category";
        $unreadMessages = ContactMessage::where('is_read', false)->orderBy('created_at', 'desc')->get();
        return view('admin.addCategory',compact('title','unreadMessages'));
        
    }

    public function editBeverages()
    {
        $title="editBeverages";
        $unreadMessages = ContactMessage::where('is_read', false)->orderBy('created_at', 'desc')->get();
        return view('admin.editBeverages',compact('title','unreadMessages'));
    }

    public function editCategories()
    {
        $title="editCategories";
        $unreadMessages = ContactMessage::where('is_read', false)->orderBy('created_at', 'desc')->get();
        return view('admin.editCategories',compact('title','unreadMessages'));
    }

    public function editUser()
    {
        $title="editUser";
        $unreadMessages = ContactMessage::where('is_read', false)->orderBy('created_at', 'desc')->get();
        return view('admin.editUser',compact('title','unreadMessages'));
    }


    }
