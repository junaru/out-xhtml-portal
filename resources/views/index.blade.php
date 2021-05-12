@extends('layouts.app')

@section('title', 'out')

@section('body')
<a href="{{route('weather.index')}}">MeteoLT</a><br/>
<a href="{{route('lrt.index')}}">LRT</a>
@endsection 
</body>
</html>
