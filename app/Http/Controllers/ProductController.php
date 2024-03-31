<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    public function create(){
        return view('products.create');
    }
    public function store(Request $request)
    {
            $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'manufacturing_price' => 'required|numeric|min:0',
            'selling_price' => 'required|numeric|min:0',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

//Create a new product instance
$product = new Product();
$product->name =$request->name;
$product->quantity = $request->quantity;
$product->manufacturing_price = $request->manufacturing_price;
$product->selling_price =$request->selling_price;

//Handle image upload if provided
try {
    if ($request->hasFile('logo')) {
        $imagePath = $request->file('logo')->store('logos', 'public');
        $product->image = $imagePath;
    }
} catch (\Exception $e) {
    Log::error('Error uploading image: ' . $e->getMessage());

}

$product->save();


return redirect()->route('products.index')->with('success', 'Product created succcessfully');
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
       $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'manufacturing_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
       
        $product = Product::findOrFail($id);

        // Update the product attributes
        $product->name = $request->input('name');
        $product->quantity = $request->input('quantity');
        $product->manufacturing_price = $request->input('manufacturing_price');
        $product->selling_price = $request->input('selling_price');

        // Handle image update if provided
        if ($request->hasFile('logo')) {
            // Store the new image
            $imagePath = $request->file('logo')->store('logos', 'public');
            // Delete the old image file if it exists
            if ($product->logo) {
                Storage::disk('public')->delete($product->logo);
            }
            // Update the image attribute with the new image path
            $product->logo = $imagePath;
        }

        // Save the updated product
        $product->save();

        // Redirect the user with a success message
        return redirect()->route('products.index')->with('success', 'Product updated successfully');

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


