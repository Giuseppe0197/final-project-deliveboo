<!-- resources/views/chart -->
@extends('layouts.main-layout')

@section('content')
<charts-component
    :labels="{{ json_encode($orders) }}"
    :data-prop="{{ json_encode($orders) }}"
    {{-- :orders ="{{ json_encode($orders) }}" --}}>
</charts-component>
@endsection
