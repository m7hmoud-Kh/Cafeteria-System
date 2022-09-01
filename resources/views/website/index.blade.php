@extends('website.layout')

@section('title')
    Home
@endsection

@section('name')
    Shop
@endsection

@section('content')
    <div class="row">
        <!-- SHOP SIDEBAR-->
        <div class="col-lg-3 order-2 order-lg-1">
            <!-- <h5 class="text-uppercase mb-4">Categories</h5>-->
            <div class="py-2 px-4 bg-dark text-white mb-3"><strong
                    class="small text-uppercase font-weight-bold">Categories</strong></div>
            @foreach ($categories as $category)
                @foreach ($products as $prouduct)
                    @if ($prouduct->category_id === $category->id)
                        <ul class="list-unstyled small text-muted pl-lg-4 font-weight-normal">
                            <li class="mb-2"><a class="reset-anchor" href="#"> {{ $category->name }}</a></li>
                    @endif
                @endforeach
                </ul>
            @endforeach
            <div class="py-2 px-4 bg-dark text-white mb-3"><strong class="small text-uppercase font-weight-bold">
                    tags</strong></div>
            @foreach ($tags as $tag)
                <ul class="list-unstyled small text-muted pl-lg-4 font-weight-normal">
                    <li class="mb-2"><a class="reset-anchor" href="#">{{ $tag->name }}</a></li>
                </ul>
            @endforeach
        </div>
    @endsection
