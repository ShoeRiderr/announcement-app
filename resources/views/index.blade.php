@extends('layouts.app')

@section('title', 'Customer panel - List')

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ url('/css/imege-grid.css') }}" />
@endpush

@section('content')
    <div class="image-container mt-5">
        @if ($announcements->isEmpty())
            There is no announcements yet.
        @endif
        @foreach ($announcements as $announcement)
            <div class="col">
                <a href="{{ route('announcements.show', [
                    'announcement' => $announcement->id,
                ]) }}">
                    <div class="card">
                        <div class="image-box">
                            <img class="card-img-top" src="{{ asset('storage/' . $announcement->images->first()->name) }}">
                        </div>
                        
                        <div class="card-body">
                            <p class="card-text">
                                <h4 class="text-center">{{ $announcement->title }}</h4>
                                <p class="text-right">{{ $announcement->price }} PLN</p>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection

