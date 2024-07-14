<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\ContactMessage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    // public function index()
    // {
    //       $title="Admin Page";
        
    //     $users=User::get();
    //     return view('admin.users',compact('title','users'));
    //     //return view('home');
    // }

    public function store(Request $request)
    {     
        $messages=$this->errMsg();
        $data=$request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'active' => 'boolean',
        ], $messages);
       
        $data['active']=isset($request->active);
       
        user::create($data);
       
        return redirect()->route('home');
    }
    //error Mesage 
    public function errMsg()
    {
        return [
            'fullname.required' => 'Full Name is required.',
            'fullname.string' => 'Full Name must be a string.',
            'fullname.max' => 'Full Name may not be greater than 255 characters.',
            'username.required' => 'Username is required.',
            'username.string' => 'Username must be a string.',
            'username.max' => 'Username may not be greater than 255 characters.',
            'email.required' => 'Email is required.',
            'email.string' => 'Email must be a string.',
            'email.email' => 'Invalid email format.',
            'email.max' => 'Email may not be greater than 255 characters.',
            'email.unique' => 'Email is already taken.',
            'password.required' => 'Password is required.',
            'password.string' => 'Password must be a string.',
            'password.min' => 'Password must be at least 8 characters.',
            'active.boolean' => 'Active must be a boolean value.',
        ];
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title='edite User';
        $user = User::findOrFail($id);
        $unreadMessages = ContactMessage::where('is_read', false)->orderBy('created_at', 'desc')->get();
        return view('admin.editUser',compact('user','title','unreadMessages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->errMsg();
        $data = $request->validate([
            'fullname' => 'required|max:100|min:5',
            'username' => 'required|max:50',
            'email' => 'required|email:rfc',
            'password' => 'nullable|min:8', // Adjust validation as per your requirements
            'active' => 'boolean', // Assuming 'active' is a boolean field
        ], $messages);
    
        // Handle password hashing if provided
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']); // Remove password from data if not provided
        }
    
        // Set 'active' field based on checkbox value
        $data['active']=isset($request->active);
    
        // Update user data
        User::where('id', $id)->update($data);
    
        return redirect()->route('home'); // Redirect to users view
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
    
    // Ensure the user exists and then delete
    $user = User::findOrFail($id);
    $user->delete();
    return redirect()->route('home'); // Redirect to users view
     }


    public function showDeleted()
     {       $title='Trashed User';
        $trash = User::onlyTrashed()->get();
        $unreadMessages = ContactMessage::where('is_read', false)->orderBy('created_at', 'desc')->get();
        return view('admin.trashedUser', compact('trash','title','unreadMessages'));
     }

    public function restore(string $id)
    {
    User::where('id', $id)->restore();
    return redirect()->route('home');
    // return "Success";
    }

    // delete and can not restore 
    public function forceDelete(Request $request)
    {
        $id = $request->id;
    User::where('id', $id)->forceDelete();
    return redirect()->route('trashedUser');
    }
}
