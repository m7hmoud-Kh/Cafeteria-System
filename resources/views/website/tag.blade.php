@extends('website.layout')

@section('title')
    Tag
@endsection

@section('name')
    {{ $data['tag']->name }}
@endsection

@section('content')
    <section class="py-5">
        <div class="container p-0">
            <div class="row">
                <!-- SHOP SIDEBAR-->
                <div class="col-lg-3 order-2 order-lg-1">
                    <div class="py-2 px-4 bg-dark text-white mb-3"><strong
                            class="small text-uppercase font-weight-bold">Tags</strong></div>
                    @foreach ($data['tags'] as $tag)

                        <ul class="list-unstyled small text-muted pl-lg-4 font-weight-normal">
                            <li class="mb-2"><a class="reset-anchor" href="{{ route('show-tag', $tag->id) }}">
                                    {{ $tag->name }}</a>
                            </li>
                        </ul>

                    @endforeach
                    </div>
                <livewire:website.product-shop-component :products="$data['tag']" :catid="false" :tagid="$data['tagid']">
            </div>
        </div>
    </section>
@endsection
