@extends('layouts.main', [
    'viewMenu'  => true,
    'viewCard'  => true
])

@section('card-header')
Informazioni sul Sistema
@endsection


@section('content')
<dl>
    @foreach( $infos as $info)
    <dt>{{ $info['title'] }}</dt>
    <dd>{{ $info['value'] }}</dd>
    @endforeach
</dl>
@endsection
