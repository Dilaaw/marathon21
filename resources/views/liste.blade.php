@extends('layouts.app')

@section('content')
    Liste des séries :
    <br>
    @if(!empty($series))
        @foreach($series as $serie)

@endsection

