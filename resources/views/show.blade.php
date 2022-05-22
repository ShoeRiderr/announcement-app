@extends('layouts.app')

@section('title', 'Customer panel - Show')

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ url('/css/slider.css') }}" />
@endpush

@section('content')
    <div class="slider-wrapper">
        <div class="slider">
            @foreach ($announcement->images as $key => $image)
            <input type="radio" name="slider" class="trigger" id="{{ $key }}" checked="checked" />
            <div class="slide">
                    <figure class="slide-figure">
                        <img class="slide-img" src="{{ asset('storage/' . $image->name) }}"> />
                    </figure>
                </div>
            @endforeach
        </div>
        <ul class="slider-nav">
            @foreach ($announcement->images as $key => $image)
                <li class="slider-nav__item">
                    <label class="slider-nav__label" for="{{ $key }}">{{ $key + 1 }}</label>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="mt-5">
        <h3>{{ $announcement->title }}</h3>
        <p class="text-right">{{ $announcement->price }} PLN</p>
        <hr>
        <p>{{ $announcement->description }}</p>
    </div>
@endsection

