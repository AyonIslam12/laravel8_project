@extends('admin.components.layouts')
@section('title')
    Manage-Posts
@endsection

@section('content')
   <div class="row">
       <div class="col-md-12">
           <h4 class="py-3"> Manage Posts</h4>
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
                   <th>Post Title</th>
                   <th>Slug</th>
                   <th>Description</th>
                   <th>Image</th>
                   <th>Status</th>
                   <th class="text-center">Action</th>
               </tr>
               </thead>
               @foreach($posts as $post)
                   <tbody>

                   <tr>
                       <td>{{$post->id }}</td>
                       <td>{{$post->title }}</td>
                       <td><a href="{{$post->slug }}" target="_blank">Click here</a></td>
                       <td><a href="{{$post->desc }}" target="_blank">Click here</a></td>
                       <td><img src="{{ asset('uploads/post/'.$post->image) }}" width="60px" alt=""></td>
                       <td>{{ ucfirst($post->status)  }}</td>
                       <td class="d-flex justify-content-center">
                         <a href="{{ route('admin.post.show',$post->id) }}" class="btn btn-info btn-sm mx-1">View</a>
                         <a href="{{ route('admin.post.edit',$post->id) }}" class="btn btn-primary btn-sm mx-1">Edit</a>

                           <form action="{{ route('admin.post.destroy',$post->id) }}" method="post">
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
       {{'page:-'.$posts->currentpage() }}
       {{ $posts->links() }}

   </div>



@endsection

