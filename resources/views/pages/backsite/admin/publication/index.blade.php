@extends('layouts.app')

@section('title', 'Publication')

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
            <h3 class="content-header-title mb-0 d-inline-block">Publication</h3>
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Publication</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    {{-- add card --}}

    <div class="content-body">
        <section id="add-home">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header bg-info text-white">
                            <a data-action="collapse">
                                <h4 class="card-title text-white">Add Data</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-plus"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    </ul>
                                </div>
                            </a>
                        </div>

                        <div class="card-content collapse hide">
                            <div class="card-body card-dashboard">

                                <form class="form form-horizontal" action="" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <div class="form-section">
                                            <p>Please complete the input <code>required</code>, before you click the
                                                submit button.</p>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="title">Title <code
                                                    style="color:red;">required</code></label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" id="title" name="title" class="form-control"
                                                    placeholder="Example: SIstem Digital" value="{{ old('title') }}"
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
                                                    placeholder="Example: Faizal Arya Samman" value="{{ old('author') }}"
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
                                                    placeholder="Example: Rp 100.000" value="{{ old('price') }}"
                                                    autocomplete="off" required>
                                                @if ($errors->has('price'))
                                                    <p style="font-style: bold; color: red;">
                                                        {{ $errors->first('price') }}</p>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="stock">Stock (pcs)<code
                                                    style="color:red;">required</code></label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" id="stock" name="stock" class="form-control"
                                                    placeholder="Example: 1" value="{{ old('stock') }}" autocomplete="off"
                                                    required>
                                                @if ($errors->has('stock'))
                                                    <p style="font-style: bold; color: red;">
                                                        {{ $errors->first('stock') }}</p>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="weight">Weight (kg) <code
                                                    style="color:red;">required</code></label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" id="weight" name="weight" class="form-control"
                                                    placeholder="Example: 1" value="{{ old('weight') }}"
                                                    autocomplete="off" required>
                                                @if ($errors->has('weight'))
                                                    <p style="font-style: bold; color: red;">
                                                        {{ $errors->first('weight') }}</p>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="cover_image">Cover Image
                                                <code style="color:red;">required</code></label>
                                            <div class="col-md-9 mx-auto">
                                                <div class="custom-file">
                                                    <input type="file"
                                                        accept="image/png, image/svg, image/jpeg, image/jpg"
                                                        class="custom-file-input" id="cover_image" name="cover_image"
                                                        required>
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
                                        </div>

                                    </div>
                                    <div class="form-actions text-right">
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

    {{-- table card --}}

    <div class="content-body">
        <section id="table-home">
            <!-- Zero configuration table -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                                </ul>
                            </div>
                        </div>

                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">

                                <div class="table-responsive">
                                    <table class="table text-inputs-searching default-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Author</th>
                                                <th>Price</th>
                                                <th>Stock (pcs)</th>
                                                <th>Weight (kg)</th>
                                                <th>Cover Image</th>
                                                <th style="text-align:center; width:150px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $nomor = 1;
                                            @endphp
                                            @forelse($publications as $key => $publication)
                                                <tr data-entry-id="{{ $publication->id }}">

                                                    <td class="">{{ $nomor++ }}</td>

                                                    <td class="">
                                                        {{ ucfirst($publication->title) }}
                                                    </td>

                                                    <td class="">
                                                        {{ ucfirst($publication->author) }}
                                                    </td>

                                                    <td class="">
                                                        Rp {{ number_format($publication->price, 0, ',', '.') }}
                                                    </td>

                                                    <td class="">
                                                        {{ $publication->stock }}
                                                    </td>

                                                    <td class="">
                                                        {{ $publication->weight }}
                                                    </td>

                                                    <td class="text-center">
                                                        <a data-fancybox="gallery"
                                                            data-src="{{ request()->getSchemeAndHttpHost() . '/storage' . '/' . $publication->cover_image }}"
                                                            class="blue accent-4">Show
                                                        </a>
                                                    </td>

                                                    <td class="text-center">

                                                        <div class="btn-group mr-1 mb-1">
                                                            <button type="button"
                                                                class="btn btn-warning btn-sm dropdown-toggle"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">Action</button>
                                                            <div class="dropdown-menu">

                                                                {{-- <a href="#mymodal"
                                                                    data-remote="{{ route('backsite.data-produk.show', $produk->id) }}"
                                                                    data-toggle="modal" data-target="#mymodal"
                                                                    data-title="Data Produk Detail"
                                                                    class="dropdown-item">
                                                                    Show
                                                                </a> --}}

                                                                <a class="dropdown-item"
                                                                    href="{{ route('admin.publication.edit', $publication->id) }}">
                                                                    Edit
                                                                </a>

                                                                <form
                                                                    action="{{ route('admin.publication.destroy', $publication->id) }}"
                                                                    method="POST"
                                                                    onsubmit="return confirm('Are you sure want to delete this data ?');">
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <input type="hidden" name="_token"
                                                                        value="{{ csrf_token() }}">
                                                                    <input type="submit" class="dropdown-item"
                                                                        value="Delete">
                                                                </form>


                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                {{-- not found --}}
                                            @endforelse
                                        </tbody>
                                        <tfoot style="display: none">
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Author</th>
                                                <th>Price</th>
                                                <th>Stock (pcs)</th>
                                                <th>Weight (kg)</th>
                                                <th>Cover Image</th>
                                                <th style="text-align:center; width:150px;">Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@push('after-style')
    <link rel="stylesheet" href="{{ url('https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css') }}">

    <style>
        .label {
            cursor: pointer;
        }

        .img-container img {
            max-width: 100%;
        }
    </style>
@endpush

@push('after-script')
    {{-- inputmask --}}
    <script src="{{ asset('/assets/backsite/third-party/inputmask/dist/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('/assets/backsite/third-party/inputmask/dist/inputmask.js') }}"></script>
    <script src="{{ asset('/assets/backsite/third-party/inputmask/dist/bindings/inputmask.binding.js') }}"></script>

    <script src="{{ url('https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js') }}" type="text/javascript">
    </script>

    <script>
        jQuery(document).ready(function($) {
            $('#mymodal').on('show.bs.modal', function(e) {
                var button = $(e.relatedTarget);
                var modal = $(this);
                modal.find('.modal-body').load(button.data("remote"));
                modal.find('.modal-title').html(button.data("title"));
            });
            $('.select-all').click(function() {
                let $select2 = $(this).parent().siblings('.select2-full-bg')
                $select2.find('option').prop('selected', 'selected')
                $select2.trigger('change')
            })
            $('.deselect-all').click(function() {
                let $select2 = $(this).parent().siblings('.select2-full-bg')
                $select2.find('option').prop('selected', '')
                $select2.trigger('change')
            })
            $('#price').on('input', function() {
                let inputVal = $(this).val();

                // Menghapus karakter selain digit
                let numericVal = inputVal.replace(/\D/g, '');

                // Mengubah string menjadi angka integer
                let amount = parseInt(numericVal);

                if (!isNaN(amount)) {
                    // Mengformat angka dengan tanda pemisah ribuan dan "Rp"
                    let formattedVal = "Rp " + amount.toLocaleString('id-ID');
                    $(this).val(formattedVal);
                } else {
                    // Menampilkan input kosong jika angka tidak valid
                    $(this).val('');
                }
            })
        });
        $('.default-table').DataTable({
            "order": [],
            "paging": true,
            "lengthMenu": [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, "All"]
            ],
            "pageLength": 10
        });
        $(function() {
            $(":input").inputmask();
        });
        // fancybox
        Fancybox.bind('[data-fancybox="gallery"]', {
            infinite: true
        });
    </script>

    <div class="modal fade" id="mymodal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button class="btn close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <i class="fa fa-spinner fa spin"></i>
                </div>
            </div>
        </div>
    </div>
@endpush
