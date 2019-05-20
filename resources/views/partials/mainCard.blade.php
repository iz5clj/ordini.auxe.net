<main class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
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
