@extends('layouts.app')

@section('title', 'Cart')

@section('content')

    <div>
        @if (session()->has('success'))
            <script>
                toast('{{ session('success') }}', 'success');
            </script>
        @endif

        @if (session()->has('error'))
            <script>
                toast('{{ session('error') }}', 'error');
            </script>
        @endif
    </div>

    {{-- breadcumb --}}
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Cart</h3>
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('customer.dashboard.index') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-content pt-1">
        <div role="tabpanel" class="tab-pane active" id="shop-cart-tab" aria-expanded="true"
            aria-labelledby="shopping-cart">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0 min-w-full">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th style="width: 13%;">Product</th>
                                        <th style="width: 52%;">Details</th>
                                        <th style="width: 15%;">No. Of Products</th>
                                        <th style="width: 15%;">Price</th>
                                        <th style="width: 5%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($cartItems as $item)
                                        <tr>
                                            <td> @livewire('backsite.cart-item-select', ['cartItem' => $item], key($item->id))</td>
                                            <td>
                                                <div class="product-img">
                                                    <img class="img-fluid"
                                                        src="{{ request()->getSchemeAndHttpHost() . '/storage/' . $item->publication->cover_image }}">
                                                </div>
                                            </td>
                                            <td class="align-items-center">
                                                <div class="product-title" style="font-size: 16px">
                                                    {{ $item->publication->title }}
                                                </div>
                                                <div class="product-size mt-1"><strong>Author : </strong>
                                                    {{ $item->publication->author }}</div>
                                            </td>
                                            <td>
                                                @livewire('backsite.cart-item-quantity', ['cartItem' => $item])
                                            </td>

                                            <td>
                                                <div class="total-price">Rp
                                                    {{ number_format($item->publication->price, 0, ',', '.') }}</div>
                                            </td>

                                            <td>
                                                <div class="product-action">
                                                    <form action="{{ route('customer.cart.destroy', $item->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Are you sure you want to remove this item from the cart?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            style="border: none; background: none; color: red;">
                                                            <i class="ft-trash-2"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Your cart is empty.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row match-height">
                <div class="col-lg-6 col-md-12">
                    <div class="card" style="">
                        <div class="card-header">
                            <h4 class="card-title">Apply Coupon</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <label class="text-muted">Enter your coupon code if you have one!</label>
                                <form action="#">
                                    <div class="form-body">
                                        <input type="text" class="form-control" placeholder="Enter Coupon Code Here">
                                    </div>
                                    <div class="form-actions border-0 pb-0 text-right">
                                        <button type="button" class="btn btn-info">Apply Code</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @livewire('backsite.price-details', ['cartItems' => $cartItems])
            </div>
            <form action="#">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="text-right">
                                        <a href="{{ route('publication.index') }}" class="btn btn-info mr-2">Continue
                                            Shopping</a>
                                        @livewire('backsite.selected-item-count', ['cartItems' => collect($cartItems)], key('selected-item-count'))
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
