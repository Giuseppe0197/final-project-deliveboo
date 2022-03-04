@extends('layouts.main-layout')

@section('content')

    <menu-component 
        :restaurant = "{{ json_encode($restaurant)}}" 
        :categories_restaurant = "{{ json_encode($categories_restaurant)}}">
    </menu-component>

@endsection