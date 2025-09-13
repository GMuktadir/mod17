<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Product;

class OrmQueryController extends Controller
{
    
    public function orm()
    {
        // $students = Student::all();
        $products = Product::get();
        // $students = Student::where('roll',311877)->get();
        // $students = Student::where('id',9)->get();
        $sumStock = Product::sum('stock');
        $numberOfProducts = Product::count();
        $totalPrice = Product::sum('price');

        return view('orm.index', compact('products','sumStock','totalPrice','numberOfProducts'));
    }
    public function product()
    {
        return view('orm.product');
    }
    public function insertProduct(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $saveData=$product->save(); 

        if($saveData){
           
            return redirect()->route('orm')->with('success_create','Product Inserted Successfully');
        }else{
            
            return redirect()->route('orm/product')->with('failed_create','Something went wrong, failed to insert product');
        }

    }
}
