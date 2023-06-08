<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

class VerificationController extends Controller
{
    public function show()
    {
        return view('verify');
    }
 
    public function verify(Request $request)
    {
        $serialNumber = $request->input('serial_number');

        // Check if the serial number already exists in the "logs" table
        $existingValidationDate = $this->checkDuplicate($serialNumber);
        if ($existingValidationDate) {
            $errorMessage ='Serial Number: '. $serialNumber.  "\n" .'Your product is genuine!' . "\n" . 'But this product with has already been validated on: ' . $existingValidationDate;
            return redirect()->back()->with('error', $errorMessage);
        }
        // Retrieve the product by serial number
        $product = Product::where('serial_number', $serialNumber)->first();

        if ($product) {
            // Get the manufacturing date from the retrieved product
            $manufacturingDate = $product->manufacturing_date;

            // Save the verification details in the "logs" table
            DB::table('logs')->insert([
                'serial_number' => $serialNumber,
                'verification_date' => now()->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->back()->with('success', 'Serial number exists. Manufacturing Date: ' . $manufacturingDate . '. New entry created in logs.');
        } else {
            return redirect()->back()->with('error', 'Serial number does not exist.');
        }
    }

    private function checkDuplicate($serialNumber)
    {
        $existingEntry = DB::table('logs')->where('serial_number', $serialNumber)->first();
        if ($existingEntry) {
            return $existingEntry->verification_date;
        }
        return null;
    }
}
