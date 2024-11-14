@extends('layouts.panel')

@section('main')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>{{config('apps.user.title') }}</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>

                <li class="active">
                    <strong>{{config('apps.user.createTitle') }}</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>{{config('apps.user.createTitle') }}</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>

                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12 b-r">
                                @include('layouts.message')
                                <form role="form" method="post" action="">
                                    @csrf
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name"
                                               placeholder="Name"
                                               class="form-control"
                                               value="{{ old('name') }}"
                                        >
                                        @error('name')
                                        <div class="error-danger">* {{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Đường dẫn(Link danh mục)</label>
                                        <input type="text" name="slug"
                                               placeholder="Slug"
                                               class="form-control"
                                               value="{{ old('slug') }}"
                                        >
                                        @error('slug')
                                        <div class="error-danger">* {{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" placeholder="Nhập Meta title" class="form-control"
                                               value="{{ old('title') }}">
                                        @error('title')
                                        <div class="error-danger">* {{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Meta title</label>
                                        <input type="text" name="meta_title" placeholder="Nhập Meta title" class="form-control"
                                               value="{{ old('meta_title') }}">
                                        @error('meta_title')
                                        <div class="error-danger">* {{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Meta description</label>
                                        <input type="text" name="meta_description" placeholder="Nhập Description title" class="form-control"
                                               value="{{ old('meta_description') }}">
                                        @error('meta_description')
                                        <div class="error-danger">* {{ $message }}</div>
                                        @enderror
                                    </div><div class="form-group">
                                        <label>Meta keywords</label>
                                        <input type="text" name="meta_keyword" placeholder="Nhập Meta keywords" class="form-control"
                                               value="{{ old('meta_keyword') }}">
                                        @error('meta_keyword')
                                        <div class="error-danger">* {{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" id="" class="form-control">
                                            <option value="1" selected>Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        @error('status')
                                        <div class="error-danger">* {{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div>
                                        <button class="btn btn-primary" type="submit"><strong>Thêm danh mục</strong></button>
                                        <a class="btn btn-danger" href="{{ route('admin.category.index') }}">Danh sách danh mục</a>

                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>



        </div>

    </div>




@endsection

@section('page-css')
    <link href="{{ asset('assets/backend/css/customize.css') }}" rel="stylesheet">




@endsection

@section('page-scripts')

@endsection

