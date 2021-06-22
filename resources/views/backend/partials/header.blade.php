<header class="c-header bg-transparent border-0 c-header-with-subheader">

    <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar"
            data-class="c-sidebar-show">
        <span class="c-header-toggler-icon"></span>
    </button>

    <button class="c-header-toggler c-class-toggler d-md-down-none" type="button" data-target="#sidebar"
            data-class="c-sidebar-lg-show" responsive="true">
        <span class="c-header-toggler-icon"></span>
    </button>

    <div class="text-right ml-auto p-3">
            <a class="logout-link p-3" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                <i class="fa fa-fw fa-sign-out mr-2"></i>{{ __('Logout') }}
            </a>
    </div>


    <form id="logout-form" action="{{ route('logout') }}" method="POST"
          style="display: none;">
        @csrf
    </form>
</header>
