@extends('layout.master')

@section('styles')
    <link rel="stylesheet" href="/css/character.css">
@endsection



@section('content')
    <div class="container">
        @foreach ($character as $character)
            <div class="info">
                <div class="flex" style="margin-bottom: 1rem;">
                    <h1>Character:</h1>
                    <img src="/img/types/{{ $character->character_type_image }}" alt=""
                        style="height: 3.2rem; width: 3.2rem; margin: auto 1rem; background:none;">
                    <h1>{{ $character->character_name }}</h1>
                </div>

                <div class="section">
                    <h2>Basic Attack</h2>
                    <div class="flex">
                        <img src="/img/character_abilities/{{ $character->basic_atk_img }}" alt="">
                        <h3>{{ $character->basic_atk_name }}</h3>
                    </div>
                    <p>{{ $character->basic_atk_description }}</p>
                </div>

                <div class="section">
                    <h2>Skill</h2>
                    <div class="flex">
                        <img src="/img/character_abilities/{{ $character->skill_img }}" alt="">
                        <h3>{{ $character->skill_name }}</h3>
                    </div>
                    <p>{{ $character->skill_description }}</p>
                </div>

                <div class="section">
                    <h2>Ultimate</h2>
                    <div class="flex">
                        <img src="/img/character_abilities/{{ $character->ultimate_img }}" alt="">
                        <h3>{{ $character->ultimate_name }}</h3>
                    </div>
                    <p>{{ $character->ultimate_description }}</p>
                </div>

                <div class="section">
                    <h2>Talent</h2>
                    <div class="flex">
                        <img src="/img/character_abilities/{{ $character->talent_img }}" alt="">
                        <h3>{{ $character->talent_name }}</h3>
                    </div>
                    <p>{{ $character->talent_description }}</p>
                </div>

                <div class="section">
                    <h2>Technique</h2>
                    <div class="flex">
                        <img src="/img/character_abilities/{{ $character->technique_img }}" alt="">
                        <h3>{{ $character->technique_name }}</h3>
                    </div>
                    <p>{{ $character->technique_description }}</p>
                </div>

            </div>

            <div class="video">
                <img src="/img/characters/{{ $character->character_image }}" alt="">

                @if (!$character->character_trailer == '')
                    <h1>Trailer Video</h1>
                    <iframe src="{{ $character->character_trailer }}" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                @endif
                @if (!$character->character_demo == '')
                    <h1>Demo Video</h1>
                    <iframe src="{{ $character->character_demo }}" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                @endif
            </div>
        @endforeach
    </div>
@endsection
