@extends('admin/layout')
@section('page_title','Manage Size')
@section('size_select','active')
@section('container')

    <h1>Manage Size</h1>
    <a href="{{url('admin/size')}}" class="">
        <button type="button" class="btn btn-success mt-2">Back</button>
    </a>
    <div class="row m-t-30">
        <div class="col-lg-12">
            {{session('message')}}
            <div class="card">
                <div class="card-body">
                        <form action="{{url('admin/size/manage_size_process')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Size</label>
                                <input name="size" id="Size" type="text" class="form-control" value="{{$size}}" required>
                                @error('size')
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