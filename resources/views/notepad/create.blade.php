@extends('layout.frontend')
@section('content')
<section class="content">
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>{{ __('Thêm ghi chú cá nhân') }}</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('notepad.index')}}"><i class="fa fa-dashboard"></i>{{ __(' Home') }}</a></li>
        <li class="active">{{ __('Create') }}</a>
        </li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <form role="form" action="" method="POST" enctype="multipart/form-data">
            <!-- @csrf ko bị lỗi  page expried  419 laravel -->
            @csrf
            <div class="col-sm-8">
                <div class="form-group" >
                    <label for="nam">{{ __('Name ') }}<span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control" name="np_name"  placeholder="Name ..." >
                    @if ($errors->first('np_name'))
                    <span class="text-danger">{{ $errors->first('np_name')}}</span>
                    @endif
                </div>
            </div>
            <div class="col-sm-8">
                <div class="form-group" >
                    <label for="nam">{{ __('Description ') }}<span class="text-danger">(*)</span></label>
                    <textarea name="np_description" class="form-control"
                        cols="5 " rows="8" autocomplete="off ">
                    </textarea>
                    @if ($errors->first('np_description'))
                    <span class="text-danger">{{ $errors->first('np_description')}}</span>
                    @endif
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group" >
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="nam">{{ __('Html ') }}<span class="text-danger">(*)</span></label>
                            <textarea name="np_html" class="form-control"
                                cols=" " rows="12" autocomplete="off ">
                            </textarea>
                            @if ($errors->first('np_html'))
                            <span class="text-danger">{{ $errors->first('np_html')}}</span>
                            @endif
                        </div>
                        <div class="col-sm-4">
                            <label for="nam">{{ __('Css ') }}<span class="text-danger">(*)</span></label>
                            <textarea name="np_css" class="form-control"
                                cols="" rows="12" autocomplete="off ">
                            </textarea>
                            @if ($errors->first('np_css'))
                            <span class="text-danger">{{ $errors->first('np_css')}}</span>
                            @endif
                        </div>
                        <div class="col-sm-4">
                            <label for="nam">{{ __('Javascript') }}<span class="text-danger">(*)</span></label>
                            <textarea name="np_js" class="form-control"
                                cols="" rows="12" autocomplete="off ">
                            </textarea>
                            @if ($errors->first('np_js'))
                            <span class="text-danger">{{ $errors->first('np_js')}}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="form-group" >
                    <label for="nam">{{ __('Link') }}<span class="text-danger"></span></label>
                    <input type="text" class="form-control" name="np_link"  placeholder="Link ...">
                </div>
            </div>
            <div class="col-sm-8">
                <div class="form-group ">
                    <label class="control-label">{{ __('Danh mục ') }}<b class="col-red">(*)</b></label>
                    <select name="np_category_id" class="form-control ">
                        <option value="0">{{ __('__Click__') }}</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ ($notepads->np_category_id ?? 0) == $category->id ? "selected='selected'" : "" }}>
                              {{  $category->c_name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-4"></div>
            <div class="col-sm-12">
                <div class="box-footer text-center">
                    <a href="{{ route('notepad.index')}}" class="btn btn-danger"><i class="fa fa-undo"></i>{{ __(' Quay lại') }}</a>
                    <button type="submit" class="btn btn-success">{{ __('Lưu dữ liệu  ') }}<i class="fa fa-save"></i></button>
                </div>
            </div>
        </form>
    </div>
</section>
@stop
