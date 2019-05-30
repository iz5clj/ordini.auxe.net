@extends('layouts.main', [
    'viewMenu'  => true,
    'viewCard'  => true
])

@section('card-header')
PHP Info
@endsection


@section('content')
{{ phpinfo() }}
@endsection
