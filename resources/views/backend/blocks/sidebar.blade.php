<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <div class="d-flex">
                        <span>
                            @if(!empty(Auth::user()->image))
                                <img alt="image" style="width: 30px" class="img-circle" src="{{ Auth::user()->image }}" />
                            @else
                                <img alt="image" style="width: 30px" class="img-circle" src="{{ asset('upload/user-default.png') }}" />
                            @endif
                            <strong class="font-bold">{{ Auth::user()->name }}</strong>
                        </span>

                    </div>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs">
                             </span> <span class="text-muted text-xs block">Quản trị <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{{ route('admin.user.index') }}">Tài khoản</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ route('admin.logout') }}">Đăng xuất</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            {{-- <li @if(session()->get('active') == 'dashboard') class="active" @endif >
                <a href="{{ route('admin.dashboard') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard v.1</a></li>

                </ul>
            </li> --}}

            @if(Auth::user()->is_admin)
                <li @if(session()->get('active') == 'user') class="active" @endif>
                    <a href="{{ route('admin.user.index') }}"><i class="fa fa-user-circle"></i> <span class="nav-label">Thành viên</span></a>
                </li>
            @endif


            @if(Auth::user()->is_admin)
                <li @if(session()->get('active') == 'category') class="active" @endif>
                    <a href="{{ route('admin.category.index') }}"><i class="fa fa-bars"></i> <span class="nav-label">Danh mục</span></a>
                </li>
            @endif
            <li @if(session()->get('active') == 'blog') class="active" @endif>
                <a href="{{ route('admin.blog') }}"><i class="fa fa-book"></i> <span class="nav-label">Bài viết</span></a>
            </li>

            <li><a href="{{ route('admin.logout') }}">
                <i class="fa fa-sign-out"></i> <span class="nav-label">Đăng xuất</span>
            </a></li>
            

            
            

        </ul>

    </div>
</nav>
