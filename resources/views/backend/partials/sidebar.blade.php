<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show bg-white side-bar-shadow" id="sidebar">
    <ul class="c-sidebar-nav h-100 ps ps--active-y" style="position: relative;">
        <div class="left-menu-logo">
            <img class="ml-3" src="{{ asset('/icons/logo/logo.png') }}" alt="..." width="150" height="150">
        </div>
        <ul class="c-sidebar-nav-item">
            <li class="c-sidebar-nav-link text-center"><a href="{{ route('backend.dashboard') }}">Dashboard</a></li>
            <li class="c-sidebar-nav-link text-center"><a href="{{ route('backend.article.index') }}">Article</a></li>
        </ul>
{{--        {!! $menu !!}--}}
    </ul>
</div>
