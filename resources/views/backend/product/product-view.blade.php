@extends('home')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">product List</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active">product List</li>
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
            <h5>Product</h5>
            <ol class="breadcrumb float-sm-right">
              <a href="{{route('product.create')}}" class="btb-sm btn btn-primary"><i class="fa fa-plus"></i>Add product</a>
              </ol>
            <br> 
            <table class="table table-bordered myTable">
              <thead>
                <tr class="text-center">
                  <th>#sl</th>
                  <th>Supplier Name</th>
                  <th>Category</th>
                  <th>Name</th>
                  <th>Unit</th>
                  <th>Action</th>
                </tr>
              </thead>
             <tbody>
                @if('products')
                @foreach($products as $key=>$product)
                <tr class="text-center">
                  <td>{{++$key}}</td>
                  <td>{{$product['supplier']['name']??''}}</td>
                  <td>{{$product['category']['name']??''}}</td>
                  <td>{{$product->name??''}}</td>
                  <td>{{$product['unit']['name']??''}}</td>
                  <td >
                    <a href="{{route('product.edit',$product->id)}}" class="btb-sm btn btn-primary" title="Edit"><i class="fas fa-pen"></i>Edit</a>
                    <a href="javascript:;" class="btb-sm btn btn-danger sa-delete"  data-form-id="product-delete-{{$product->id}}" title="Delete"><i class="fas fa-trash-restore-alt"></i>Delete</a>
                    <form id="product-delete-{{$product->id}}" action="{{route('product.destroy',$product->id)}}" method="POST">

                      @csrf
                      @method('DELETE')
                    </form>
                  </td>
                </tr>
                @endforeach
                @endif
              </tbody>
            </table>
          </div>
        </div><!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
@endsection