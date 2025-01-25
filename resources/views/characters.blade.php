@extends('layout.master')

@section('styles')
    <link rel="stylesheet" href="/css/characters.css">
@endsection

@section('content')
    <div class="main-container">
        <h1 style="color: darkgoldenrod">Five Star Characters</h1>
        <div class="container">
            @foreach ($five_star as $character)
                <div class="five_star">
                    <a href="/character/{{ $character->character_name }}">
                        <img src="/img/characters/{{ $character->character_image }}" alt="" loading="lazy">
                        <div class="info">
                            @if (!$character->character_type_image == '')
                                <img src="/img/types/{{ $character->character_type_image }}" alt="" loading="lazy">
                            @endif
                            <p>{{ $character->character_name }}</p>
                            @if (!$character->character_type_image == '')
                                <img src="/img/types/{{ $character->character_type_image }}" alt="" loading="lazy">
                            @endif
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <h1 style="color: rgb(179, 0, 179)">Four Star Characters</h1>
        <div class="container">
            @foreach ($four_star as $character)
                <div class="four_star">
                    <a href="/character/{{ $character->character_name }}">
                        <img src="/img/characters/{{ $character->character_image }}" alt="" loading="lazy">
                        <div class="info">
                            @if (!$character->character_type_image == '')
                                <img src="/img/types/{{ $character->character_type_image }}" alt="" loading="lazy">
                            @endif
                            <p>{{ $character->character_name }}</p>
                            @if (!$character->character_type_image == '')
                                <img src="/img/types/{{ $character->character_type_image }}" alt="" loading="lazy">
                            @endif
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
