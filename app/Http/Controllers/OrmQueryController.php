<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Offer;

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
        // $totalPrice = Product::sum('price');

        $condition = Product::where('stock','>',100)
                            ->where('stock','<',401)->get();
        $totalPrice = Product::where('stock','>',100)
                            ->where('stock','<',401)->sum('price'); //don't use get() here
        

        return view('orm.showProduct', compact('products',
                                        'sumStock',
                                        'totalPrice',
                                        'numberOfProducts',
                                        'condition'
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
    public function showOffer()
    {
        $offers = Offer::get();
        $numberOfOffers = Offer::count();
        return view('orm.showOffer', compact('offers','numberOfOffers'));
    }
    public function offer()
    {
        return view('orm.createOffer');
    }
    public function insertOffer(Request $request)
    {
        $offer = new Offer();
        $offer->offer_name = $request->offer_name;
        $saveData=$offer->save();
        if($saveData){
           
            return redirect()->route('orm/offer/show')->with('success_create','Offer Inserted Successfully');
        }else{          
            return redirect()->route('orm/offer')->with('failed_create','Something went wrong, failed to insert offer');
        }
    }
}
