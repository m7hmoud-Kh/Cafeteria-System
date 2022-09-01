{{-- @extends('admin.layout')

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
@endsection --}}
@extends('admin.layout')

@section('title')
    Products
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/plugins/jquery.dataTables.min.css') }}">
@endsection

@section('content')
    <div>
        @include('admin.includes.alert-message')
    </div>
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> <a class="btn btn-primary" href="{{ route('products.create') }}">Add Product</a> </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">Home</a></li>
                    <li class="breadcrumb-item active">Products</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th scope="">#</th>
                                <th scope="">Product</th>
                                <th scope="">Price</th>
                                <th scope="">Image</th>
                                <th scope="">Size</th>
                                <th scope="">Quantity</th>
                                <th scope="">Status</th>
                                <th scope="">More Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $product_count = 0;
                            @endphp
                            @foreach ($data['products'] as $product)
                                <tr>
                                    <td>{{ ++$product_count }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td><img src="{{ asset('product_image/' . $product->image) }}" width="100"
                                            height="100" alt="{{ $product->name }}"></td>
                                    <td>{{ $product->size }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->status }}</td>
                                    <td>
                                        <a href="{{ route('products.edit', $product->id) }}"
                                            class="btn btn-primary">Edit</a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                            data-target="#exampleModalCenter"> Delete </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="">#</th>
                                <th scope="">Product</th>
                                <th scope="">Price</th>
                                <th scope="">Image</th>
                                <th scope="">Size</th>
                                <th scope="">Quantity</th>
                                <th scope="">Status</th>
                                <th scope="">More Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">
                        Delete Product
                    </div>
                </div>
                <form action="{{ route('products.destroy', 1) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        Do You want to Delete
                        <strong><span id="name"></span></strong>
                        <input type="hidden" name="id" id="products_id" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class='btn btn-danger'>
                            Delete
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script src="{{ asset('assets/admin/js/bootstrap-datatables/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
        $("#exampleModalCenter").on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var name = button.data('name');
            var modal = $(this);
            modal.find('.modal-body #name').html(name);
            modal.find('.modal-body #products_id').val(id);
        });
    </script>
@endsection
