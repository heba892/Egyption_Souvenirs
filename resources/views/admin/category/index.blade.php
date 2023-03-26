@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Category Page</h1>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>title</th>
                    <th>image</th>
                </tr>
            </thead>
            <tbody>
                @foreach($category as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>
                        <div class="image-container">
                            <img src="{{ asset('assets/uploads/Category/'.$item->image) }}" alt="image here">
                        </div>
                    </td>
                    <td>
                        <a href="{{ url('edit-categ/'.$item->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('delete-category/'.$item->id) }}" class="btn btn-primary">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection