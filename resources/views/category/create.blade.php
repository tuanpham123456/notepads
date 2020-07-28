@extends('layout.frontend')
@section('content')
<section class="content-header">
    <h1>{{ __('Thêm thuộc tín') }}h</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('notepad.index')}}"><i class="fa fa-dashboard"></i>{{ __('Home') }}</a></li>
        <li class="active">{{ __('Thuộc tính') }}</a>
        </li>
    </ol>
</section>
<section class="content">
    <!-- Default box -->
    <div class="box">
        <form role="form" action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-sm-8">
                <div class="form-group" >
                    <label for="nam">{{ __('Name ') }}<span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control" name="c_name"  placeholder="Name ...">
                    @if ($errors->first('c_name'))
                    <span class="text-danger">{{ $errors->first('c_name')}}</span>
                    @endif
                </div>
            </div>
            <div class="col-sm-12">
                <div class="box-footer text-center">
                    <a href="{{ route('notepad.index')}}" class="btn btn-danger"><i class="fa fa-undo"></i>{{ __('Quay lại') }}</a>
                    <button type="submit" class="btn btn-success"> {{ __('Lưu dữ liệu') }}<i class="fa fa-save"></i></button>
                </div>
            </div>
        </form>
    </div>
</section>
@stop
