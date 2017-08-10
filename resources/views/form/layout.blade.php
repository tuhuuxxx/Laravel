@if (count($errors)>0) 
  <ul>
     @foreach($errors->all() as $error)
      <li>{!! $error !!}</li>
     @endforeach
  </ul>
@endif
<form enctype = "multipart/form-data" action = "{!! route('postDangky') !!}" method ="POST" name = "frmThem">
<input type="hidden" name="_token" value = "{!! csrf_token() !!}"/>
<table>
  <tr>
     <td> Môn học </td>
     <td> <input type = "text" name="txtMonhoc"></td>
     {!! $errors->first('txtMonhoc') !!}
  </tr>
  <tr>
     <td> Giá tiền </td>
     <td> <input type = "text" name="txtGiatien"></td>
     {!! $errors->first('txtGiatien') !!}
  </tr>
  <tr>
     <td> Giảng viên </td>
     <td> <input type = "text" name="txtGiangvien"></td>
  </tr>
  <tr>
     <td> <input type = "submit"></td>
  </tr>
  <tr>
     <td>Hinh anh </td>
     <td><input type="file" name="Images"></td>
  </tr>
</table>
</form>