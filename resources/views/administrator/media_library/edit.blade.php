@extends('administrator.layouts.main')

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Media Library</h1>
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('admin.media_library') }}" class="text-muted text-hover-primary">Media Library</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-dark">Form</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                @if(!empty($media_library))
                <form class="form d-flex flex-column flex-lg-row" id="form" method="post" enctype="multipart/form-data" action="{{ route('admin.media_library.update', $media_library->id) }}">
                {{ method_field('PUT') }}
                @else
                <form class="form d-flex flex-column flex-lg-row" id="form" method="post" enctype="multipart/form-data" action="{{ route('admin.media_library.insert') }}">
                @endif
                {{ csrf_field() }}
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Media Library</h2>
                                </div>
                            </div>
                            {{-- <div class="fv-row py-4">
                                <label class="required form-label">Judul</label>
                                <input type="text" name="judul" class="form-control mb-2" placeholder="Masukan judul" value="{{ $media_library->judul }}"/>
                            </div> --}}
                            <div class="card-body pt-0">
                                <div class="fv-row">
                                    <label class="required form-label">Judul</label>
                                    <input type="text" name="judul" class="form-control mb-2" value="{{ $media_library->judul }}" />
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="fv-row">
                                    <label class="form-label">File</label>
                                    <input type="file" name="image" class="form-control mb-2" value="" />
                                </div>
                                @if($media_library->image != null)
                                    <div class="row col-md-6">
                                        @if($media_library->format == "jpg" || $media_library->format == "png" || $media_library->format == "jpeg")
                                            <img src="{{asset_administrator("assets/media/media_library/$media_library->image")}}" />
                                             @else
                                             <img src="{{asset_administrator("assets/media/media_library/$media_library->format.png")}}" />
                                        @endif
                                    </div>
                                @endif
                            
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.media_library') }}" class="btn btn-light me-5">Cancel</a>
                            <button type="submit" id="media_library_submit" class="btn btn-primary">
                                <span class="indicator-label">Save</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset_administrator('assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
    <script src="{{ asset_administrator('assets/js/custom/apps/ecommerce/catalog/save-media_library.js') }}"></script>
    <script src="{{ asset_administrator('assets/js/custom/documentation/documentation.js') }}"></script>
    <script src="{{ asset_administrator('assets/js/custom/documentation/search.js') }}"></script>
    <script src="{{ asset_administrator('assets/js/custom/documentation/forms/select2.js') }}"></script>
@endpush
