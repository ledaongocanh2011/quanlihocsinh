@extends('head.head')
@section('main')
{{-- SEARCH --}}
{{-- SEARCH CŨ --}}
{{-- <nav class="navbar navbar-light bg-light col-4 ">
  <form class="form-inline justify-content-center " action="{{ url('tim') }}" method="POST">
      {{ csrf_field() }}
    <input class="form-control mr-sm-2" type="search" placeholder="{{trans('home.search')}}" aria-label="Search" name="search" id="search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">{{trans('home.search')}}</button>
    <div id="list"></div>
  </form>
</nav> --}} 
{{-- END SEARCH CŨ --}}
{{-- search   mới --}}
<nav class="navbar navbar-light ">
  <form class="form-inline" action="{{url('/search')}}" method="get">
    <input class="form-control " type="search" placeholder="Search" aria-label="Search" name="search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>
{{-- {!! Form::text('country_name', '', array('id'=>'country_name', 'onkeyup'=>'retrieve()')) !!} --}}
{{-- 
<tbody id="ajaxtable">
  @foreach($results as $result)
    <tr>
      <td>{{$result->id}}</td>
      <td>{{$result->country_name}}</td>
    </tr>
  @endforeach
</tbody> --}}

      {{-- end search mới --}}
  <form action="{{ url('import') }}" enctype="multipart/form-data" method="POST">
 
       {{ csrf_field() }}<input type="file" name="filesTest" required="true">
        <br/>
        <input type="submit" value="upload">
    </form>
    {{-- ENDSEARCH --}}
<table class="table" id="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">{{trans('home.order')}}</th>
      <th scope="col">{{trans('home.img')}}</th>
      <th scope="col">{{trans('home.name')}}</th>
      <th scope="col">{{trans('home.birth')}}</th>
      <th scope="col">{{trans('home.sex')}}</th>
      <th scope="col">{{trans('home.address')}}</th>
      <th scope="col">{{trans('home.function')}}</th>
    </tr>
  </thead>
  <a href="{{url('printview')}}"><button type="button" class="btn btn-outline-danger btnptint" id="print">{{trans('home.print')}}</button></a>
   <a href="{{url('hocsinh/them_hoc_sinh')}}"><button type="button" class="btn btn-outline-danger">{{trans('home.add')}}</button></a>
  <a href="{{url('export')}}"><button type="button" class="btn btn-outline-danger">{{trans('home.export')}}</button></a>
   <a href="lang/en"><button type="button" class="btn btn-outline-danger">{{trans('home.eng')}}</button></a>
    <a href="lang/vi"><button type="button" class="btn btn-outline-danger">{{trans('home.vie')}}</button></a>
  {{-- <a href="{{url('import')}}"><button type="button" class="btn btn-outline-danger">import</button></a> --}}
  @if(session('thongbao'))
    {{session('thongbao')}}
  @endif
  @if(count($student) > 0)
  @endif
  
  <tbody>
  <?php $i = 1 ?>
    @foreach($student as $value)
      <tr>
        <td scope="row">{{$value->id}}</td>
        <td scope="row"><img src="{{asset('upload/').'/'.$value->anh}}" width="400" height="143" alt=""></td>
        <td>{{$value->name}}</td>
        <td>{{$value->birth}}</td>
        <td>{{$value->sex}}</td>
        <td>{{$value->address}}</td>
        <td>
          <a href="{{route('layout.update_hocsinh',[$value->id])}}"><button type="button" class="btn btn-info">{{trans('home.update')}}</button></a> <br>
          <a href="{{route('layout.delete_hocsinh',[$value->id])}}" onclick="return confirm('Bạn có muốn xóa {{$value->name}} không?')"><button type="button" class="btn btn-info">{{trans('home.delete')}}</button></a>
        </td>
      @endforeach
     
  </tbody>
</table>
 {{-- {!! $student->render() !!} --}}
 {!! $student->appends(Request::only('search'))->links() !!}
@endsection

