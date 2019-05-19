@extends('layouts.main', [
    'viewMenu'  => true,
    'viewCard'  => true,
    'title'     => 'System Info'
])


@section('content')
<dl>
    @foreach( $infos as $info)
    <dt>{{ $info['title'] }}</dt>
    <dd>{{ $info['value'] }}</dd>
    @endforeach
</dl>
@endsection
