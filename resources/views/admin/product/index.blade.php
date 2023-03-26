@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Product Page</h1>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>category</th>
                    <th>title</th>
                    <th>description</th>
                    <th>image</th>
                    <th>price</th>
                    <th>Quantity</th>

                </tr>
            </thead>
            <tbody>
                @foreach($products as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->category->title }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->image }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>
                        <div class="image-container">
                            <img src="{{ asset('assets/uploads/Product/'.$item->image) }}" alt="image here">
                        </div>
                    </td>
                    <td>
                        <a href="{{ url('edit-product/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{ url('delete-product/'.$item->id) }}" class="btn btn-primary btn-sm">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection