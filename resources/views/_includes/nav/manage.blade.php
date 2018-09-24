<div class="side-menu" id="admin-side-menu">
    <aside class="menu m-t-10 m-l-10">
        <p class="menu-label">
            General
        </p>
        <ul class="menu-list">
            <li><a href="{{route('manage.dashboard')}}" class="{{Nav::isRoute('manage.dashboard')}}">
                <i class="fa fa-home"></i>Dashboard</a></li>
        </ul>
        <p class="menu-label">
            Content
        </p>
        <ul class="menu-list">
            <li><a href="{{route('posts.index')}}" class="{{Nav::isRoute('posts.index')}}">
                <i class="fa fa-share-square"></i>Blog Posts</a></li>
        </ul>
        <p class="menu-label">
            Administration
        </p>
        <ul class="menu-list">
            <li>
                <a href="{{route('users.index')}}" class="{{Nav::isResource('users')}}">
                <i class="fa fa-user"></i>Manage Users</a></li>
            <li>
                <a class="has-submenu {{Nav::hasSegment(['roles','permissions'], 2)}}"><i class="fa fa-key"></i>Roles &amp; Permissions<i class="fa fa-chevron-down is-pulled-right m-t-4"></i></a>
                <ul class="submenu">
                    <li>
                        <a href="{{route('roles.index')}}" class="{{ Nav::isResource('roles') }}">Roles</a>
                    </li>
                    <li>
                        <a href="{{route('permissions.index')}}" class="{{ Nav::isResource('permissions') }}">Permissions</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-submenu">Example </a>
                <ul class="submenu">
                    <li><a href="{{route('roles.index')}}">Roles</a></li>
                    <li><a href="{{route('permissions.index')}}">Permissions</a></li>
                </ul>
            </li>
            <li>
                <a class="has-submenu">Example 2 </a>
                <ul class="submenu">
                    <li><a href="{{route('roles.index')}}">Roles</a></li>
                    <li><a href="{{route('permissions.index')}}">Permissions</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>