@extends('layouts.main', [
    'viewMenu' => true,
    'viewCard' => true
])

@section('card-header')
Panello di controllo
@endsection

@section('content')
<p>You are logged in!</p>
@role('Super Admin')
<p>I am Super Admin.</p>
@else
<p>I am not Super Admin</p>
@endrole
@endsection
