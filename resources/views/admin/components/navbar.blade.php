<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <div class="d-flex justify-content-center">
                        <img alt="image" class="rounded-circle" src="{{asset((Auth::user()->profile_photo_path)? 'storage/users/'.Auth::user()->profile_photo_path : 'assets/admin/pp.png')}}" style="max-width: 48px;"/>
                    </div>
                </div>
                <div class="logo-element">
                    <img alt="image" class="rounded-circle" src="{{asset((Auth::user()->profile_photo_path)? 'storage/users/'.Auth::user()->profile_photo_path : 'assets/admin/pp.png')}}" style="max-width: 28px;"/>
                </div>
            </li>

            {{-- Navigations Starts --}}
        </ul>
    </div>
</nav>
