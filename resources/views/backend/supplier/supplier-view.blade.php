@extends('home')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">supplier List</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active">supplier List</li>
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
            <h5 class="card-title">List supplier</h5><br>
              <a href="{{route('supplier.create')}}" class="btb-sm btn btn-primary"><i class="fa fa-plus"></i>Add supplier</a>
            <br>
            <table class="table table-bordered myTable">
              <thead>
                <tr class="text-center">
                  <th>#sl</th>
                  <th>Name</th>
                  <th>Mobile_no</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              	@if('suppliers')
                @foreach($suppliers as $key=>$supplier)
                <tr class="text-center">
                  <td>{{++$key}}</td>
                  <td>{{$supplier->name??''}}</td>
                  <td>{{$supplier->mobile_no??''}}</td>
                  <td>{{$supplier->email??''}}</td>
                  <td>{{$supplier->address??''}}</td>
                  <td>{{$supplier->status??''}}</td>
                  <td >
                    <a href="{{route('supplier.edit',$supplier->id)}}" class="btb-sm btn btn-primary" title="Edit"><i class="fas fa-pen"></i>Edit</a>
                    <a href="javascript:;" class="btb-sm btn btn-danger sa-delete"  data-form-id="supplier-delete-{{$supplier->id}}" title="Delete"><i class="fas fa-trash-restore-alt"></i>Delete</a>
                    <form id="supplier-delete-{{$supplier->id}}" action="{{route('supplier.destroy',$supplier->id)}}" method="POST">

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