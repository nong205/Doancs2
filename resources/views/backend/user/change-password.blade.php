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
                    <strong>{{config('apps.user.updateTitle') }}</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">



            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Thay đổi mật khẩu</h5>
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
                                <form role="form" method="post"
                                      action="">
{{--                                    @method('PUT')--}}
                                    @csrf

                                    <div class="form-group">
                                        <label>Mật khẩu mới</label>
                                        <input type="password" name="password"
                                               placeholder="Nhập mật khẩu" class="form-control"
                                               value="{{ old('password') }}"
                                        >
                                        @error('password')
                                        <div class="error-danger">* {{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Xác nhận mật khẩu mới</label>
                                        <input type="password" name="confirm-password"
                                               placeholder="Nhập xác nhận mật khẩu" class="form-control"
                                               value="{{ old('confirm-password') }}">
                                        @error('confirm-password')
                                        <div class="error-danger">* {{ $message }}</div>
                                        @enderror
                                    </div>



                                    <div>
                                        <button class="btn btn-primary" type="submit" name="change-password">
                                            <strong>Đổi mật khẩu</strong>
                                        </button>

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
    {{--    summernote    --}}
    <script src="{{ asset('assets/backend/js/bootstrap.min.js') }}"></script>
@endsection


