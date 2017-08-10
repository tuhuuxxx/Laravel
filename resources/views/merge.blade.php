@extends('master')
@section('title','merge')
@section('main')
 <h2>day la merge</h2>
 <?php $hoten="<b>dang tu</b>" ?>
 {{$hoten}}
 <br>
 {!! $hoten !!} <!--hoc luon ca the html -->
 <?php $diem=10 ?>
 {{ isset($diem) ? $diem : 'Khong co diem'}}
 <hr>
  {{ $diem or 'Khong ton tai bien diem'}}
@stop
