@extends('layouts.main-layout')

@section('content')

<restaurant-component restaurant_id = {{Auth::user() -> id}}></restaurant-component>

@endsection