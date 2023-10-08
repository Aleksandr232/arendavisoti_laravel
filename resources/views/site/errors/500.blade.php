@extends('layouts.site')

@section('title', '500 Internal server error')

@section('header')
    <div class="my-container">
        <div class="breadcrumbs">
            <a href="{{ url('/') }}">Home</a>
            <i class="fas fa-chevron-right"></i>
            <p>500 Internal server error</p>
        </div>
        <div class="error-page">
            <img src="{{ asset('site/img/errors/500.svg') }}" width="100%" height="300" alt="">
            <div class="error-content">
                <h3>Internal server error</h3>
                <p>Please try to visit the site later</p>
            </div>
        </div>
    </div>
@endsection
