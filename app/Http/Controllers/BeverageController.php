<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Traits\UploadFile;
use App\Models\ContactMessage;

class BeverageController extends Controller
{
    use UploadFile;
    /**
     * Display a listing of the resource.
     */
    public function beverages()
    {
        $title="beverages";
        $Products=Product::get();
        $unreadMessages = ContactMessage::where('is_read', false)->orderBy('created_at', 'desc')->get();
        return view('admin.beverages',compact('title','Products','unreadMessages'));
    }
/**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title='Edite Beverages';
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $unreadMessages = ContactMessage::where('is_read', false)->orderBy('created_at', 'desc')->get();
        return view('admin.editBeverages',compact('product','title','categories','unreadMessages'));
   
    }
 //error Mesage 
 public function errMsg()
 {
     return [ 'name.required' => 'The product name is required.',
     'price.required' => 'The price is required.',
     'price.numeric' => 'The price must be a number.',
     'image.image' => 'The image must be a valid image file.',
     'description.required' => 'The description is required.',
     'special_item.boolean' => 'The special item field must be true or false.',
     'published.boolean' => 'The published field must be true or false.',
     'category_id.required' => 'The category ID is required.',
     'category_id.exists' => 'The selected category ID does not exist.',
 ];}
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // first validate the data
        $messages = $this->errMsg();
        $data = $request->validate([
        'name' => 'required|max:255',
        'price' => 'required|numeric',
        'image' => 'required|mimes:png,jpg,jpeg|max:2048', 
        'description' => 'required|string|max:1000',
        'special_item' => 'boolean',
        'published' => 'boolean',
        'category_id' => 'required|exists:categories,id',
        ], $messages);
        // to upload image
        if ($request->hasFile('image')) {

            $fileName = $this->uploadFile($request->image, 'assets/img/beveragesImg');
            $data['image'] = $fileName;
        }
    // Set 'special_item' field based on checkbox value
    $data['special_item'] = $request->has('special_item');
 
    // Set 'published' field based on checkbox value
    $data['published'] = $request->has('published');
       
    Product::where('id', $id)->update($data);
    return redirect()->route('beverages'); // Redirect to beverages view
    }

    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function addBeverages()
    {
        $title="add Beverages";
        $categories = Category::all();
        $unreadMessages = ContactMessage::where('is_read', false)->orderBy('created_at', 'desc')->get();
        return view('admin.addBeverages',compact('title','categories','unreadMessages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->errMsg();
        $data = $request->validate([
        'name' => 'required|max:255',
        'price' => 'required|numeric',
        'image' => 'required|mimes:png,jpg,jpeg|max:2048', 
        'description' => 'required|string|max:1000',
        'special_item' => 'boolean',
        'published' => 'boolean',
        'category_id' => 'required|exists:categories,id',
        ], $messages);
        // to upload image
        if ($request->hasFile('image')) {

            $fileName = $this->uploadFile($request->image, 'assets/img/beveragesImg');
            $data['image'] = $fileName;
        }
    // Set 'special_item' field based on checkbox value
    $data['special_item'] = $request->has('special_item');
 
    // Set 'published' field based on checkbox value
    $data['published'] = $request->has('published');
    
    Product::create($data);
       
    return redirect()->route('beverages');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
    
    // Ensure the user exists and then delete
    $product = Product::findOrFail($id);
    $product->delete();
    return redirect()->route('beverages');// Redirect to users view

    }
    public function showDeleted()
     {       $title='Trashed User';
        $trash = Product::onlyTrashed()->get();
        $unreadMessages = ContactMessage::where('is_read', false)->orderBy('created_at', 'desc')->get();
        return view('admin.trashedBeverage', compact('trash','title','unreadMessages'));
     }

    public function restore(string $id)
    {
        Product::where('id', $id)->restore();
    return redirect()->route('beverages');
    // return "Success";
    }

    // delete and can not restore 
    public function forceDelete(Request $request)
    {
        $id = $request->id;
        Product::where('id', $id)->forceDelete();
    return redirect()->route('trashedBeverage');
    }
}
