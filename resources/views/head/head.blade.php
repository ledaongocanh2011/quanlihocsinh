<!DOCTYPE html>
<html lang="{{app()->getlocale()}}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>quanlihocsinh</title>
           <script src="//code.jquery.com/jquery.js"></script>
        <!-- DataTables -->
        
 <!-- Bootstrap CSS -->
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('jasny-bootstrap.min.css')}}">
       

</head>
<body>
	<div class="container">
		<div class="content">
			@yield('main')
		</div>
	</div>
	<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        {{-- <script src="{{asset('js/jquery-3.3.1.slim.min.js')}}"></script> --}}
        <script src="{{asset('js/jasny-bootstrap.min.js')}}"></script>
        {{-- <script src="{{asset('js/holder.min.js')}}"></script> --}}
        {{-- <script src="{{asset('js/popper.min.js')}}"></script> --}}
        {{-- <script src="{{asset('js/bootstrap.min.js')}}"></script> --}}

        {{--  SEARCH CŨ --}}
	{{-- <script>
		$(document).ready(function(){

   	$('#search').keyup(function(){ //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
    var query = $(this).val(); //lấy gía trị ng dùng gõ
    if(query != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
    {
     var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
     $.ajax({
      url:"{{ route('search') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
      method:"POST", // phương thức gửi dữ liệu.
      data:{query:query, _token:_token},
      success:function(data){ //dữ liệu nhận về
      	$('#list').fadeIn();  
       $('#list').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
   }
});
 }
});

   	$(document).on('click', 'li', function(){  
   		$('#search').val($(this).text());  
   		$('#list').fadeOut();  
   	});  

   });
</script> --}}
{{-- END SEARCH CŨ --}}

{{-- search  mới --}}
<script type="text/javascript">
  function retrieve(){
    var country = $('#country_name').val();
    $.ajax({
      type: "POST",
      url: '{{route('dataAjax-country')}}',
      data: {country:country},
      success: function(result){
        $('#ajaxtable').html(result);
      }
    });
  }
</script>


{{--end  search  mới --}}
{{-- <script>
	$(document).ready(function(){
		$(".btnprint").printPage();
	});
</script> --}}
<script>
        $(function () {
            $('#print').click(function () {
                var pageTitle = 'Danh sách học sinh',
                    stylesheet = 'https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css',
                    win = window.open('', 'Print', 'width=500,height=300');
                win.document.write('<html><head><title>' + pageTitle + '</title>' +
                    '<link rel="stylesheet" href="' + stylesheet + '">' +
                    '</head><body>' + $('#table')[0].outerHTML + '</body></html>');
                win.document.close();
                win.print();
                win.close();
                return false;
            });
        });
</script>
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{url("anydata")}}',
        columns: [

            { data: 'id', name: 'id' },
             { data: 'anh', name: 'anh' },
            { data: 'name', name: 'name' },
            { data: 'birth', name: 'birth' },
            { data: 'sex', name: 'sex' },
            { data: 'address', name: 'address' },
           
        ]
    });
});
</script>
</body>
</html>
