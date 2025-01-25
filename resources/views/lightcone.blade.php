@extends('layout.master')

@section('styles')
    <link rel="stylesheet" href="/css/lightcone.css">
@endsection

@section('content')
    <div class="container">
        <div class="background">
            @foreach ($lightcone as $lightcone)
                <div class="description">
                    <h1>{{ $lightcone->lightcone_name }}</h1>
                    <div class="center">
                        <img src="/img/lightcones/{{ $lightcone->lightcone_image }}" alt="" loading="lazy">
                    </div>
                    <h2>Type</h2>
                    <div class="type">
                        <img src="/img/path/{{ $lightcone->lightcone_path_image }}" alt="" loading="lazy">
                        <h3>{{ $lightcone->lightcone_path_name }}</h3>
                    </div>
                </div>
                <div class="passive">
                    <h1>{{ $lightcone->lightcone_passive_name }}</h1>
                    <p>{{ $lightcone->lightcone_passive }}</p>
                </div>
                <div class="stats">
                    <h1>Stats</h1>
                    <div class="stat">
                        <h3>HP: {{$lightcone->lightcone_base_hp}} ~ {{$lightcone->lightcone_max_hp}}</h3>
                        <h3>ATK: {{$lightcone->lightcone_base_atk}} ~ {{$lightcone->lightcone_max_atk}}</h3>
                        <h3>DEF: {{$lightcone->lightcone_base_def}} ~ {{$lightcone->lightcone_max_def}}</h3>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
