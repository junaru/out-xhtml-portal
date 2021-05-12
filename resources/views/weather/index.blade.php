@extends('layouts.app')

@section('title', 'MeteoLT')

@section('body')
<form action="{{route('weather.redirect')}}" method="POST">
@csrf
<select name="place" required focus>
<option value="" disabled selected>Please select a place</option>        
@foreach($places as $name => $value)
<option value="{{$value}}">{{ $name }}</option>
@endforeach
</select>
<input type="submit" value="Go">
</form>
@endsection
