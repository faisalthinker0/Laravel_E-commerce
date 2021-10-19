@extends('admin/layout')
@section('page_title','Manage Color')
@section('color_select','active')
@section('container')

    <h1>Manage Color</h1>
    <a href="{{url('admin/color')}}" class="">
        <button type="button" class="btn btn-success mt-2">Back</button>
    </a>
    <div class="row m-t-30">
        <div class="col-lg-12">
            {{session('message')}}
            <div class="card">
                <div class="card-body">
                        <form action="{{url('admin/color/manage_color_process')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Color</label>
                                <input name="color" id="color" type="text" class="form-control" value="{{$color}}" required>
                                @error('color')
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