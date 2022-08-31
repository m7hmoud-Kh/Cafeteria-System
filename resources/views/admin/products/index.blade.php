@extends('admin.layout')

@section('content')
    <div>

        <h1>All Products</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary" style="margin-bottom:10px">Add Product</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Size</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $p)
                    <tr>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->price }} EGP</td>
                        <td><img src='{{ asset('assets/admin/productsimages/' . $p->image) }}' width="50px" height="50px"
                                alt="Product image"></td>
                        </td>
                        <td>{{ $p->size }}</td>
                        <td>{{ $p->quantity }}</td>
                        <td>
                            @if ($p->status === 1)
                                <p>Aviliable</p>
                            @elseif ($p->status === 0)
                                <p>Unaviliable</p>
                            @endif
                        </td>
                        <td><a href="{{ route('products.edit', $p->id) }}" class="btn btn-warning">Edit</a></td>
                        <td>
                            <form action="{{ route('products.destroy', $p->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
