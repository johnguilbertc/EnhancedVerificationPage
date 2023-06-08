<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function create()
    {
        return view('encode');
    }

    public function save(Request $request)
{
     // Validate the input data
     $validatedData = $request->validate([
        'serial_number' => 'required',
        'manufacturing_date' => 'required|date',
    ]);

    // Create a new Product instance
    $product = new Product();
    $product->serial_number = $validatedData['serial_number'];
    $product->manufacturing_date = $validatedData['manufacturing_date'];

    // Save the product to the database
    $product->save();

    return redirect()->back()->with('success', 'Data saved successfully.');

}

}
