@extends('layout.frontend')
@section('content')
<section class="content">
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Thêm ghi chú cá nhân</h1>

    <ol class="breadcrumb">
        <li><a href="{{ route('notepad.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Create</a>
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
                    <label for="nam">Name <span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control" name="np_name"  placeholder="Name ...">

                </div>
            </div>
            <div class="col-sm-8">
                <div class="form-group" >
                    <label for="nam">Description <span class="text-danger">(*)</span></label>
                    <textarea name="np_description" class="form-control"
                    cols="5 " rows="8" autocomplete="off ">
                    </textarea>

                </div>
            </div>

            <div class="col-sm-4"></div>
            <div class="col-sm-12">
                <div class="box-footer text-center">
                    <a href="{{ route('notepad.index')}}" class="btn btn-danger"><i class="fa fa-undo"></i> Quay lại</a>
                    <button type="submit" class="btn btn-success">Lưu dữ liệu  <i class="fa fa-save"></i></button>
                </div>
            </div>
        </form>
    </div>
</section>
@stop
