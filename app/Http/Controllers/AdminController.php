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

        $balance = UserOrder::where('status', 'delivered')->where('table', '1')->get();

        // Calculate running balance
        $runningBalance = 0;
        foreach ($balance as $order) {
            $runningBalance += $order->amount * $order->quantity;
        }


        return view('welcome', ['unli199' => $unli199, 
                                'unli219' => $unli219, 
                                'unli299' => $unli299,
                                'unli289' => $unli289,
                                'beverage' => $beverage,
                                'chickenWings' => $chickenWings,
                                'burger' => $burger,
                                'runningBalance' => $runningBalance,
                            ]);
    } 

    public function welcome2()
    {
        $unli199 = Product::where('category', 'Unli Samgyup 199')->get();
        $unli219 = Product::where('category', 'Unli Samgyup 219')->get();
        $unli299 = Product::where('category', 'Unli Samgyup 299')->get();
        $unli289 = Product::where('category', 'Unli Wings 289')->get();
        $beverage = Product::where('category', 'Beverage')->get();
        $chickenWings = Product::where('category', 'Chicken Wings')->get();
        $burger = Product::where('category', 'Burger')->get();

        $balance = UserOrder::where('status', 'delivered')->where('table', '2')->get();

        // Calculate running balance
        $runningBalance = 0;
        foreach ($balance as $order) {
            $runningBalance += $order->amount * $order->quantity;
        }


        return view('welcome2', ['unli199' => $unli199, 
                                'unli219' => $unli219, 
                                'unli299' => $unli299,
                                'unli289' => $unli289,
                                'beverage' => $beverage,
                                'chickenWings' => $chickenWings,
                                'burger' => $burger,
                                'runningBalance' => $runningBalance,
                            ]);
    } 

    public function welcome3()
    {
        $unli199 = Product::where('category', 'Unli Samgyup 199')->get();
        $unli219 = Product::where('category', 'Unli Samgyup 219')->get();
        $unli299 = Product::where('category', 'Unli Samgyup 299')->get();
        $unli289 = Product::where('category', 'Unli Wings 289')->get();
        $beverage = Product::where('category', 'Beverage')->get();
        $chickenWings = Product::where('category', 'Chicken Wings')->get();
        $burger = Product::where('category', 'Burger')->get();

        $balance = UserOrder::where('status', 'delivered')->where('table', '3')->get();

        // Calculate running balance
        $runningBalance = 0;
        foreach ($balance as $order) {
            $runningBalance += $order->amount * $order->quantity;
        }


        return view('welcome3', ['unli199' => $unli199, 
                                'unli219' => $unli219, 
                                'unli299' => $unli299,
                                'unli289' => $unli289,
                                'beverage' => $beverage,
                                'chickenWings' => $chickenWings,
                                'burger' => $burger,
                                'runningBalance' => $runningBalance,
                            ]);
    } 

    public function welcome4()
    {
        $unli199 = Product::where('category', 'Unli Samgyup 199')->get();
        $unli219 = Product::where('category', 'Unli Samgyup 219')->get();
        $unli299 = Product::where('category', 'Unli Samgyup 299')->get();
        $unli289 = Product::where('category', 'Unli Wings 289')->get();
        $beverage = Product::where('category', 'Beverage')->get();
        $chickenWings = Product::where('category', 'Chicken Wings')->get();
        $burger = Product::where('category', 'Burger')->get();

        $balance = UserOrder::where('status', 'delivered')->where('table', '4')->get();

        // Calculate running balance
        $runningBalance = 0;
        foreach ($balance as $order) {
            $runningBalance += $order->amount * $order->quantity;
        }


        return view('welcome4', ['unli199' => $unli199, 
                                'unli219' => $unli219, 
                                'unli299' => $unli299,
                                'unli289' => $unli289,
                                'beverage' => $beverage,
                                'chickenWings' => $chickenWings,
                                'burger' => $burger,
                                'runningBalance' => $runningBalance,
                            ]);
    } 

    public function welcome5()
    {
        $unli199 = Product::where('category', 'Unli Samgyup 199')->get();
        $unli219 = Product::where('category', 'Unli Samgyup 219')->get();
        $unli299 = Product::where('category', 'Unli Samgyup 299')->get();
        $unli289 = Product::where('category', 'Unli Wings 289')->get();
        $beverage = Product::where('category', 'Beverage')->get();
        $chickenWings = Product::where('category', 'Chicken Wings')->get();
        $burger = Product::where('category', 'Burger')->get();

        $balance = UserOrder::where('status', 'delivered')->where('table', '5')->get();

        // Calculate running balance
        $runningBalance = 0;
        foreach ($balance as $order) {
            $runningBalance += $order->amount * $order->quantity;
        }


        return view('welcome5', ['unli199' => $unli199, 
                                'unli219' => $unli219, 
                                'unli299' => $unli299,
                                'unli289' => $unli289,
                                'beverage' => $beverage,
                                'chickenWings' => $chickenWings,
                                'burger' => $burger,
                                'runningBalance' => $runningBalance,
                            ]);
    } 

    public function welcome6()
    {
        $unli199 = Product::where('category', 'Unli Samgyup 199')->get();
        $unli219 = Product::where('category', 'Unli Samgyup 219')->get();
        $unli299 = Product::where('category', 'Unli Samgyup 299')->get();
        $unli289 = Product::where('category', 'Unli Wings 289')->get();
        $beverage = Product::where('category', 'Beverage')->get();
        $chickenWings = Product::where('category', 'Chicken Wings')->get();
        $burger = Product::where('category', 'Burger')->get();

        $balance = UserOrder::where('status', 'delivered')->where('table', '6')->get();

        // Calculate running balance
        $runningBalance = 0;
        foreach ($balance as $order) {
            $runningBalance += $order->amount * $order->quantity;
        }


        return view('welcome6', ['unli199' => $unli199, 
                                'unli219' => $unli219, 
                                'unli299' => $unli299,
                                'unli289' => $unli289,
                                'beverage' => $beverage,
                                'chickenWings' => $chickenWings,
                                'burger' => $burger,
                                'runningBalance' => $runningBalance,
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

    public function table1()
    {
        // Fetch table 1 delivered orders
        $table1Orders = UserOrder::where('status', 'delivered')->where('table', '1')->get();

        // Calculate running balance
        $runningBalance = 0;
        foreach ($table1Orders as $order) {
            $runningBalance += $order->amount * $order->quantity;
        }

        return view('admin.table1', compact('table1Orders', 'runningBalance'));
    }

    public function table2()
    {
        // Fetch table 2 delivered orders
        $table2Orders = UserOrder::where('status', 'delivered')->where('table', '2')->get();

        // Calculate running balance
        $runningBalance = 0;
        foreach ($table2Orders as $order) {
            $runningBalance += $order->amount * $order->quantity;
        }

        return view('admin.table2', compact('table2Orders', 'runningBalance'));
    }

    public function table3()
    {
        // Fetch table 3 delivered orders
        $table3Orders = UserOrder::where('status', 'delivered')->where('table', '3')->get();

        // Calculate running balance
        $runningBalance = 0;
        foreach ($table3Orders as $order) {
            $runningBalance += $order->amount * $order->quantity;
        }

        return view('admin.table3', compact('table3Orders', 'runningBalance'));
    }

    public function table4()
    {
        // Fetch table 4 delivered orders
        $table4Orders = UserOrder::where('status', 'delivered')->where('table', '4')->get();

        // Calculate running balance
        $runningBalance = 0;
        foreach ($table4Orders as $order) {
            $runningBalance += $order->amount * $order->quantity;
        }

        return view('admin.table4', compact('table4Orders', 'runningBalance'));
    }

    public function table5()
    {
        // Fetch table 5 delivered orders
        $table5Orders = UserOrder::where('status', 'delivered')->where('table', '5')->get();

        // Calculate running balance
        $runningBalance = 0;
        foreach ($table5Orders as $order) {
            $runningBalance += $order->amount * $order->quantity;
        }

        return view('admin.table5', compact('table5Orders', 'runningBalance'));
    }

    public function table6()
    {
        // Fetch table 6 delivered orders
        $table6Orders = UserOrder::where('status', 'delivered')->where('table', '6')->get();

        // Calculate running balance
        $runningBalance = 0;
        foreach ($table6Orders as $order) {
            $runningBalance += $order->amount * $order->quantity;
        }

        return view('admin.table6', compact('table6Orders', 'runningBalance'));
    }


    public function updateOrderStatus($orderId)
    {
        // Retrieve the order by ID
        $order = UserOrder::find($orderId);

        // Check if the order exists
        if (!$order) {
            return response()->json(['error' => 'Order not found.'], 404);
        }

        // Update the status to "delivered"
        $order->status = 'delivered';
        $order->save();

        // Return a success response
        return response()->json(['message' => 'Order status updated successfully.']);
    }

    public function payAllBalances(Request $request)
    {
        // Fetch all orders for table 1 with status delivered
        $orders = UserOrder::where('table', 1)->where('status', 'delivered')->get();

        if ($orders->isEmpty()) {
            return response()->json(['message' => 'No delivered orders found for table 1'], 404);
        }

        // Update the status to paid
        foreach ($orders as $order) {
            $order->status = 'paid';
            $order->save();
        }

        return response()->json(['message' => 'All delivered orders for table 1 have been marked as paid'], 200);
    }

}
