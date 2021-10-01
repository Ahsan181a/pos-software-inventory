@extends('home')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">supplier Page</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active">supplier Page</li>
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
            <h5 class="card-title">Supplier </h5>
            <br>
            <form method="POST" action="{{route('unit.update', $editUnit->id)}}">
            @csrf
            @method('PUT')
            <div class="card-body">
              <dv class="row">
                <div class="form-group col-md-4">
                <label for="name">Supplier Name</label>
                <input type="text" name="name" value="{{$editUnit->name}}" class="form-control"  placeholder="Enter Name">
                @if($errors->has('name'))
                  <span class="text-danger">{{$errors->first('name')}}</span>
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