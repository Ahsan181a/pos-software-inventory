<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $customers =Customer::orderBy('created_at','DESC')->get();
        return view('backend.customer.customer-view',compact('customers'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.customer.create');
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
            'name'=>'required|min:2|unique:customers',
            'mobile_no'=>'required|min:2|unique:customers',
            'email'=>'required|min:2|unique:customers',
            'address'=>'required|min:2|unique:customers', 
        ]);
        $customer = new Customer();
        $customer->name =$request->name;
        $customer->mobile_no =$request->mobile_no;
        $customer->email =$request->email;
        $customer->address =$request->address;
        $customer->save();
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
         $editCustomer=Customer::findOrfail($id);
         return view('backend.customer.edit',compact('editCustomer'));
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
                'name'=> 'required|unique:customers,name,'.$id,
                'mobile_no'=> 'required|unique:customers,mobile_no,'.$id,
                'email'=> 'required|unique:customers,email,'.$id,
                'address'=> 'required|unique:customers,address,'.$id,

            ]);
            $customer = Customer::findOrFail($id);
            $customer->name = $request->name;
            $customer->mobile_no = $request->mobile_no;
            $customer->email = $request->email;
            $customer->address = $request->address;
            $customer->save();
            toastr()->success('Have fun storming the castle!', 'Miracle Max Says');

            return  redirect()->route('customer.create')->with('success','customer updated successful');
        } catch (Exception $e) {
            return  redirect()->route('customer.index')->with('error',$e->getMessage());
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
         $customer=Customer::find($id);
        $customer->delete();
        return redirect()->back();
        
    }
}
