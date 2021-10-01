@extends('home')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Product Page</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active">product Page</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card card-primary card-outline">
          <div class="card-body">
            <h5 class="card-title">Product </h5>
            <br>
            <form method="POST" action="{{route('purchase.store')}}">
            @csrf
            <div class="card-body">
              <dv class="form-row">
                <div class="col-md-4">
                <div class="form-group">
                  <label>Supplier Name</label>
                  <select name="supplier_id"  class="select2bs4 form-control"   style="width: 100%;">
                    <option value="">Select Supplier</option>
                    @foreach($suppliers as $Supplier)
                    <option value="{{$Supplier->id}}">{{$Supplier->name}}</option> 
                    @endforeach
                  </select>
                </div>
              </div>
               <div class="col-md-4">
                <div class="form-group">
                  <label>Category Name</label>
                  <select name="category_id"  class="select2bs4 form-control"   style="width: 100%;">
                    <option value="">Select Supplier</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option> 
                    @endforeach
                  </select>
                </div>
              </div>
               <div class="col-md-4">
                <div class="form-group">
                  <label>unit</label>
                  <select name="unit_id"  class="select2bs4 form-control"   style="width: 100%;">
                    <option value="">Select unit</option>
                    @foreach($units as $unit)
                    <option value="{{$unit->id}}">{{$unit->name}}</option> 
                    @endforeach
                  </select>
                </div>
              </div>
               
               <div class="form-group col-md-4">
                <label for="name">Product Name</label>
                <input type="text" name="name"  class="form-control"  placeholder="Enter address">
                @if($errors->has('address'))
                  <span class="text-danger">{{$errors->first('address')}}</span>
                @endif
              </div>
              </dv>
              <!-- /.card-body -->
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Submit</button>
            </div>
          </form>
          </div>
        </div><!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
@endsection 