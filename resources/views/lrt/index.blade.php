<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>LRT home</title>
<style>
div { margin: 0px; }
body {margin: 0px; }
</style>
</head>
<body style="margin: 0px;">
@foreach($articles as $article)
<div>{{ substr($article->item_date, 5) }} <a href="{{route("lrt.show", $article->id)}}">{{ $article->title }}</a></div>
@endforeach 
</body>
</html>
