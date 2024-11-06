<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('home', compact('products'));
    }

    public function about()
    {
        return view('about');
    }

    public function shop()
    {
        $products = Product::all();
        return view('shop', compact('products'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        }else{

            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'price'=>'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $product = new Product();
            $product->name = $request->name;
            $product->price = $request->price;
            $product->description = $request->description;
            $product->image = 'images/'.$imageName;
            $product->save();
            return redirect()->route('index')->with('success', 'Product created successfully.');
        
        }
        
    }

    public function cart()
    { 
        
        $subtotals = \Cart::getSubTotal();
        $totals = \Cart::getTotal();
        $items = \Cart::getContent();
        return view('cart', compact('items', 'totals', 'subtotals'));
    
    }

    public function addcart($productId)
    {
        $product = Product::findOrFail($productId);
        \Cart::add(array(
            'id' => $productId,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(
            'image'=>$product->image,
            ),
            'associatedModel' => $product
        ));
        return redirect()->route('cart')->with('success', 'Item added to cart successfully');
    
    }
    public function addquantity($productId)
    {
        \Cart::update($productId,[
            'quantity'=> +1   
        ]);
        return back()->with('success', 'Quantity has been increased');
    
    }
    public function decreasequantity($productId)
    {
        
        \Cart::update($productId,[
            'quantity'=> -1   
            
        ]);
        return back()->with('success', 'Quantity has been decreased');
    
    }
    public function removeitem($productId)
    {
        \Cart::remove($productId);
        return back()->with('success', 'Quantity has been removed');
    }

    public function clearcart()
    {
        Cart::clear();

        return back()->with('success', 'Cart cleared No Items in the Cart');
    }
}
