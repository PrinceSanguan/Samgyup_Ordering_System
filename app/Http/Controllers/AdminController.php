<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\UserOrder;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function pending() 
    {

        $pendingOrders = UserOrder::where('status', 'pending')->get();

        return view('admin.pending', ['pendingOrders' => $pendingOrders]);

    }

    public function product() 
    {

        $products = Product::all();

        return view('admin.product', ['products' => $products]);
    }

    public function addProduct(Request $request) 
    {

        // Check if a file is uploaded
        if ($request->hasFile('file')) {
            // Store the file and get the path
            $path = $request->file('file')->store('/', ['disk' => 'my_disk']);
        } else {
            // Handle the case where no file is uploaded
            return redirect()->route('register')->with('error', 'Please upload a profile image.');
        }

        // Saving in the database
        Product::create([
            'name' => $request->input('name'),
            'image' => $path,
            'category' => $request->input('category'),
            'amount' => $request->input('amount'),
        ]);

        // Redirect with success message
        return redirect()->route('admin.product')->with('success', 'You have successfully added a product');
    }

    public function getOrder(Request $request)
    {
        // Validate request data if needed
        
        // Retrieve the table number from the request
        $tableNumber = $request->table;
    
        // Loop through each order sent from the frontend
        foreach ($request->orders as $order) {
            // Saving the order in the database
            UserOrder::create([
                'table' => $tableNumber, // Use the table number provided by the frontend
                'name' => $order['name'],
                'amount' => $order['amount'],
                'quantity' => $order['quantity'],
                'category' => $order['category'], // Include category in the order
                'status' => 'pending',
            ]);
        }
    
        // Return a response indicating success
        return response()->json(['message' => 'Order placed successfully.']);
    }
    
    public function welcome()
    {

        $unli199 = Product::where('category', 'Unli Samgyup 199')->get();
        $unli219 = Product::where('category', 'Unli Samgyup 219')->get();
        $unli299 = Product::where('category', 'Unli Samgyup 299')->get();
        $unli289 = Product::where('category', 'Unli Wings 289')->get();
        $beverage = Product::where('category', 'Beverage')->get();
        $chickenWings = Product::where('category', 'Chicken Wings')->get();
        $burger = Product::where('category', 'Burger')->get();


        return view('welcome', ['unli199' => $unli199, 
                                'unli219' => $unli219, 
                                'unli299' => $unli299,
                                'unli289' => $unli289,
                                'beverage' => $beverage,
                                'chickenWings' => $chickenWings,
                                'burger' => $burger,
                            ]);
    } 
    
    public function deleteProduct($productId)
{
    // Find the product by ID
    $product = Product::find($productId);

    // Check if the Product exists
    if (!$product) {
        // Return a response indicating failure (404 Not Found)
        return response()->json(['error' => 'Product not found.'], 404);
    }

    // Get the image path from the product
    $imagePath = public_path('upload-image/' . $product->image);

    // Check if the image file exists and delete it
    if (File::exists($imagePath)) {
        File::delete($imagePath);
    }

    // Delete the product
    $product->delete();

    // Return a response indicating success
    return response()->json(['message' => 'The product and associated images deleted successfully.']);
}

}
