@extends('layouts.main-with-menu')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">System Info</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col">
                        <dl>
                            @foreach( $infos as $info)
                            <dt>{{ $info['title'] }}</dt>
                            <dd>{{ $info['value'] }}</dd>
                            @endforeach
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
