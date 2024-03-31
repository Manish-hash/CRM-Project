<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    public function create(){
        return view('products.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'manufacturing_price' => 'required|numeric|min:0',
            'selling_price' => 'required|numeric|min:0',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        // Handle file upload 
        
        // Create the product
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('public/logos');
            $validatedData['logo'] = $logoPath;
        }
        Product::create($validatedData);

        // Redirect back with success message
        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }

    public function index(){
        $products= Product::paginate(4);

        return view('products.index',compact('products'));
    }

    public function show($id){
        $product = Product::findOrFail($id);

        return view('products.show',compact('product'));
    }

    public function edit($id)
    {
        // Fetch the company from the database based on the provided ID
        $product = Product::findOrFail($id);
    
        // Pass the company data to the view
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'manufacturing_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Check if a new image has been uploaded
        if ($request->hasFile('logo')) {
            // Delete the previous image from storage
            // Storage::disk('public')->delete($product->logo);
    
            // Store the new image
            $logoPath = $request->file('logo')->store('logos', 'public');
            $validatedData['logo'] = $logoPath;
        }
    
        // Update the product with the new data
        $product->update($validatedData);
    
        // Redirect back with a success message
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');

    }
public function delete($id){


    $user = Product::findOrFail($id);
$user->delete();
return redirect()->route('products.index')->with('success', 'Product is deleted successfully');
}
   

public function totalproduct(){

    $products=Product::all();

    return view('products.totalproduct',compact('products'));
}

}


