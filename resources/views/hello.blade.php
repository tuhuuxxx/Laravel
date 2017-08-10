<style>
   .danger {
     color: red;
   }
   .success {
     color: blue;
   }
</style>
<h1>Laravel</h1>
@if (Session::has('message'))
  <span class="{{ Session::get('level')}}">
     {!! Session::get('message') !!}
  </span>
@endif