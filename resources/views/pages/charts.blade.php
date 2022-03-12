<!-- resources/views/chart -->
@extends('layouts.main-layout')

@section('content')

@auth
    <charts-component
        :labels="{{ json_encode($orders) }}"
        :data-prop="{{ json_encode($orders) }}"
        {{-- :orders ="{{ json_encode($orders) }}" --}}>
    </charts-component>
    @endsection
@endauth
