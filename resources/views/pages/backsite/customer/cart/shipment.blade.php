@extends('layouts.app')

@section('title', 'Cart Shipment')

@section('content')


    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Purchase Method</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        @livewire('backsite.purchase-method')
                    </div>
                </div>
            </div>
            @livewire('backsite.card-purchase')
        </div>

        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Payment Method</h4>
                </div>
                @livewire('backsite.payment-method')
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-8">

            <div class="card">
                <div class="card-content collapse show">
                    <div class="card-body">
                        @foreach ($items as $item)
                            <div class="row mb-3 align-items-center">
                                <div class="col-auto product-img">
                                    <img class="img-fluid"
                                        src="{{ request()->getSchemeAndHttpHost() . '/storage/' . $item->publication->cover_image }}"
                                        alt="Cover Image" style="width: 80px; height: 106px; object-fit: cover;">
                                </div>
                                <div class="col product-title" style="font-size: 16px;">
                                    {{ $item->publication->title }}
                                </div>
                                <div class="col-auto align-items-end">
                                    <strong>{{ $item->quantity }} x Rp
                                        {{ number_format($item->publication->price, 0, ',', '.') }}</strong>
                                </div>

                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>

        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Shopping Summary</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        @livewire('backsite.shopping-summary', ['items' => $items])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
