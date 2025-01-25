@extends('layout.master')

@section('styles')
    <link rel="stylesheet" href="/css/relics.css">
@endsection

@section('content')
    <div class="big-container">
        <h1>Cavern Relics</h1>
        <div class="container">
            @foreach ($relic_set as $key => $set)    
                <div class="relic" onclick="displayInfoRelic({{$key}})">
                    <div class="displayRelic">
                        <img src="/img/relics_set/{{$set->relic_set_image}}" alt="">
                        <h3>{{$set->relic_set_name}}</h3>
                    </div>
                    <div class="infoRelic">
                        <div class="info-content">
                            @foreach ($relic_pieces as $piece)
                                @if ($piece->relic_set_name == $set->relic_set_name)
                                <div class="pieces">
                                    <h4>{{$piece->relic_piece_type_name}}</h4>
                                    <img src="/img/relics_piece/{{$piece->relic_piece_image}}" alt="">
                                </div>
                                @endif
                            @endforeach    
                        </div>
                        
                        <p>2-piece Bonus: {{$set->relic_2pc_bonus}}</p>
                        <p>4-piece Bonus: {{$set->relic_4pc_bonus}}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <h1>Planar Ornaments</h1>
        <div class="container">
            @foreach ($ornament_set as $key => $set)    
                <div class="ornament" onclick="displayInfoOrnament({{$key}})">
                    <div class="displayOrnament">
                        <img src="/img/ornaments/{{$set->ornament_set_image}}" alt="">
                        <h3>{{$set->ornament_set_name}}</h3>
                    </div>
                    <div class="infoOrnament">
                        <div class="info-content">
                            @foreach ($ornament_pieces as $piece)
                                @if ($piece->ornament_set_name == $set->ornament_set_name)
                                <div class="pieces">
                                    <h4>{{$piece->ornament_piece_type_name}}</h4>
                                    <img src="/img/ornament_piece/{{$piece->ornament_piece_image}}" alt="">
                                </div>
                                @endif
                            @endforeach    
                        </div>
                        
                        <p>2-piece Bonus: {{$set->ornament_2pc_bonus}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

<script>
    function displayInfoRelic(index) {
        const relics_info = document.getElementsByClassName("infoRelic")
        const relic = document.getElementsByClassName("displayRelic")

        relic[index].classList.toggle("resize")
        relics_info[index].classList.toggle("show")
    }

    function displayInfoOrnament(index) {
        const ornaments_info = document.getElementsByClassName("infoOrnament")
        const ornament = document.getElementsByClassName("displayOrnament")

        ornament[index].classList.toggle("resize")
        ornaments_info[index].classList.toggle("show")
    }
</script>
