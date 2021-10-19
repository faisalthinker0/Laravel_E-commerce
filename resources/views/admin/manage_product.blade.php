@extends('admin/layout')
@section('page_title','Manage Product')
@section('product_select','active')
@section('container')

@if($id>0)
    {{$image_required=""}}
@else
    {{$image_required="required"}}
@endif
    <h1>Manage Product</h1>
    <a href="{{url('admin/product')}}" class="">
        <button type="button" class="btn btn-success mt-2">Back</button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <form action="{{url('admin/product/manage_product_process')}}" method="post" enctype="multipart/form-data">
            {{session('message')}}
            <div class="card">
                <div class="card-body">
                        
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input name="name" id="product" type="text" class="form-control" value="{{$name}}" required>
                                @error('name')
                                    <div class="alert alert-danger text-center" role="alert">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Slug</label>
                                <input id="slug" name="slug" type="text" class="form-control" value="{{$slug}}" required>
                                @error('slug')
                                    <div class="alert alert-danger text-center" role="alert">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input id="image" name="image" type="file" class="form-control" value="{{$image}}" {{$image_required}}>
                                @error('image')
                                    <div class="alert alert-danger text-center" role="alert">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select name="category_id" class="form-control" id="category_id"required>
                                            <option value="">Select Categories</option>
                                            @foreach ($category as $list)
                                                @if($category_id==$list->id)
                                                <option selected value="{{$list->id}}">
                                                @else
                                                <option value="{{$list->id}}">
                                                @endif
                                                {{$list->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Brand</label>
                                        <input name="brand" id="brand" type="text" class="form-control" value="{{$brand}}" required>
                                        @error('bran')
                                            <div class="alert alert-danger text-center" role="alert">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Model</label>
                                        <input name="model" id="model" type="text" class="form-control" value="{{$model}}" required>
                                        @error('model')
                                            <div class="alert alert-danger text-center" role="alert">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Short Desc..</label>
                                <textarea name="short_desc" class="form-control" id="">{{$short_desc}}</textarea>
                                @error('short_desc')
                                    <div class="alert alert-danger text-center" role="alert">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Desc</label>
                                <textarea name="desc" class="form-control" id="">{{$desc}}</textarea>
                                @error('desc')
                                    <div class="alert alert-danger text-center" role="alert">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Keywords</label>
                                <textarea name="keywords" class="form-control" id="">{{$keywords}}</textarea>
                                @error('keywords')
                                    <div class="alert alert-danger text-center" role="alert">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Technical Specification</label>
                                <textarea name="technical_specification" class="form-control" id="">{{$technical_specification}}</textarea>
                                @error('technical_specification')
                                    <div class="alert alert-danger text-center" role="alert">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Uses</label>
                                <textarea name="uses" class="form-control" id="">{{$uses}}</textarea>
                                @error('uses')
                                    <div class="alert alert-danger text-center" role="alert">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Warranty</label>
                                <textarea name="warranty" class="form-control" id="">{{$warranty}}</textarea>
                                @error('warranty')
                                    <div class="alert alert-danger text-center" role="alert">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                    </div>
                </div>
                <h2 class="mb-2 ml-3">Product Attributes</h2>
                <div class="col-lg-12" id="product_attr_box">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>SKU</label>
                                            <input type="text" class="form-control" name="sku" id="sku" value="">
                                    </div>
                                    <div class="col-md-2">
                                        <label>MRP</label>
                                        <input name="mrp" id="mrp" type="text" class="form-control" value="" required>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Price</label>
                                        <input name="price" id="price" type="text" class="form-control" value="" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Size</label>
                                        <select name="size_id" class="form-control" id="size_id"required>
                                            <option value="">Select Sizes</option>
                                            @foreach($sizes as $list)
                                                <option value="{{$list->id}}">
                                                    {{$list->size}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Color</label>
                                        <select name="color_id" class="form-control" id="color_id"required>
                                            <option value="">Select colors</option>
                                            @foreach($colors as $list)
                                                <option value="{{$list->id}}">
                                                    {{$list->color}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label>QTY</label>
                                        <input type="number" class="form-control" name="qty" id="qty">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Image</label>
                                        <input id="attr_image" name="attr_image" type="file" class="form-control">
                                    </div>     
                                    <div class="col-md-2">
                                        <label for="" style="margin-top: 42px;">&nbsp;&nbsp;&nbsp;</label>
                                        <button type="button" class="btn btn-success btn-lg" onclick="add_more()">
                                            <i class="fa fa-plus"></i>&nbsp; Add</button>
                                    </div>
                                </div>               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type=submit" class="btn btn-lg btn-info btn-block">Submit</button>
                </div>
            <input type="hidden" name="id" value="{{$id}}" />
        </form>
        </div>
    </div>
    <script>
        function add_more(){
            var html='<div class="card"><div class="card-body"><div class="form-group"><div class="row">';


            html+='</div></div></div></div>';
            jQuery('#product_attr_box').append(html);
        }
    </script>
@endsection