<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class admin extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function dashboard(){
        $products = products::all();
        
        return view('admin.dashboard', compact('products'));

    }
   
    public function createProduct()
    {
        return view('admin.create');  // Return create product form
    }

    // Store a new product
    public function storeProduct(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Validate image upload
        ]);
        $imagePath = null;
        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('products', 'public');  // Store image in public/products
        // }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
        }
        Products::create([
            'product_name' => $request->input('product_name'),
            'price' => $request->input('price'),
            'image' => $imagePath,  // Save the image path
        ]);

        // Redirect to the dashboard page with a success message
        return redirect()->route('admin.dashboard')->with('success', 'Product created successfully');
    }

    // Show the form to edit an existing product
    public function editProduct(Products $product)
    {
        return view('admin.edit', compact('product'));  // Return edit product form
    }

    // Update an existing product
    public function updateProduct(Request $request, $id)
{
    // Find the product by id
    $product = Products::findOrFail($id);

    // Validate the request
    $request->validate([
        'product_name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Validate image upload
    ]);

    // Handle the image upload if there is a new image
    if ($request->hasFile('image')) {
        // Delete the old image if there is one
        if ($product->image) {
            Storage::delete('public/' . $product->image);
        }

        // Store the new image
        $imagePath = $request->file('image')->store('products', 'public');
        $product->image = $imagePath;  // Update the image field with the new path
    }

    // Update the product fields
    $product->update([
        'product_name' => $request->input('product_name'),
        'price' => $request->input('price'),
    ]);

    // Redirect back to the dashboard with a success message
    return redirect()->route('admin.dashboard')->with('success', 'Product updated successfully');
}

    // Delete a product
    public function deleteProduct(Products $product)
    {
        // Delete the image from storage if it exists
        if ($product->image) {
            Storage::delete('public/' . $product->image);
        }

        // Delete the product from the database
        $product->delete();

        // Redirect to the dashboard with a success message
        return redirect()->route('admin.dashboard')->with('success', 'Product deleted successfully');
    }

}
    

