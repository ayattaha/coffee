<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ContactMessage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function categories()
    {
        $title="categories";
        $categories=Category::get();
        $unreadMessages = ContactMessage::where('is_read', false)->orderBy('created_at', 'desc')->get();
        return view('admin.categories',compact('title','categories','unreadMessages'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title='Edite Categories';
        $category = Category::findOrFail($id);
        $unreadMessages = ContactMessage::where('is_read', false)->orderBy('created_at', 'desc')->get();
        return view('admin.editCategories',compact('category','title','unreadMessages'));
    }


    //error Mesage 
 public function errMsg()
 {
     return [  
     'name.required' => 'The category name is required.',
     'name.string' => 'The category name must be a string.',
     'name.max' => 'The category name may not be greater than 255 characters.',
     'name.unique' => 'The category name has already been taken.',
    ];}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->errMsg();
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ], $messages);

    Category::where('id', $id)->update($data);
    return redirect()->route('categories'); // Redirect to categories view    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->errMsg();
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ], $messages);
        
        Category::create($data);
        return redirect()->route('categories'); 
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
   public function destroy(string $id)
{
    $category = Category::findOrFail($id);

    // Check if the category has any related beverages (products)
    if ($category->products()->exists()) {
        return redirect()->route('categories')->withErrors(['error' => 'Category cannot be deleted because it has related products.']);
    }

    // Proceed with deletion
    $category->delete();
    return redirect()->route('categories')->with('success', 'Category deleted successfully.');
}

}
