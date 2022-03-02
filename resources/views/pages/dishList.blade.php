@extends('layouts.main-layout')
@section('content')

    {{-- Componente dishes (lista piatti) --}}
    <dishes-component :dishes = '{{ json_encode($dishes) }}' :restaurant_id = {{Auth::user() -> id}}> </dishes-component>

@endsection 