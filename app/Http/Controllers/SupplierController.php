<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Supplier;
class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $suppliers =Supplier::orderBy('created_at','DESC')->get();
        return view('backend.supplier.supplier-view',compact('suppliers'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.supplier.create');
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
            'name'=>'required|min:2|unique:suppliers',
            'mobile_no'=>'required|min:2|unique:suppliers',
            'email'=>'required|min:2|unique:suppliers',
            'address'=>'required|min:2|unique:suppliers', 
        ]);
        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->mobile_no = $request->mobile_no;
        $supplier->email = $request->email;
        $supplier->address = $request->address;
        $supplier->save();
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
         $editSupplier=Supplier::findOrfail($id);
         return view('backend.supplier.edit',compact('editSupplier'));
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
                'name'=> 'required|unique:suppliers,name,'.$id,
                'mobile_no'=> 'required|unique:suppliers,mobile_no,'.$id,
                'email'=> 'required|unique:suppliers,email,'.$id,
                'address'=> 'required|unique:suppliers,address,'.$id,

            ]);
            $supplier = Supplier::findOrFail($id);
            $supplier->name = $request->name;
            $supplier->mobile_no = $request->mobile_no;
            $supplier->email = $request->email;
            $supplier->address = $request->address;
            $supplier->save();
            toastr()->success('Have fun storming the castle!', 'Miracle Max Says');

            return  redirect()->route('supplier.create')->with('success','supplier updated successful');
        } catch (Exception $e) {
            return  redirect()->route('supplier.index')->with('error',$e->getMessage());
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
         $supplier=Supplier::find($id);
        $supplier->delete();
        return redirect()->back();
        
    }
}
