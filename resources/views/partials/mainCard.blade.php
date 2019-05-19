<main class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    @isset($title)
                    <div class="card-header">
                        <h2>
                            {{ $title }}
                            @isset($titleSide)
                            <a class="ml-1 btn btn-outline-primary" href="#">{{ $titleSide }}</a>
                            @endif
                        </h2>
                    </div>
                    @endif
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
