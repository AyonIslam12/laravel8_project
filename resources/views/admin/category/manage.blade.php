@extends('admin.components.layouts')
@section('title')
    Manage-Categories
@endsection

@section('content')
   <div class="row">
       <div class="col-md-12">
           <h4 class="py-3"> Create new Category</h4>
       </div>
   </div>


   <div class="row p-3">
       <div class="col-md-12">

           @if(session()->has('message'))
               <div class="alert alert-{{ session('type') }}">
                   <p>{{ session('message') }}</p>
               </div>
           @endif


           <table class="table table-bordered table-striped">
               <thead>
               <tr>
                   <th>Sl No</th>
                   <th>Name</th>
                   <th>Slug</th>
                   <th>Status</th>
                   <th class="text-center">Action</th>
               </tr>
               </thead>
               @foreach($categories as $category)
                   <tbody>

                   <tr>
                       <td>{{$category->id }}</td>
                       <td>{{$category->name }}</td>
                       <td>{{$category->slug }}</td>
                       <td>{{ ucfirst($category->status)  }}</td>
                       <td class="d-flex justify-content-center">
                         <a href="{{ route('admin.category.show',$category->id) }}" class="btn btn-info btn-sm mx-1">View</a>
                         <a href="{{ route('admin.category.edit',$category->id) }}" class="btn btn-primary btn-sm mx-1">Edit</a>

                           <form action="{{ route('admin.category.destroy',$category->id) }}" method="post">
                               @csrf
                               @method('DELETE')
                               <button type="submit" class="btn btn-danger btn-sm  mx-1">Delete</button>

                           </form>

                       </td>
                   </tr>

                   </tbody>
               @endforeach
           </table>

       </div>
       {{'page:-'.$categories->currentpage() }}
       {{ $categories->links() }}

   </div>



@endsection

