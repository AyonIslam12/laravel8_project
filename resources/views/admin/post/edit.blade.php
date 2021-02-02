@extends('admin.components.layouts')
@section('title')
    Upadate-Posts
@endsection

@section('content')

    <h4 class="py-3 text-center"> Upadate  Post</h4>
    <div class="row justify-content-center">
        <div class="col-md-8 mb-3">
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
                    Upadte Post form
                </div>
                <form action="{{ route('admin.post.update',$post->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" name="category" id="category">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected':'' }}> {{ $category->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control  " id="title" name="title" value="{{ $post->title }}" placeholder="Enter post Name...">
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image" >
                        </div>
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <textarea  class="form-control  " id="desc" name="desc">{{ $post->desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="status" >Status</label><br>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="active" name="status" value="active" {{ $post->status == 'active' ? 'checked':'' }} class="custom-control-input">
                                <label class="custom-control-label" for="active">Active</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="inactive" name="status" value="inactive" {{ $post->status  == 'inactive' ? 'checked':'' }} class="custom-control-input">
                                <label class="custom-control-label" for="inactive">Inactive</label>
                            </div>


                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>

            </div>

        </div>

    </div>

@endsection


