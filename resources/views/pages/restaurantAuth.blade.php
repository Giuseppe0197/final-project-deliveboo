@extends('layouts.main-layout')

@section('content')

<restaurant-component user_id = {{Auth::user() -> id}}></restaurant-component>

@endsection