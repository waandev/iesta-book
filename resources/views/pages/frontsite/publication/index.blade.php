@extends('layouts.default')

@section('title', 'Publication')

@section('content')
    <main id="main">

        {{-- error --}}
        @if ($errors->any())
            <div class="alert bg-danger alert-dismissible mb-2" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- ======= Intro Single ======= -->
        <section class="intro-single">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="title-single-box">
                            <h1 class="title-single">Our Publications</h1>
                            {{-- <span class="color-text-a">Grid Properties</span> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Intro Single-->

        <!-- ======= Property Grid ======= -->
        <section class="property-grid grid">
            <div class="container">
                <div class="row">

                    @forelse($publications as $key => $publication)
                        <div class="col-md-2 col-6">
                            <div class="card-no-transition-a card-no-transition-shadow">
                                <div class="img-box-a">
                                    <img src="{{ request()->getSchemeAndHttpHost() . '/storage' . '/' . $publication->cover_image }}"
                                        alt="" class="img-a img-fluid" />
                                </div>
                                <div class="card-no-transition-overlay">
                                    <div class="card-no-transition-overlay-a-content">
                                        <div class="card-no-transition-header-a">
                                            <h3 class="card-author-a">{{ $publication->author }}</h3>
                                            <h2 class="card-title-a">
                                                {{ $publication->title }}
                                            </h2>
                                            <h2 class="card-price mt-2">
                                                Rp {{ number_format($publication->price, 0, ',', '.') }}
                                            </h2>
                                            <h3 class="card-author-a">{{ $publication->stock }} in stock |
                                                {{ $publication->sold }} sold</h3>
                                        </div>
                                        @livewire('frontsite.add-to-cart', ['publicationId' => $publication->id])
                                    </div>
                                </div>

                            </div>
                            <p>
                                Description: Analog circuits, reconfigurable fuzzy logic, innovative solutions for adaptive
                                control systems.
                            </p>
                        </div>
                    @empty
                        {{-- not found --}}
                    @endforelse

                </div>
            </div>
        </section>
        <!-- End Property Grid Single-->
    </main>
@endsection
