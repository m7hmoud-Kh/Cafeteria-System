@extends('admin.layout')

@section('title')
    Make Order
@endsection


@section('style')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/plugins/select2.min.css') }}">
@endsection


@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="m-3"> <a href="{{ route('make-order') }}" class="btn btn-primary"> New Order </a>
                </h4>


            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">Home</a></li>
                    <li class="breadcrumb-item active">Order</li>
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
                                <th scope="">Order</th>
                                <th scope="">Notes</th>
                                <th scope="">Phone</th>
                                <th scope="">Sub Total</th>
                                <th scope="">Tax</th>
                                <th scope="">Total</th>
                                <th scope="">Status</th>
                                <th scope="">Craeted At</th>
                                <th scope="">More Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $order_count = 0;
                            @endphp
                            @forelse ($orders as $order)
                            @php
                            $next_status = '';
                            if($order->status == 1){
                                $next_status = 2;
                            }elseif($order->status == 2){
                                $next_status = 3;
                            }
                            @endphp
                                <tr>
                                    <td>{{ ++$order_count }}</td>
                                    <td>{{ $order->ref_id }}</td>
                                    <td>{{ $order->notes }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>{{ $order->format_price($order->sub_total) }}</td>
                                    <td>{{ $order->format_price($order->tax) }}</td>
                                    <td>{{ $order->format_price($order->total) }}</td>
                                    <td>{!! $order->status($order->status) !!}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>
                                        @if ($order->status != 1)
                                            <a href="{{ route('show', $order->id) }}" class="btn btn-primary">
                                                View Details
                                            </a>
                                        @endif
                                        @if (!empty($next_status))
                                            <button type="button"  data-target="#exampleModalCenter" data-toggle="modal"
                                            class='btn btn-success'
                                            data-order_id="{{$order->id}}"
                                            data-next_status="{{$next_status}}"
                                            data-ref_id="{{$order->ref_id}}"
                                            >Status</button>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="10">No Data Found</td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="">#</th>
                                <th scope="">Order</th>
                                <th scope="">Notes</th>
                                <th scope="">Phone</th>
                                <th scope="">Sub Total</th>
                                <th scope="">Tax</th>
                                <th scope="">Total</th>
                                <th scope="">Status</th>
                                <th scope="">Craeted At</th>
                                <th scope="">More Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                {{ $orders->links() }}
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">
                        Change Status
                    </div>
                </div>
                <form action="{{route('changestatus')}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        Do You want to Change Status For Order:
                        <strong><span id="ref_id"></span></strong>
                        <input type="hidden" name="order_id" id="order_id" value="">
                        <input type="hidden" name="next_status" id="next_status" value="">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class='btn btn-success'>
                            Confirm
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
     $("#exampleModalCenter").on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var order_id = button.data('order_id');
            var next_status = button.data('next_status');
            var ref_id = button.data('ref_id');
            var modal = $(this);
            modal.find('.modal-body #ref_id').html(ref_id);
            modal.find('.modal-body #order_id').val(order_id);
            modal.find('.modal-body #next_status').val(next_status);
        });
</script>
@endsection
