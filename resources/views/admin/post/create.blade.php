@extends('admin.components.layouts')
@section('title')
    Create-Categories
@endsection

@section('content')

       <h4 class="py-3 text-center"> Create new Category</h4>
  <div class="row justify-content-center">
      <div class="col-md-6">
          @if($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                  </ul>

              </div>

          @endif
              @if(session('message'))
                  <div class="alert alert-{{ session('type') }}">
                      <p>{{ session('message') }}</p>
                  </div>
              @endif
          <div class="card">
              <div class="card-header">
                  Add new Category form.
              </div>
             <form action="{{ route('admin.category.store') }}" method="post">
                 @csrf
                 <div class="card-body">
                     <div class="form-group">
                         <label for="name">Name</label>
                         <input type="text" class="form-control  " id="name" name="name" value="{{ old('name') }}" placeholder="Enter Category Name...">

                     </div>
                     <div class="form-group">
                         <label for="status" >Status</label><br>
                         <div class="custom-control custom-radio custom-control-inline">
                             <input type="radio" id="active" name="status" value="active" class="custom-control-input">
                             <label class="custom-control-label" for="active">Active</label>
                         </div>
                         <div class="custom-control custom-radio custom-control-inline">
                             <input type="radio" id="inactive" name="status" value="inactive" class="custom-control-input">
                             <label class="custom-control-label" for="inactive">Inactive</label>
                         </div>


                     </div>
                 </div>
                 <div class="card-footer text-right">
                     <button type="submit" class="btn btn-primary">Create</button>
                 </div>
             </form>

          </div>

      </div>

  </div>

@endsection


