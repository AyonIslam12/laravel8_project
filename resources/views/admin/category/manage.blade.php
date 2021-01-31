@extends('admin.components.layouts')
@section('title')
    Manage-Categories
@endsection

@section('content')
    <h4 class="py-3"> Manage Categories</h4>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Sl No</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        @foreach($categories as $category)
        <tbody>

        <tr>
            <td>{{$category->id }}</td>
            <td>{{$category->name }}</td>
            <td>{{$category->slug }}</td>
            <td>{{ ucfirst($category->status)  }}</td>
            <td></td>
        </tr>

        </tbody>
        @endforeach
    </table>
    {{ $categories->links() }}



@endsection

