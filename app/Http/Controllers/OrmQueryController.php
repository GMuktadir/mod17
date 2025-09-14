<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Product;
use App\Models\Customer;

class OrmQueryController extends Controller
{
    public function orm()
    {
        return view('orm.orm');
    }
    public function showProduct()
    {
        // $students = Student::all();
        $products = Product::get();
        // $students = Student::where('roll',311877)->get();
        // $students = Student::where('id',9)->get();
        $sumStock = Product::sum('stock');
        $numberOfProducts = Product::count();
        $totalPrice = Product::sum('price');

        return view('orm.showProduct', compact('products',
                                        'sumStock',
                                        'totalPrice',
                                        'numberOfProducts'
                                        ));
    }
    public function product()
    {
        return view('orm.createProduct');
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
           
            return redirect()->route('orm/product/show')->with('success_create','Product Inserted Successfully');
        }else{
            
            return redirect()->route('orm/product/create')->with('failed_create','Something went wrong, failed to insert product');
        }

    }
     public function showCustomer()
    {
        $customers = Customer::get();
        $numberOfCustomers = Customer::count();
        return view('orm.showCustomer', compact('customers',
                                                'numberOfCustomers'));
    }
    public function customer()
    {
        return view('orm.createCustomer');
    }
    public function insertCustomer(Request $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $saveData=$customer->save(); 

        if($saveData){
           
            return redirect()->route('orm/customer/show')->with('success_create','Customer Inserted Successfully');
        }else{
            
            return redirect()->route('orm/customer')->with('failed_create','Something went wrong, failed to insert product');
        }

    }
}
