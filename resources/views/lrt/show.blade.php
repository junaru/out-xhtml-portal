<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>{{$article->article_id}}</title>
<style>
div { margin: 0px; }
body {margin: 0px; }
</style>
</head>
<body style="margin: 0px;">
<div>{{$article->article_summary}}</div>
@foreach($article->paragraphs as $par)
<div>{!! substr(substr($par->p, 3), 0, -4) !!}</div>
@endforeach 
</body>
</html>
