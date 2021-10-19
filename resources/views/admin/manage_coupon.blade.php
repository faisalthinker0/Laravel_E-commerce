@extends('admin/layout')
@section('page_title','Manage Coupon')
@section('coupon_select','active')
@section('container')

    <h1>Manage Coupon</h1>
    <a href="{{url('admin/coupon')}}" class="">
        <button type="button" class="btn btn-success mt-2">Back</button>
    </a>
    <div class="row m-t-30">
        <div class="col-lg-12">
            {{session('message')}}
            <div class="card">
                <div class="card-body">
                        <form action="{{url('admin/coupon/manage_coupon_process')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Title</label>
                                <input name="title" id="title" type="text" class="form-control" value="{{$title}}" required>
                                @error('title')
                                    <div class="alert alert-danger text-center" role="alert">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Code</label>
                                <input id="Code" name="code" type="text" class="form-control" value="{{$code}}" required>
                                @error('code')
                                    <div class="alert alert-danger text-center" role="alert">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Value</label>
                                <input id="value" name="value" type="text" class="form-control" value="{{$value}}" required>
                                @error('value')
                                    <div class="alert alert-danger text-center" role="alert">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type=submit" class="btn btn-lg btn-info btn-block">Submit</button>
                            </div>
                            <input type="hidden" name="id" value="{{$id}}" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection