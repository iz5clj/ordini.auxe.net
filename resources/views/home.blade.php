@extends('layouts.main', [
    'viewMenu' => true,
    'viewCard' => true,
    'title' => 'Lavagna'
])

@section('content')
<p>You are logged in!</p>
@role('Super Admin')
<p>I am Super Admin.</p>
@else
<p>I am not Super Admin</p>
@endrole
@endsection
