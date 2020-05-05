@extends('layout.frontend')
@section('content')
<div class="box">
    <div class="box-header">
      <h3 class="box-title">Ghi chú cá nhân</h3>
      <div>
      <a href="{{ route('category.create')}}" class="label label-success">Thêm thuộc tính <i class="fa fa-plus"></i></a>
      </div>
      <br>
      <div>
      <a href="{{ route('notepad.create')}}" class="label label-warning">Thêm ghi chú <i class="fa fa-plus"></i></a>
      </div>
      <div class="box-tools">
        <div class="input-group input-group-sm" style="width: 150px;">
          <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

          <div class="input-group-btn">
            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
          </div>
        </div>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
        <tbody><tr>
          <th>ID</th>
          <th>Note</th>
          <th>Content</th>
          <th>Type</th>
          <th>Date</th>
          <th>Action</th>
        </tr>
        @if($notepads)
        @foreach ($notepads as $notepad )
        <tr>
            <td>{{ $notepad->id}}</td>
            <td style="color: #624E17">{{ $notepad->np_name}}</td>
            <td style="color: #00263b">{!! nl2br(e($notepad->np_description)) !!}</td>

            <td><span class="label label-success">{{ $notepad->category->c_name ?? "Laravel" }}</span>
            </td>
            <td>{{ $notepad->created_at}}</td>




            <td>
                <a href="{{ route('notepad.update', $notepad->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Update</a>
                <a href="{{ route('notepad.delete',$notepad->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>

            </td>
        </tr>
        @endforeach
        @endif

      </tbody></table>
    </div>
    <!-- /.box-body -->
  </div>
    <div class="box-footer">
    {!! $notepads->links() !!}
    </div>
  <!-- /.box -->
</div>
@stop

