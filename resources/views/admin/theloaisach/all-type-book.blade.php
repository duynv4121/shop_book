@extends('admin.layout')
@section('title', 'Tất cả thể loại sách')
@section('main')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
         

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Tên thể loại</th>
                <th>Ẩn hiên</th>
                <th>Edit</th>
                <th>Xóa</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($all_type as $row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{($row->AnHien==1)?"Đang hiện":"Đang ẩn "}}</td>
                    <td><a class="btn btn-primary" href="{{route('type-book.edit', $row->id)}}">Chỉnh sửa</a></td>
                    <td>
                      <form action="{{route('type-book.destroy', $row->id)}}" method="POST">
                        {{csrf_field()}}
                        {!! method_field('delete') !!}
                        <button onclick="return confirm('Bạn có muốn xóa không?');" class="btn btn-warning" type="submit">Xóa</button>
                    </form>
                    
                    </td>         
                </tr>
            @endforeach 
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection