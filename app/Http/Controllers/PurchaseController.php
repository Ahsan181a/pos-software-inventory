<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\Unit;
use Auth;
use App\Models\Purchase;
class PurchaseController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $purchases =Purchase::orderBy('date','DESC')->orderBy('id','DESC')->get();
        return view('backend.purchase.purchase-view',compact('purchases'));
    }
    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $suppliers=Supplier::all();
        $categories=Category::all();
        $units=Unit::all();
        return view('backend.purchase.create',compact('suppliers','categories','units'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
            'name'=>'required|min:2|unique:products',
        ]);
        $product = new Product();
        $product->supplier_id = $request->supplier_id;
        $product->category_id = $request->category_id;
        $product->unit_id = $request->unit_id;
        $product->name = $request->name;
        $product->quantity ='0';
        $product->save();
        return redirect()->back()->with('message','Data added Successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['editData']=Product::findOrfail($id);
        $data['suppliers']=Supplier::all();
        $data['categories']=Category::all();
        $data['units']=Unit::all();
         return view('backend.product.edit',$data);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         try {
            $this->validate($request,[
                'name'=> 'required|unique:categories,name,'.$id,
            ]);
            $product = Product::findOrFail($id);
            $product->supplier_id = $request->supplier_id;
            $product->category_id = $request->category_id;
            $product->unit_id = $request->unit_id;
            $product->name = $request->name;
            $product->quantity ='0';
            $product->save();   
            return  redirect()->route('product.create')->with('success','supplier updated successful');
        } catch (Exception $e) {
            return  redirect()->route('product.index')->with('error',$e->getMessage());
        }
    } 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $product=Product::find($id);
        $product->delete();
        return redirect()->back();
        
    }
}