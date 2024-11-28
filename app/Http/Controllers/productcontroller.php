<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class productcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $product = product:: latest()->paginate(4);
        return view('product.index',compact('product'))->with('i',(request()->input('page',1)-1)*4);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gram=['5g','10g','25g','50g','100g','250g','500g','1000g'];

        return view('product.create',compact('gram'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['itemname'=> 'required',
        'itemname'=> 'required',
        'gram'=> 'required',
        'price'=> 'required',
        'poster'=> 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
        
    ]);
     $imageName='';
        if ($request->poster) {
            $imageName = time() . '.' . $request->poster->extension();
            $request->poster->move(public_path('Uploads'), $imageName);
        }

        $data = new product;
        $data ->itemname = $request-> itemname;
        $data ->gram = $request-> gram;
        $data ->price = $request-> price;
        $data ->poster =$imageName;
        $data -> save();
        return redirect()->route('product.index')->with('success', 'Item created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        $gram=['5g','10g','25g','50g','100g','250g','500g','1000g'];
        return view('product.edit',compact('product','gram'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        $request->validate([
            'itemname'=>'required',
            'gram'=>'required',
        ]);

        $imageName='';
        if ($request->poster) {
            $imageName = time() . '.' . $request->poster->extension();
            $request->poster->move(public_path('Uploads'), $imageName);
            $product->poster =$imageName;
        }
        $product ->itemname = $request-> itemname;
        $product ->gram = $request-> gram;   
        $product ->price = $request-> price;
        $product ->update();
        return redirect ()-> route('product.index')->with('success','product has been successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success','student data deleted successfully');
    }
}
