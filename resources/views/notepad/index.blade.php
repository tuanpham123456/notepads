@extends('layout.frontend')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title label label-default"  style="text-align: center" ><a href="{{ route('notepad.index')}}">{{ __('Ghi chú cá nhân') }}</a></h3>
        <div class="box-tools">
            <form method="get" >
                <div class="input-group input-group-sm" style="width: 300px;">
                    <input type="text" name="name" class="form-control" placeholder="Search" style="margin-left: -115px" {{ \Request::get('name')}}>
                    <div class="input-group input-group-sm">
                        <select class="form-control " name="cate">
                            <option value="" >{{ __('Danh mục') }}
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
            <a href="{{ route('category.create')}}" class="label label-success">{{ __('Thêm thuộc tính ') }}<i class="fa fa-plus"></i></a>
        </div>
        <br>
        <div>
            <a href="{{ route('notepad.create')}}" class="label label-warning">{{ __('Thêm ghi chú ') }}<i class="fa fa-plus"></i></a>
        </div>
        <br>
    </div>
    <div class="form-group ">
        <div class=""> {{ __('Tổng số:') }}{{$notepads->total()}}{{ __(' ghi chú') }}</div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding " style="background:#CCCCFF" x>
            <table class="table">
                <tbody class="">
                    <tr>

                        <th>ID</th>
                        <th>Note</th>
                        <th class="col-md-3">Content</th>
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

                            <a href="" class="btn btn-xs btn-info " data-toggle="modal" data-target="#myModal{{$notepad->id}}"><b class="fa fa-eye">{{ __('Code') }}</b></a>
                            <a href="{{ route('notepad.update', $notepad->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i>{{ __('Update') }}</a>
                            <a href="{{ route('notepad.delete',$notepad->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i>{{ __('Delete') }}</a>
                        </td>
                    </tr>
                    {{-- modal --}}
                    <div id="myModal{{$notepad->id}}" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">{{ __(' Code') }}<b id="idTransaction"></b></h4>
                                </div>
                                <div class="modal-body">
                                    <div class="content">
                                        <div class="">
                                            {{ __('HTML') }}
                                            <pre >{!! nl2br(e($notepad->np_html)) !!}</pre>
                                        </div>
                                        <div class="">
                                            {{ __('CSS') }}
                                            <pre >{!! nl2br(e($notepad->np_css)) !!}</pre>
                                        </div>
                                        <div class="">
                                            {{ __('JS') }}
                                            <pre>{{ $notepad->np_js }}</pre>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">{{ __('Back') }}</button>
                                    <button type="button" class="btn btn-primary">{{ __('Save changes') }}</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                    </div>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <div class="box-footer" style="background:#FFCCCC">
        {!! $notepads->appends(Request::all())->links() !!}
    </div>
    <!-- /.box -->
</div>
@stop
