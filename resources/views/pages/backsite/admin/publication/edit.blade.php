@extends('layouts.app')

{{-- set title --}}
@section('title', 'Edit - Publication')

@section('content')

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

    {{-- breadcumb --}}
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Edit Data Publication</h3>
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Publication</li>
                        <li class="breadcrumb-item">Data Publication</li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    {{-- forms --}}
    <div class="content-body">
        <!-- Basic form layout section start -->
        <section id="horizontal-form-layouts">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="horz-layout-basic">Form Input</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <div class="card-text">
                                    <p>Please complete the input <code>required</code>, before you click the submit
                                        button.</p>
                                </div>
                                <form class="form form-horizontal"
                                    action="{{ route('backsite.publication.update', [$publication->id]) }}" method="POST"
                                    enctype="multipart/form-data" id="editForm">

                                    @method('PUT')
                                    @csrf

                                    <div class="form-body">

                                        <h4 class="form-section"><i class="fa fa-edit"></i> Form Data Produk
                                        </h4>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="title">Title <code
                                                    style="color:red;">required</code></label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" id="title" name="title" class="form-control"
                                                    placeholder="example dentist or dermatology"
                                                    value="{{ old('title', isset($publication) ? $publication->title : '') }}"
                                                    autocomplete="off" required>

                                                @if ($errors->has('title'))
                                                    <p style="font-style: bold; color: red;">
                                                        {{ $errors->first('title') }}</p>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="author">Author <code
                                                    style="color:red;">required</code></label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" id="author" name="author" class="form-control"
                                                    placeholder="example dentist or dermatology"
                                                    value="{{ old('author', isset($publication) ? $publication->author : '') }}"
                                                    autocomplete="off" required>

                                                @if ($errors->has('author'))
                                                    <p style="font-style: bold; color: red;">
                                                        {{ $errors->first('author') }}</p>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="price">Price <code
                                                    style="color:red;">required</code></label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" id="price" name="price" class="form-control"
                                                    placeholder="Example: 100000"
                                                    value="{{ old('price', isset($publication) ? 'Rp ' . number_format($publication->price, 0, ',', '.') : '') }}"
                                                    autocomplete="off" required>

                                                @if ($errors->has('price'))
                                                    <p style="font-style: bold; color: red;">
                                                        {{ $errors->first('price') }}</p>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="stock">Stock <code
                                                    style="color:red;">required</code></label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" id="stock" name="stock" class="form-control"
                                                    placeholder="example dentist or dermatology"
                                                    value="{{ old('stock', isset($publication) ? $publication->stock : '') }}"
                                                    autocomplete="off" required>

                                                @if ($errors->has('stock'))
                                                    <p style="font-style: bold; color: red;">
                                                        {{ $errors->first('stock') }}</p>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="weight">Weight <code
                                                    style="color:red;">required</code></label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" id="weight" name="weight" class="form-control"
                                                    placeholder="example dentist or dermatology"
                                                    value="{{ old('weight', isset($publication) ? $publication->weight : '') }}"
                                                    autocomplete="off" required>

                                                @if ($errors->has('weight'))
                                                    <p style="font-style: bold; color: red;">
                                                        {{ $errors->first('weight') }}</p>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="cover_image">Cover Image
                                                <code style="color:green;">optional</code></label>
                                            <div class="col-md-9 mx-auto">
                                                <div class="custom-file">
                                                    <input type="file"
                                                        accept="image/png, image/svg, image/jpeg, image/jpg"
                                                        class="custom-file-input" id="cover_image" name="cover_image">
                                                    <label class="custom-file-label" for="cover_image"
                                                        aria-describedby="cover_image">Choose File</label>
                                                </div>

                                                <p class="text-muted"><small class="text-danger">Hanya dapat
                                                        mengunggah 1 file</small><small> dan yang dapat digunakan
                                                        JPEG, JPG, SVG, PNG & Maksimal ukuran file hanya 2
                                                        MegaBytes</small></p>

                                                @if ($errors->has('cover_image'))
                                                    <p style="font-style: bold; color: red;">
                                                        {{ $errors->first('cover_image') }}</p>
                                                @endif

                                            </div>

                                            <div class="form-actions text-right">
                                                <a href="{{ route('backsite.publication.index') }}" style="width:120px;"
                                                    class="btn bg-blue-grey text-white mr-1"
                                                    onclick="return confirm('Are you sure want to close this page? , Any changes you make will not be saved.')">
                                                    <i class="ft-x"></i> Cancel
                                                </a>
                                                <button type="submit" style="width:120px;" class="btn btn-cyan"
                                                    onclick="return confirm('Are you sure want to save this data ?')">
                                                    <i class="la la-check-square-o"></i> Submit
                                                </button>
                                            </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
