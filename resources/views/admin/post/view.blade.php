@extends('admin.components.layouts')
@section('title')
    Single-Post
@endsection

@section('content')

    <h4 class="py-3 text-center"> View Single Post </h4>
    <div class="row justify-content-center">
        <div class=" col-md-8">
            <table class="table table-bordered table-striped">

                <tr>
                    <th>Post Title</th>
                    <td>{{ $post->title }}</td>

                </tr>
                <tr>
                    <th>Slug</th>
                    <td>{{ $post->slug }}</td>

                </tr>
                <tr>
                    <th>Image</th>
                    <td><img src="{{ asset('uploads/post/'.$post->image) }}" width="100px" alt=""></td>

                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ ucfirst($post->status) }}</td>

                </tr>
                <tr>
                    <th>Created Time</th>
                    <td>{{ $post->created_at }}</td>

                </tr>

                <tr>
                    <th>Updated Time</th>
                    <td>{{ $post->updated_at }}</td>

                </tr>


            </table>


        </div>

    </div>

@endsection


