@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>You are logged in!</p>
                    @role('Super Admin')
                    <p>I am Super Admin.</p>
                    @else
                    <p>I am not Super Admin</p>
                    @endrole
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
