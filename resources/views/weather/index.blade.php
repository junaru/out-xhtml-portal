<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>weather</title>
</head>
<body>
<form action="{{route('weather.redirect')}}" method="POST">
@csrf
<select class="form-control" id="place" name="place" required focus>
<option value="" disabled selected>Please select a place</option>        
@foreach($places as $name => $value)
<option value="{{$value}}">{{ $name }}</option>
@endforeach
</select>
<input type="submit" value="Go">
</form>
</body>
</html>
