<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Mail\ContactMail;
use Mail;

class ContactController extends Controller
{
    public function showMessage(string $id)
    {
        $message = ContactMessage::findOrFail($id);
        $title="show Message";
        $unreadMessages = ContactMessage::where('is_read', false)->orderBy('created_at', 'desc')->get();
        // Mark the message as read
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }
        return view('admin.showMessages',compact('title','message','unreadMessages'));
    }
    
    public function messages()
    {
        $title="messages";
        $messages = ContactMessage::all();
        $unreadMessages = ContactMessage::where('is_read', false)->orderBy('created_at', 'desc')->get();
        return view('admin.messages', compact('title', 'messages', 'unreadMessages'));
    }
    public function forceDelete(Request $request)
        {
            $id = $request->id;
            ContactMessage::where('id', $id)->forceDelete();
            return redirect()->route('messages');
        }

    public function contact()
    {
        $title="Contact Us";
        return view('emails.contact',compact('title'));
    }
    public function notifications()
    {
        $unreadMessages = ContactMessage::where('is_read', false)->orderBy('created_at', 'desc')->get();
        return view('includes.admin.topNav', compact('unreadMessages'));
    }
    
    public function submit(Request $request)
    {
    // Validate the request
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|string'
    ]);
// Prepare data for the email
$data = [
    'name' => $request->name,
    'email' => $request->email,
    'message' => $request->message,
];
    // Save the message to the database
    $contactMessage = ContactMessage::create($data);

    // Send the email using Mailtrap
    Mail::to('admin@wavecafe.com')->send(new ContactMail($data));

    // Redirect back with a success message
    return redirect()->route('contact')->with('success', 'Email sent successfully!');
}

}
