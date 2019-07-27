@extends('head.head')
@section('main')
<form action="" method="post">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Ảnh</th>
      <th scope="col">Họ tên</th>
      <th scope="col">Ngày sinh</th>
      <th scope="col">giới tính</th>
      <th scope="col">địa chỉ</th>
    </tr>
  </thead>
  <tbody>
  <?php $i = 1 ?>
    @foreach($student as $value)
      <tr>
        <td scope="row">{{$i++}}</td>
        <td scope="row"><img src="{{asset('upload/').'/'.$value->anh}}" width="400" height="143" alt=""></td>
        <td>{{$value->name}}</td>
        <td>{{$value->birth}}</td>
        <td>{{$value->sex}}</td>
        <td>{{$value->address}}</td>
      @endforeach
     
  </tbody>
</table>
</form>
@endsection