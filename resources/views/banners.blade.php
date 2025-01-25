@extends('layout.master')

@section('styles')
    <link rel="stylesheet" href="/css/banners.css">
@endsection


@section('content')
    <div class="container">

        <h1 style="padding: 1rem 0; font-size: 2.4rem;">Character Banners</h1>

        <div class="content">
            @foreach ($character_banners as $key => $banner)
                <div class="banner">
                    <h1>Version: {{ number_format($banner->banner_version, 1, '.', '') }}</h1>
                    <img src="/img/banners/{{ $banner->banner_image }}" alt=""
                        onclick="displayFeaturedCharacters({{ $key }})" id="image">
                    <div class="featured">
                        <div class="featured-character">
                            <div class="background-5star">
                                <img src="/img/characters/{{ $banner->character_image }}" alt="">
                            </div>
                            <h4>{{ $banner->character_name }}</h4>
                        </div>
                        @foreach ($four_star_characters as $character)
                            @if ($character->banner_name == $banner->banner_name)
                                <div class="featured-character">
                                    <div class="background-4star">
                                        <img src="/img/characters/{{ $character->character_image }}" alt="">
                                    </div>
                                    <h4>{{ $character->character_name }}</h4>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <h1 style="padding: 1rem 0; font-size: 2.4rem;">Lightcone Banners</h1>

        <div class="content">
            @foreach ($lightcone_banners as $key => $banner)
                <div class="banner">
                    <h1>Version: {{ number_format($banner->banner_version, 1, '.', '') }}</h1>
                    <img src="/img/banners/{{ $banner->banner_image }}" alt=""
                        onclick="displayFeaturedLightcones({{ $key }})" id="image">
                    <div class="lightcone">
                        <div class="featured-lightcone">
                            <div class="background-5star">
                                <img src="/img/lightcones/{{ $banner->lightcone_image }}" alt="">
                            </div>
                        </div>
                        @foreach ($four_star_lightcones as $lightcone)
                            @if ($lightcone->banner_name == $banner->banner_name)
                                <div class="featured-character">
                                    <div class="background-4star">
                                        <img src="/img/lightcones/{{ $lightcone->lightcone_image }}" alt="">
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection


<script>
    function displayFeaturedCharacters(index) {
        const banners = document.getElementsByClassName("featured");

        banners[index].classList.toggle("show");
    }

    function displayFeaturedLightcones(index) {
        const banners = document.getElementsByClassName("lightcone");

        banners[index].classList.toggle("show");
    }
</script>
