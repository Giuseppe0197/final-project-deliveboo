@extends('layouts.main-layout')

@section('content')

    <menu-component :restaurant= "{{ json_encode($restaurant)}}" :dishes = "{{ json_encode($dishes) }}" :categories_restaurant = "{{ json_encode($categories_restaurant) }}"></menu-component>

@endsection