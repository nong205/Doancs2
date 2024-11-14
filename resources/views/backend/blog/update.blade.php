

@extends('layouts.panel')

@section('main')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>{{config('apps.blog.title') }}</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>

                <li class="active">
                    <strong>{{config('apps.blog.updateTitle') }}</strong>
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
                        <h5>{{config('apps.blog.updateTitle') }}</h5>
                        <div class="ibox-tools">
                            <a class="btn btn-danger" href="{{ route('admin.blog') }}">Dan sách bài viết</a>
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>


                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12 b-r">
                                @include('layouts.message')
                                <form role="form" method="post" action="" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title"
                                               class="form-control"
                                               value="{{ old('title', $blog->title) }}"
                                        >
                                        @error('title')
                                        <div class="error-danger">* {{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select name="category_id" class="form-control">
                                            <option value="">Chọn danh mục</option>
                                            @foreach($categories as $value)
                                                <option {{ ($value->id  == $blog->category_id) ? 'selected' : '' }} value="{{ $value->id }}" > {{ $value->name }} </option>
                                            @endforeach
                                        </select>


                                        @error('category_id')
                                        <div class="error-danger">* {{ $message }}</div>
                                        @enderror
                                    </div>
{{--                                    <div class="form-group">--}}
{{--                                        <label>Image</label>--}}
{{--                                        <input type="file" name="image_file"--}}
{{--                                               class="form-control"--}}
{{--                                        >--}}
{{--                                        @error('image_file')--}}
{{--                                        <div class="error-danger">* {{ $message }}</div>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
                                    <div class="form-group">

                                        <div id="image-container" style="position: relative;">
                                            <img src="{{ asset('upload/blog/' . $blog->image_file) }}" style="width: 400px" alt="" class="img-thumbnail" id="preview-image">
                                            <button type="button" id="change-image-btn" class="btn btn-soft-dark" style="display: block; width: 400px">
                                                Thay đổi ảnh
                                            </button>
                                            <input type="file" name="image_file" id="logo_path" class="form-control" style="display: none;" accept="image/*">
                                            @error('image_file')
                                            <div class="error-danger">* {{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


{{--                                    @if(isset($blog->image_file))--}}
{{--                                    <div class="form-group">--}}
{{--                                        <img src="{{ asset('upload/blog/' . $blog->image_file) }}" alt="" class="img-thumbnail" style="width: 400px">--}}
{{--                                    </div>--}}
{{--                                    @endif--}}

                                    <div class="form-group">
                                        <label>Đường dẫn (Link bài viết)</label>
                                        <input type="text" name="slug"
                                               placeholder="Slug"
                                               class="form-control"
                                               value="{{ old('slug', $blog->slug) }}"
                                        >
                                        @error('slug')
                                        <div class="error-danger">* {{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="ibox-title">
                                            <h5>Contents</h5>
                                        </div>
                                        <textarea style="height: 500px"
                                                  name="contents" class="tinymce"
                                        >{{ htmlspecialchars_decode(old('contents', $blog->content)) }}</textarea>
                                    </div>

                                    <div class="form-group tagsinput">
                                        @php
                                        $tags = '';
                                            foreach ($list_tags as $value) {
                                                $tags .= $value->name .',';
                                            }
                                         @endphp
                                        <label >Tags</label>
                                        <input type="text" name="tags" id="tags" placeholder="Nhập tags" class="form-control"
                                               value="{{ old('tags', $tags) }}">
                                        @error('tags')
                                        <div class="error-danger">* {{ $message }}</div>
                                        @enderror
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label>Meta description</label>
                                        <textarea style="height: 100px"  name="meta_description" class="form-control">{{ old('meta_description' , $blog->meta_description) }}</textarea>

                                        @error('meta_description')
                                        <div class="error-danger">* {{ $message }}</div>
                                        @enderror
                                    </div><div class="form-group">
                                        <label>Meta keywords</label>
                                        <input type="text" name="meta_keyword" placeholder="Nhập Meta keywords" class="form-control"
                                               value="{{ old('meta_keyword', $blog->meta_keyword) }}">
                                        @error('meta_keyword')
                                        <div class="error-danger">* {{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Publish *</label>
                                        <select name="is_publish" id="" class="form-control">
                                            <option value="1" {{ ($blog->is_publish == 1) ? 'selected' : '' }}>Yes</option>
                                            <option value="0" {{ ($blog->is_publish == 0) ? 'selected' : '' }}>No</option>
                                        </select>
                                        @error('is_publish')
                                        <div class="error-danger">* {{ $message }}</div>
                                        @enderror
                                    </div>

                                    @if(Auth::user()->is_admin)
                                    <div class="form-group">
                                        <label>Status *</label>
                                        <select name="status" id="" class="form-control">
                                            <option value="1" {{ ($blog->status == 1) ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ ($blog->status == 0) ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('status')
                                        <div class="error-danger">* {{ $message }}</div>
                                        @enderror
                                    </div>

                                    @else
                                        <div class="form-group" style="display: none">
                                            <label>Status *</label>
                                            <select name="status" id="" class="form-control">
                                                <option value="1" {{ ($blog->status == 1) ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ ($blog->status == 0) ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                            @error('status')
                                            <div class="error-danger">* {{ $message }}</div>
                                            @enderror
                                        </div>
                                    @endif

                                    <div>
{{--                                        <button class="btn btn-primary" type="submit" >--}}
{{--                                            Cập nhật bài viết--}}
{{--                                        </button>--}}
                                        <input type="submit" class="btn btn-primary" value="Cập nhật bài viết">
                                        <a class="btn btn-danger" href="{{ route('admin.blog') }}">Danh sách bài viết</a>

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


    <!-- Tagsinput -->
    <link href="{{ asset('assets/backend/tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet">

    <style>

        .tagsinput .label {
            display: inline-block;
            font-size: 15px;
            height: 25px;
        }
    </style>


    {{-- 
        API Key tinymce
        VD: ub9wru4c8z57hio4z5170jv0k4zik8cf4e6moqfnhktv4umz
        
    --}}
    <script src="https://cdn.tiny.cloud/1/ub9wru4c8z57hio4z5170jv0k4zik8cf4e6moqfnhktv4umz/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: '.tinymce',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough forecolor backcolor | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
            ],

            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
        });
    </script>


@endsection

@section('page-scripts')
    <!-- Tagsinput -->

    <script src="{{ asset('assets/backend/tagsinput/bootstrap-tagsinput.js') }}"></script>

    <script>
        $("#tags").tagsinput();
    </script>

    // Chặn enter input tags
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Lấy tất cả các trường nhập liệu trong biểu mẫu
            var formFields = document.querySelectorAll('input');

            // Lặp qua từng trường nhập liệu
            formFields.forEach(function(field) {
                // Lắng nghe sự kiện keydown trên mỗi trường nhập liệu
                field.addEventListener('keydown', function(event) {
                    // Nếu mã phím là 13 (mã cho phím Enter)
                    if (event.keyCode === 13) {
                        // Ngăn chặn hành động mặc định của nút Enter
                        event.preventDefault();
                        return false;
                    }
                });
            });

            // Lắng nghe sự kiện submit trên biểu mẫu
            document.querySelector('form').addEventListener('submit', function(event) {
                // Ngăn chặn hành động submit mặc định của biểu mẫu
                event.preventDefault();
                return false;
            });
        });
    </script>


    <script>
        // Lắng nghe sự kiện click vào container chứa ảnh và nút thay đổi
        document.getElementById('image-container').addEventListener('click', function() {
            // Kích hoạt sự kiện click cho input file
            document.getElementById('logo_path').click();
        });

        // Lắng nghe sự kiện khi có sự thay đổi trong input file
        document.getElementById('logo_path').addEventListener('change', function() {
            // Kiểm tra xem người dùng đã chọn file chưa
            if (this.files && this.files[0]) {
                var file = this.files[0];
                var fileType = file.type;

                // Kiểm tra xem tệp được chọn có phải là hình ảnh không
                if (!fileType.startsWith('image/')) {
                    alert('Vui lòng chọn một tệp hình ảnh.');
                    return;
                }

                var reader = new FileReader();

                // Đọc và hiển thị ảnh mới
                reader.onload = function(e) {
                    document.getElementById('preview-image').setAttribute('src', e.target.result);
                }

                reader.readAsDataURL(file);
            }
        });
    </script>

@endsection


