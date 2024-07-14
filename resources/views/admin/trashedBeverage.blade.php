@extends('layouts.mainAdmin')

@section('content')

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Manage Beverage</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>List of Beverages</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Beverage name</th>
                                        <th>Price</th>
                                        <th style="width: 100px;">Image</th> <!-- Adjusted width for image column -->
                                        <th>Description</th>
                                        <th>Special</th>
                                        <th>Category</th>
                                        <th>Published</th>
                                        <th>Restore</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trash as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td style="width: 100px;"><img src="{{ asset('assets/img/beveragesImg/'.$product->image) }}" alt="Product Image" class="img-thumbnail"></td> <!-- Adjusted width for image -->
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->special_item ? 'special' : 'Not special' }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->published ? 'published' : 'Not published' }}</td>
                                        <td><a href="{{route('restorBeverage', $product->id)}}"> Restore </a></td>
                                        <td>
                                            <form action="{{ route('forceDeleteBeverage') }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                                <button type="submit" style="background: none; border: none; padding: 0; margin: 0;"><img src="{{ asset('assets/admin/images/delete.png') }}" alt="Delete"></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
