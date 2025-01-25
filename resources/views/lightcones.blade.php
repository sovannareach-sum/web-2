@extends('layout.master')

@section('styles')
    <link rel="stylesheet" href="/css/lightcones.css">
@endsection

@section('content')
    <div class="big-container">
        <h1>Five Star Lightcones</h1>
        <div class="container">
            @foreach ($lightcones_5_star as $lightcone)
                <div class="lightcone shadow-gold">
                    <a href="/lightcone/{{ $lightcone->lightcone_name }}">
                        <div class="card">
                            <img src="/img/lightcones/{{ $lightcone->lightcone_image }}" alt="" loading="lazy">
                            <div class="info">
                                <div class="type">
                                    <img src="/img/path/{{ $lightcone->lightcone_path_image }}" alt=""
                                        loading="lazy">
                                    <p>{{ $lightcone->lightcone_path_name }}</p>
                                </div>
                                <h3>{{ $lightcone->lightcone_name }}</h3>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <h1>Four Star Lightcones</h1>
        <div class="container">
            @foreach ($lightcones_4_star as $lightcone)
                <div class="lightcone shadow-purple">
                    <a href="/lightcone/{{ $lightcone->lightcone_name }}">
                        <div class="card">
                            <img src="/img/lightcones/{{ $lightcone->lightcone_image }}" alt="" loading="lazy">
                            <div class="info">
                                <div class="type">
                                    <img src="/img/path/{{ $lightcone->lightcone_path_image }}" alt=""
                                        loading="lazy">
                                    <p>{{ $lightcone->lightcone_path_name }}</p>
                                </div>
                                <h3>{{ $lightcone->lightcone_name }}</h3>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <h1>Three Star Lightcones</h1>
        <div class="container">
            @foreach ($lightcones_3_star as $lightcone)
                <div class="lightcone shadow-lightblue">
                    <a href="/lightcone/{{ $lightcone->lightcone_name }}">
                        <div class="card">
                            <img src="/img/lightcones/{{ $lightcone->lightcone_image }}" alt="" loading="lazy">
                            <div class="info">
                                <div class="type">
                                    <img src="/img/path/{{ $lightcone->lightcone_path_image }}" alt=""
                                        loading="lazy">
                                    <p>{{ $lightcone->lightcone_path_name }}</p>
                                </div>
                                <h3>{{ $lightcone->lightcone_name }}</h3>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
