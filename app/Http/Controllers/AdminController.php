<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title="Admin Page";
        return view('admin.users',compact('title'));
    }

    public function adduser()
    {
        $title="add user";
        return view('admin.addUser',compact('title'));
    }

    public function addBeverages()
    {
        $title="add Beverages";
        return view('admin.addBeverages',compact('title'));
    }

    public function addCategory()
    {
        $title="add Category";
        return view('admin.addCategory',compact('title'));
    }

    public function beverages()
    {
        $title="beverages";
        return view('admin.beverages',compact('title'));
    }

    public function categories()
    {
        $title="categories";
        return view('admin.categories',compact('title'));
    }

    public function editBeverages()
    {
        $title="editBeverages";
        return view('admin.editBeverages',compact('title'));
    }

    public function editCategories()
    {
        $title="editCategories";
        return view('admin.editCategories',compact('title'));
    }

    public function editUser()
    {
        $title="editUser";
        return view('admin.editUser',compact('title'));
    }

    public function messages()
    {
        $title="messages";
        return view('admin.messages',compact('title'));
    }

    public function showMessages()
    {
        $title="showMessages";
        return view('admin.showMessages',compact('title'));
    }

    }
