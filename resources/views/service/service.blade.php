@extends('layout.Clone-Admin')

@section('content')
    <section id="content">
        {{-- @include('admin.header') --}}
    @section('header')
        <nav>
            <div class="header-right">
                <div class="header-left">
                    <h2 style="color: #7E7D88;margin-right:1rem">Thiết bị <i class="fa-solid fa-chevron-right fs-4"></i></h2>
                    <h2>Danh sách dịch vụ</h2>
                </div>
                <div class="profile">
                    <div class="icon-bell">
                        <i class="fa-solid fa-bell"></i>
                    </div>
                    <div class="img_content">
                        <img srcset="{{ asset('./assets/images/user.png 2x') }}">
                        <div class="user-content">
                            <p>Xin Chào</p>
                            <h3>Lê Quỳnh Ái Vân</h3>
                        </div>
                    </div>

                </div>

            </div>

            <div class="title">
                <h2>Quản lý dịch vụ</h2>
            </div>
        </nav>
    @endsection



    <main>

        <div class="select">
            <form  class="row" action="{{route('service.index')}}" method="GET">
               @csrf
               
                <div class="col-md-3">
                    <label for="inputEmail4" class="form-label fs-3">Trạng thái hoạt động</label>
                    <select class="form-select py-2 fs-3" aria-label="Default select example"id='status-service'>
                        <option value="" selected>Tất cả</option>
                        <option value="0"> Ngưng Hoạt động</option>
                        <option value="1"> hoạt động</option>
                    </select>
                </div>
           
                <div class="col-md-2">
                    <label for="inputPassword4" class="form-label fs-3">Chọn thời gian</label>
                    
                    <div class="input-group date" id="startdate">
                        <span class="input-group-append">
                            <span class="input-group-text bg-light d-block">
                                <i class="fa fa-calendar"></i>
                            </span>
                            </span>
                         <input type="text" class="form-control py-1 fs-2 datepicker"id="startdate"  name= 'startdate'>
                        
                        </div>
               
                        </div>
                <div class="col-md-2">
                    <label style="visibility: hidden" for="inputPassword4" class="form-label fs-3">Chọn thời
                        gian</label>
                  
                    <div class="input-group date" id="enddate">
                        <span class="input-group-append">
                            <span class="input-group-text bg-light d-block">
                                <i class="fa fa-calendar"></i>
                            </span>
                            </span>
                         <input type="text" class="form-control py-1 fs-2 datepicker" id="enddate" name= 'enddate'>
                
                        
                    </div>
                </div>

           
                <div class="col-md-4"style="margin-left:7rem">
                    <label for="inputPassword4" class="form-label fs-3">Từ khóa</label>
                    <div class="search">
                        <input type="text" class="form-control py-1 fs-2 " id="inputPassword4"name="search">
                        <button style="border: none;background-color: #ddd9d9;" type="submit"><i  class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </div>
            </form>
        </div>

        <div class="data">
            <div class="content-data p-0">
                <div class="head">
                    <div class="form-user">

                        <table id="customers">
                          
                                

                            <tr>
                                <th>Mã dịch vụ</th>
                                <th>Tên dịch vụ</th>
                                <th>Mô tả</th>
                                <th>Trạng thái hoạt động</th>
                                <th></th>
                                <th></th>
                            </tr>
                            <tbody id="tbody-service">
                            @foreach ($service as $item)
                            <tr>
                                <td>{{$item->servicecode}}</td>
                                <td>{{$item->servicename}}</td>
                                <td>{{$item->description}}</td>
                                @if ($item->status==0)
                                <td><i class="fa-solid fa-circle text-danger fs-6"></i> Ngưng Hoạt động</td>
                                @else
                                <td><i class="fa-solid fa-circle text-success fs-6"></i> Hoạt động</td>
                                @endif
                                <td><a id="status-id" href="{{route('service.show',$item->id)}}">Chi tiết</a></td>
                                <td><a href="{{route('service.show',$item->id)}}">Cập nhật</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                      
                      
                    </div>
                </div>
               
 
            </div>
            <div class="content-add">

                <div class="add">
                    <a href="{{ route('service.create') }}">
                        <div class="btn-add">
                            <img srcset="{{ asset('./assets/images/add-square.png 1x') }}">
                            <span>Thêm thiết bị</span>
                        </div>
                    </a>
                </div>

            </div>
        </div>
 
           
        {{ $service->links()}}
        </div>
        
    </main>
</section>
@endsection
