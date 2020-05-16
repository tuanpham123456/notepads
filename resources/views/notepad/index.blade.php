@extends('layout.frontend')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title label label-default"  style="text-align: center" ><a href="{{ route('notepad.index')}}">Ghi chú cá nhân</a></h3>
        <div class="box-tools">
            <form method="get" >
                <div class="input-group input-group-sm" style="width: 300px;">
                    <input type="text" name="name" class="form-control" placeholder="Search" style="margin-left: -115px" {{ \Request::get('name')}}>
                    <div class="input-group input-group-sm">
                        <select class="form-control " name="cate">
                            <option value="" >Danh mục
                                @if (isset($categories))
                                    @foreach ($categories as $category )
                            <option  class="input-group input-group-sm" value="{{ $category->id}}" {{ \Request::get('cate') == $category->id ? "selected='selected'" : ""}}>
                                {{$category->c_name}}
                            </option>
                                    @endforeach
                                @endif
                            </option>

                        </select>
                    </div>

                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="box-header" style="background: #FFCCCC">
        <div>
            <a href="{{ route('category.create')}}" class="label label-success">Thêm thuộc tính <i class="fa fa-plus"></i></a>
        </div>
        <br>
        <div>
            <a href="{{ route('notepad.create')}}" class="label label-warning">Thêm ghi chú <i class="fa fa-plus"></i></a>
        </div>
        <br>
    </div>
    <div class="form-group ">

        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding " style="background:#CCCCFF" x>
            <table class="table">
                <tbody class="">
                    <tr>
                        <th>ID</th>
                        <th>Note</th>
                        <th>Content</th>
                        <th>Link</th>
                        <th>Type</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    @if($notepads)
                    @foreach ($notepads as $notepad )
                    <tr>
                        <td >{{ $notepad->id}}</td>
                        <td style="color: #000033	">{{ $notepad->np_name}}</td>
                        <td style="color: #00263b">{!! nl2br(e($notepad->np_description)) !!}</td>
                        <td><a style="color:rgb(163, 35, 35)" href="{{ asset($notepad->np_link)}}" target="_blank">{{$notepad->np_link}}</a></td>
                        <td><span class="label label-success">{{ $notepad->category->c_name ?? "[N\A]" }}</span>
                        </td>
                        <td>{{ $notepad->created_at}}</td>
                        <td>
                            <a href="{{ route('notepad.update', $notepad->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Update</a>
                            <a href="{{ route('notepad.delete',$notepad->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>

    <div class="box-footer" style="background:#FFCCCC">
        {!! $notepads->links() !!}
    </div>
    <!-- /.box -->
</div>
@stop
