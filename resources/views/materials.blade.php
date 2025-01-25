@extends('layout.master')

@section('styles')
    <link rel="stylesheet" href="/css/materials.css">
@endsection

@section('content')
    <div class="big-container">
        @foreach ($materials as $material)
            <h1>{{ $material->material_type_name }}</h1>

            <div class="container">
                @if ($material->material_type_id == 1)
                    @foreach ($material_type_1 as $key => $material)

                        @if ($material->material_rarity == 2)
                            <div class="material green-bg">
                        @else
                            @if ($material->material_rarity == 3)
                                <div class="material blue-bg">
                            @else
                                @if ($material->material_rarity == 4)
                                    <div class="material purple-bg">
                                @else
                                    <div class="material gold-bg">
                                @endif
                            @endif
                        @endif

                            <img src="/img/materials/{{$material->material_image}}" onclick="displayDescriptionType1({{ $key }})" loading="lazy">
                            <div class="description type-1">
                                <h3>{{$material->material_name}}</h3>
                                <p>{{$material->material_description}}</p>
                            </div>
                        </div>

                    @endforeach
                @else
                    @if ($material->material_type_id == 2)
                        @foreach ($material_type_2 as $key => $material)
                            @if ($material->material_rarity == 2)
                                <div class="material green-bg">
                            @else
                                @if ($material->material_rarity == 3)
                                    <div class="material blue-bg">
                                @else
                                    @if ($material->material_rarity == 4)
                                        <div class="material purple-bg">
                                    @else
                                        <div class="material gold-bg">
                                    @endif
                                @endif
                            @endif

                            <img src="/img/materials/{{$material->material_image}}" onclick="displayDescriptionType2({{ $key }})" loading="lazy">
                            <div class="description type-2">
                                <h3>{{$material->material_name}}</h3>
                                <p>{{$material->material_description}}</p>
                            </div>
                        </div>

                        @endforeach
                    @else
                        @if ($material->material_type_id == 3)
                            @foreach ($material_type_3 as $key => $material)
                                @if ($material->material_rarity == 2)
                                    <div class="material green-bg">
                                @else
                                    @if ($material->material_rarity == 3)
                                        <div class="material blue-bg">
                                    @else
                                        @if ($material->material_rarity == 4)
                                            <div class="material purple-bg">
                                        @else
                                            <div class="material gold-bg">
                                        @endif
                                    @endif
                                @endif
                                    <img src="/img/materials/{{$material->material_image}}" onclick="displayDescriptionType3({{ $key }})" loading="lazy">
                                    <div class="description type-3">
                                        <h3>{{$material->material_name}}</h3>
                                        <p>{{$material->material_description}}</p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            @foreach ($material_type_4 as $key => $material)
                                @if ($material->material_rarity == 2)
                                    <div class="material green-bg">
                                @else
                                    @if ($material->material_rarity == 3)
                                        <div class="material blue-bg">
                                    @else
                                        @if ($material->material_rarity == 4)
                                            <div class="material purple-bg">
                                        @else
                                            <div class="material gold-bg">
                                        @endif
                                    @endif
                                @endif
                                    <img src="/img/materials/{{$material->material_image}}" onclick="displayDescriptionType4({{ $key }})" loading="lazy">
                                    <div class="description type-4">
                                        <h3>{{$material->material_name}}</h3>
                                        <p>{{$material->material_description}}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endif
                @endif
            </div>
        @endforeach
    </div>
@endsection


<script>
    function displayDescriptionType1(index) {
        const descriptions = document.getElementsByClassName("type-1");

        descriptions[index].classList.toggle("show");
    }

    function displayDescriptionType2(index) {
        const descriptions = document.getElementsByClassName("type-2");

        descriptions[index].classList.toggle("show");
    }

    function displayDescriptionType3(index) {
        const descriptions = document.getElementsByClassName("type-3");

        descriptions[index].classList.toggle("show");
    }

    function displayDescriptionType4(index) {
        const descriptions = document.getElementsByClassName("type-4");

        descriptions[index].classList.toggle("show");
    }
</script>
