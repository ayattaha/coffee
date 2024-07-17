@extends('layouts.mainAdmin')

@section('content')

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Manage Beverages</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Beverage</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a class="dropdown-item" href="#">Settings 1</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action="{{ route('updateBeverages', [$product->id]) }}" method="POST" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required="required" class="form-control ">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="price">Price <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="price" class="form-control"  name="price" value="{{ old('price', $product->price) }}" required="required">
                                    @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <!-- Display the current image -->
                                    <label for="current_image">Current Image:</label>
                                    <img src="{{ asset('assets/img/beveragesImg/' . $product->image) }}" alt="Product Image" style="max-width: 200px; display: block; margin-bottom: 10px;">

                                    <!-- File input to change the image -->
                                    <label for="image">Change Image:</label>
                                    <input type="file" id="image" name="image" class="form-control">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="description">Description <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea id="description" name="description" required="required" class="form-control">{{ old('description', $product->description) }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Special Item</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="checkbox" value="1" @if(old('special_item')) checked @endif name="special_item" class="flat" {{ $product->special_item ? 'checked' : '' }}>
                                    @error('special_item')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Published</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="checkbox" value="1" @if(old('published')) checked @endif name="published" class="flat" {{ $product->published ? 'checked' : '' }}>
                                    @error('published')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="category_id">Category <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="category_id" required="required">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button class="btn btn-primary" type="button">Cancel</button>
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
