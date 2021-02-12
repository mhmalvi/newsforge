@extends('errors::layout')

@section('title', __('Service Unavailable'))
@section('code', '503')

@push('css')
    <style>
        h4{
            color: #6C63FF;
            margin-bottom: 0px;
        }

        .image{
            max-width: 450px;
        }

        p{
            font-size: 18px!important;
        }
    </style>
@endpush

@section('message')
    <img class="image" src="{{asset('assets/images/under_construction.svg')}}" alt="maintenance mode">

    <h4>Sorry, We're down for maintenance</h4>
    <p>Be right back!</p>
@endsection
