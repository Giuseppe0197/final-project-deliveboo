@extends('layouts.main-layout')

@section('content')

    <menu-component :restaurant= "{{ json_encode($restaurant)}}"></menu-component>

@endsection