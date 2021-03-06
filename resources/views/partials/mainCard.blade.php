<main class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                @if (session('success'))
                <div id="session-message" class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                @if (session('warning'))
                <div id="session-message" class="alert alert-warning">
                    {{ session('warning') }}
                </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h2>
                        @section('card-header')
                        @show
                        </h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
