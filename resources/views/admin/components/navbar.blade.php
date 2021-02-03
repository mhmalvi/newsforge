<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <div class="d-flex justify-content-center">
                        <img alt="image" class="rounded-circle" src="{{asset((Auth::user()->photo)? 'storage/users/'.Auth::user()->photo : 'assets/admin/pp.png')}}" style="max-width: 48px;"/>
                    </div>
                </div>
                <div class="logo-element">
                    <img alt="image" class="rounded-circle" src="{{asset((Auth::user()->photo)? 'storage/users/'.Auth::user()->photo : 'assets/admin/pp.png')}}" style="max-width: 28px;"/>
                </div>
            </li>

            {{-- Navigations Starts --}}
            <li>
                <a href="{{route('landing')}}"><i class="fa fa-globe"></i>
                    <span class="nav-label">Website</span>
                </a>
            </li>
            <li class="{{(Route::currentRouteName() === 'admin.dashboard') ? 'active' : ""}}">
                <a href="{{route('admin.dashboard')}}"><i class="fa fa-th-large"></i>
                    <span class="nav-label">Dashboards</span>
                </a>
            </li>
            <li class="{{(Route::currentRouteName() === 'admin.category') ? 'active' : ""}}">
                <a href="{{route('admin.category')}}"><i class="fa fa-diamond"></i>
                    <span class="nav-label">Category</span>
                </a>
            </li>
            <li class="{{(request()->segment(2) === 'news') ? 'active' : ''}}">
                <a href="{{route('admin.news.index')}}"><i class="fa fa-newspaper-o" aria-hidden="true"></i> <span class="nav-label">News</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="{{(Route::currentRouteName() === 'admin.news.index') ? 'active' : ''}}">
                        <a href="{{route('admin.news.index')}}">All News</a>
                    </li>
                    <li class="{{(Route::currentRouteName() === 'admin.news.create') ? 'active' : ''}}">
                        <a href="{{route('admin.news.create')}}">Add New</a>
                    </li>
                </ul>
            </li>
            <li class="{{(request()->segment(2) === 'settings') ? 'active' : ''}}">
                <a href="javascript:void(0)"><i class="fa fa-cog" aria-hidden="true"></i> <span class="nav-label">Settings</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="{{(Route::currentRouteName() === 'admin.profile') ? 'active' : ''}}">
                        <a href="{{route('admin.profile')}}">Profile</a>
                    </li>
                    <li class="{{(Route::currentRouteName() === 'admin.website') ? 'active' : ''}}">
                        <a href="{{route('admin.website')}}">Website</a>
                    </li>
                    <li class="{{(Route::currentRouteName() === 'admin.admin') ? 'active' : ''}}">
                        <a href="{{route('admin.admin')}}">Admin</a>
                    </li>
                    <li class="{{(Route::currentRouteName() === 'admin.seo') ? 'active' : ''}}">
                        <a href="{{route('admin.seo')}}">SEO</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
