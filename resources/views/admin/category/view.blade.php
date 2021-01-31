@extends('admin.components.layouts')
@section('title')
    Single-Categories
@endsection

@section('content')

    <h4 class="py-3 text-center"> View Single Category </h4>
    <div class="row justify-content-center">
        <div class=" col-md-8">
            <table class="table table-bordered table-striped">

                <tr>
                    <th>Name</th>
                    <td>{{ $category->name }}</td>

                </tr>
                <tr>
                    <th>Slug</th>
                    <td>{{ $category->slug }}</td>

                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ ucfirst($category->status) }}</td>

                </tr>
                <tr>
                    <th>Created Time</th>
                    <td>{{ $category->created_at }}</td>

                </tr>

                <tr>
                    <th>Updated Time</th>
                    <td>{{ $category->updated_at }}</td>

                </tr>


            </table>


        </div>

    </div>

@endsection


