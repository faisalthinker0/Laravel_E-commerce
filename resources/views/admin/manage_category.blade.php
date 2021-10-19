@extends('admin/layout')
@section('page_title','Manage Category')
@section('category_select','active')
@section('container')

    <h1>Manage Category</h1>
    <a href="{{url('admin/category')}}" class="">
        <button type="button" class="btn btn-success mt-2">Back</button>
    </a>
    <div class="row m-t-30">
        <div class="col-lg-12">
            {{session('message')}}
            <div class="card">
                <div class="card-body">
                        <form action="{{url('admin/category/manage_category_process')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Category</label>
                                <input name="category_name" id="category" type="text" class="form-control" value="{{$category_name}}" required>
                                @error('category_name')
                                    <div class="alert alert-danger text-center" role="alert">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Category Slug</label>
                                <input id="category_slug" name="category_slug" type="text" class="form-control" value="{{$category_slug}}" required>
                                @error('category_slug')
                                    <div class="alert alert-danger text-center" role="alert">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-info btn-block">Submit</button>
                            </div>
                            <input type="hidden" name="id" value="{{$id}}" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection