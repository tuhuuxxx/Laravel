<!DOCTYPE html>
<html>
  <head>
   <meta chaset="utf-8">
   <title>Trang chu | @yield('title')</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  </head>
  <body> 
     @include('tituc.marquee',['mar_content'=>'this is mine'])
      <h1>Master</h1>
      <h2>View Blog</h2>
      @yield('main')
  <body>
</html>