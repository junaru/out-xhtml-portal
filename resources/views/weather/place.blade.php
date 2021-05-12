@extends('layouts.app')

@section('title', $place)

@section('css')
div, body { margin: 0px; }
@endsection

@section('body')
<div>Generated at: {{$forecast_creation_date}}</div>
@foreach($forecasts as $forecast)
@if($forecast['hour'] == "00:00")
<hr><b>{{$forecast['date']}}</b><hr>
@endif
<div>{{ $forecast['hour'] }} {{ $forecast['temp'] }}°c {!! $forecast['rain'] > 0 ? '<b>': '' !!}{{ $forecast['rain'] }}mm{!! $forecast['rain'] > 0 ? '</b>' : '' !!}<br>{{ $forecast['wind']}}-{{$forecast['gust']}}m/s {{ $forecast['wdir']}}°</div>
@endforeach
@endsection
