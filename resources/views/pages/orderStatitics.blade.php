@extends('layouts.main-layout')

@section('content')

    <order-component restaurant_id = {{Auth::user() -> id}} ></order-component>

@endsection