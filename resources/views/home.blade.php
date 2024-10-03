@extends('layouts.app')
@section('titulo')
    Pagina Principal
@endsection
@section('contenido')
    <x-list-post :posts="$posts" />
@endsection
