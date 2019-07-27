@extends('head.head')
@section('main')
<form action="{{url('hocsinh/update')}}" method="post"  enctype="multipart/form-data" class="justify-content-center">
	 {{ csrf_field() }}
		<input type="hidden" name="id" value="{{$student->id}}">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="form-group">
			<div class="form-group">
				<label class="col-md-12 control-label">Ảnh đại diện </label>
				<div class="col-md-12 text-center">
					<div class="input-group ">
						<div class="fileinput fileinput-new" data-provides="fileinput">
							<div class="fileinput-new thumbnail" >
							<img style="width: 265px; height: 198px; background-color: #fff;
							border: 1px solid #ddd;
							border-radius: 4px;" src="{{asset('upload/').'/'.$student->anh}}" class="img-responsive">
						</div>
						<div class="fileinput-preview fileinput-exists thumbnail"
						style="max-width: 265px; max-height: 198px;"></div>
						<div class="select_align">
							<span class="btn btn-primary btn-file">
								<span class="fileinput-new">Chọn ảnh </span>
								<span class="fileinput-exists">Đổi</span>
								<input type="file" name="filetest">
							</span>
							<a href="#" class="btn btn-primary fileinput-exists"
							data-dismiss="fileinput">Xóa</a>
						</div>
					</div>
				</div>
			</div> 
		</div>
		<label for="exampleInputEmail1">Họ tên</label>
		<input type="text" class="form-control" name="name" placeholder="Enter hoten" value="{{$student->name}}">
		<label for="exampleInputEmail1">Ngày sinh</label>
		<input type="text" class="form-control" name="birth" placeholder="Enter hoten" value="{{date('Y-m-d',strtotime ($student->birth))}}">
		<label for="exampleInputEmail1">Giới tính</label>
		<input type="text" class="form-control" name="sex" placeholder="Enter hoten" value="{{$student->sex}}">
		<label for="exampleInputEmail1">Quê quán</label>
		<input type="text" class="form-control" name="address" placeholder="Enter hoten" value="{{$student->address}}">

		<small id="emailHelp" class="form-text text-muted"></small>
	</div>
	<button type="submit" class="btn btn-primary">Luu</button>
</form>
@endsection