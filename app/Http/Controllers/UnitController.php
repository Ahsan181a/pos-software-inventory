<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $units =Unit::orderBy('created_at','DESC')->get();
        return view('backend.unit.unit-view',compact('units'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.unit.create');
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
        ]);
        $supplier = new Unit();
        $supplier->name = $request->name;
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
         $editUnit=Unit::findOrfail($id);
         return view('backend.unit.edit',compact('editUnit'));
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
                'name'=> 'required|unique:units,name,'.$id,
            ]);
            $unit = Unit::findOrFail($id);
            $unit->name = $request->name;
            $unit->save();
            toastr()->success('Have fun storming the castle!', 'Miracle Max Says');

            return  redirect()->route('unit.create')->with('success','supplier updated successful');
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
         $unit=Unit::find($id);
        $unit->delete();
        return redirect()->back();
        
    }
}
