<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Ordini
                        <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        {{-- User's profile --}}
                        <a class="dropdown-item" href="{{ route('orders.index') }}">{{ __('Tutti') }}</a>
                        <a class="dropdown-item" href="{{ route('orders.index') }}">{{ __('Da confermare') }}</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('articles.index') }}">{{ __('Articoli') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('agents.index') }}">{{ __('Agenti') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('suppliers.index') }}">{{ __('Fornitori') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('test.sendmail') }}">{{ __('Invia email(test)') }}</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img src="/uploads/avatar/{{ Auth::user()->avatar }}" class="avatar">
                        {{ Auth::user()->name }} 
                        <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        {{-- User's profile --}}
                        <a class="dropdown-item" href="{{ route('profile.show') }}">{{ __('Profile') }}</a>
                        @role('Super Admin')
                        @include('partials.navbar.super-admin')
                        @endrole
                        @include('partials.navbar.logout-form')
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
