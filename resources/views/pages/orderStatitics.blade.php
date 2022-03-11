@extends('layouts.main-layout')

@section('content')

    <order-component restaurant_id = {{Auth::user() -> id}} :orders ="{{ json_encode($orders) }}" ></order-component>

@endsection