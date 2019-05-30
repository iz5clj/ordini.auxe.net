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
    <dd>
        @if($info['title'] === 'PHP Version')
        <a href="{{ route('phpinfo') }}">{{ $info['value'] }} phpinfo</a>
        @else
        {{ $info['value'] }}
        @endif
    </dd>
    @endforeach
</dl>
@endsection
