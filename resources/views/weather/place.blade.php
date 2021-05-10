<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>{{$place}}</title>
<style>
div { margin: 0px; }
div.nd { width: 100%;background-color:#45668a;color:white;text-align:center;}
div.e { background-color:#c9d7e7 }
div.o { background-color:#e7eaee }
body {margin: 0px; }
</style>
</head>
<body style="margin: 0px;">
<div class="nd">Generated at: {{$forecast_creation_date}}</div>
@foreach($forecasts as $forecast)
@if($forecast['hour'] == "00:00")
<div class="nd">##########<br>{{$forecast['date']}}<br>##########</div>
@endif
<div class="{{$loop->even ? 'e' : 'o'}}">{{ $forecast['hour'] }} {{ $forecast['temp'] }}°c {!! $forecast['rain'] > 0 ? '<b>': '' !!}{{ $forecast['rain'] }}mm{!! $forecast['rain'] > 0 ? '</b>' : '' !!}<br>{{ $forecast['wind']}}-{{$forecast['gust']}}m/s {{ $forecast['wdir']}}°</div>
@endforeach 
</body>
</html>
