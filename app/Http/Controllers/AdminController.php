<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminController extends Controller
{
    public function pending() 
    {
        return view('admin.pending');
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
        $user = Product::create([
            'name' => $request->input('name'),
            'image' => $path,
            'category' => $request->input('category'),
            'amount' => $request->input('amount'),
        ]);

        // Redirect with success message
        return redirect()->route('admin.product')->with('success', 'You have successfully added a product');
    }

    public function welcome()
    {

        $unli199 = Product::where('category', 'Unli Samgyup 199')->get();
        $unli219 = Product::where('category', 'Unli Samgyup 219')->get();


        return view('welcome', ['unli199' => $unli199, 
                                'unli219' => $unli219, 
                            ]);
    }           
}
