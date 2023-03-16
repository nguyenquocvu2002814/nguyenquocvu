<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href={{ asset('assets/css/style.css') }}>
    {{-- CDN GoogleFont --}}
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700;900&display=swap" rel="stylesheet">
    {{-- CDN Fontawesome --}}
    <link rel="stylesheet" href="https://kit.fontawesome.com/ef6c647e92.css" crossorigin="anonymous">
    {{-- CDN Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- CDN select2 --}}
    <link rel="stylesheet" href="{{ asset('assets/select2/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
   
    <title>Login</title>
</head>

<body style="background-color: #ddd9d9;overflow-x:unset">
    <div class="wrapper">

        @include('sidebar.sidebar')


        @yield('header');
        @yield('content')
    </div>
    <script src={{ asset('assets/js/style.js') }}></script>
    {{-- CDN Bootstrap --}}
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    {{-- CDN Fontawesome --}}
    <script src="https://kit.fontawesome.com/ef6c647e92.js" crossorigin="anonymous"></script>
    {{-- CDN Ckeditor --}}
    {{-- <script src="//cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('ckeditor');
    </script> --}}
    {{-- CDN Jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    {{-- CDN select2 --}}
    <script src="{{ asset('assets/select2/select2/dist/js/select2.min.js') }}"></script>

    <script type="text/javascript">
      

        $("#js-select2").select2({
            tags: true,
            tokenSeparators: [',']
        });
    </script>
 

 <script  type="text/javascript">
    function fetchData(params) {
      $.ajax({
          url: "{{ route('device.index') }}",
          type: "GET",
          data: params,
          success: function (data) {
              var sta = data.devicestatus;
              var html = '';
              if (sta.length > 0) {
                  for (let i = 0; i < sta.length; i++) {
                      html += '<tr>';
                      html += '<td>' + sta[i]['devicecode'] + '</td>';
                      html += '<td>' + sta[i]['devicename'] + '</td>';
                      html += '<td>' + sta[i]['addressip'] + '</td>';
                      html += '<td>' + (sta[i]['activestatus'] == 0 ? '<i class="fa-solid fa-circle text-danger fs-6"></i>Ngưng hoạt động' : '<i class="fa-solid fa-circle text-success fs-6"></i> hoạt động') + '</td>';
                      html += '<td>' + (sta[i]['connectionstatus'] == 0 ? '<i class="fa-solid fa-circle text-danger fs-6"></i>Mất kết nối' : '<i class="fa-solid fa-circle text-success fs-6"></i> kết nối') + '</td>';
                      html += '<td></td>';
                      html += '</tr>';
                  }
              } else {
                  html += '<tr><td>Không có sản phẩm</td></tr>';
              }
              $("#tbody").html(html);
          }
      });
  }
  
  $("#connection-device").on('change', function () {
      var connection = $(this).val();
      fetchData({ 'connection': connection });
  });
  
  $("#status-device").on('change', function () {
      var statusid = $(this).val();
      fetchData({ 'statusid': statusid });
  });
  </script>


  



<script  type="text/javascript">
    $("#status-service").on('change', function () {
      var statusid = $(this).val();
  
      $.ajax({
          url: "{{ route('service.index') }}",
          type: "GET",
          data: {
              'statusid': statusid
          },
          success: function (data) {
              var sta = data.servicestatus;
              
              var html = '';
              if (sta.length > 0) {
                    sta.forEach(element => {
                        console
                    html +='<tr>'     
                        html += '<td>'+ element.servicecode + '</td>'
                        html +='<td>' + element.servicename + '</td>'
                        html +='<td>' + element.description+ '</td>'
                        html +='<td>' + (element.status == 0 ? '<i class="fa-solid fa-circle text-danger fs-6"></i> Ngưng Hoạt động' : '<i class="fa-solid fa-circle text-success fs-6"></i>  hoạt động') + '</td>'
                        html += '<td>';
                            html += '<a href="{{ route('service.show', ['service' => ':id']) }}">Chi tiết</a>'
                                        .replace(':id', element.id);
                            html += '</td>';
                            html += '<td>';
                            html += '<a href="{{ route('service.edit', ['service' => ':id']) }}">Cập nhật</a>'
                                        .replace(':id', element.id);
                            html += '</td>';
                        html +='</tr>'     
                
                })
              } else {
                  html +=
                      '<tr>\                                                                                                                                                        <td>Khong Có san pham</td>\
                                                                                                                                                                          </tr>';
              }
              $("#tbody-service")
    
                  .html(html)
    
          }
      })
    }); 
    </script>

<script>
    $(document).ready(function() {
        $('.modal').modal('show');
    });


</script>



<script  type="text/javascript">
    function fetchData(params) {
      $.ajax({
          url: "{{ route('nublevel.index') }}",
          type: "GET",
          data: params,
          success: function (data) {
              var sta = data.servicename;
              console.log(sta)
              var html = '';
              if (sta.length > 0) {
                  for (let i = 0; i < sta.length; i++) {
                      html += '<tr>';
                      html += '<td>' + sta[i]['number_print'] + '</td>';
                      html += '<td>' + sta[i]['fullname'] + '</td>';
                      html += '<td>' + sta[i]['servicename'] + '</td>';
                      html += '<td>' + sta[i]['grant_time'] + '</td>';
                      html += '<td>' + sta[i]['expired'] + '</td>';
                      html += '</tr>';
                  }
              } else {
                  html += '<tr><td>Không có sản phẩm</td></tr>';
              }
              $("#tbody-nublevel").html(html);
          }
      });
  }
  
  $("#servicename").on('change', function () {
      var servicename = $(this).val();
      console.log(servicename);
      fetchData({ 'servicename': servicename });
  });
  

  </script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script  type="text/javascript">
$(document).ready(function() {
  // Initialize datepicker
  $('#startdate,#enddate').datepicker({
    autoclose: true,
     format: 'yyyy-mm-dd',
    todayHighlight: true
  });
  


});
</script>



</body>

</html>
