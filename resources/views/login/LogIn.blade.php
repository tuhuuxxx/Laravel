<!DOCTYPE html>
<html>
  <body>
    @if (count($errors)>0)
      @foreach($errors->all() as $error)
        <p>{!! $error !!}</p>
      @endforeach
    @endif
    <form action="" method = "POST">
     <input type="hidden" name="_token" value = "{!! csrf_token() !!}">
     <table>
     <tr>
        <td>username</td>
        <td><input type="user"></td>
     </tr>
     <tr>
         <td>password</td>
         <td><input type = "pass"></td>
     </tr>
     <tr>
         <td><input type = "submit"></td>
     </tr>
     </table>
    </form>
  </body>
</html>