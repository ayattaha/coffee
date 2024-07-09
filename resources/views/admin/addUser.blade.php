@extends('layouts.mainAdmin')


@section('content')
<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Manage Users</h3>
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
									<h2>Add User</h2>
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
									<form id="demo-form2" action="{{ route('insertuser') }}" method="POST" data-parsley-validate class="form-horizontal form-label-left">
    @csrf

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Full Name <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <input type="text" id="fullname" name="fullname" required="required" class="form-control @error('fullname') is-invalid @enderror" value="{{ old('fullname') }}">
            @error('fullname')
                <span class="invalid-feedback" role="alert" style="color: red;">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="username">Username <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <input type="text" id="username" name="username" required="required" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}">
            @error('username')
                <span class="invalid-feedback" role="alert" style="color: red;">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="item form-group">
        <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Email <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" required="required" value="{{ old('email') }}">
            @error('email')
                <span class="invalid-feedback" role="alert" style="color: red;">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
        <div class="col-md-6 col-sm-6">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="active" class="flat" value="1" @if(old('active')) checked @endif>
                    Active
                </label>
            </div>
            @error('active')
                <span class="invalid-feedback" role="alert" style="color: red;">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <input type="password" id="password" name="password" required="required" class="form-control @error('password') is-invalid @enderror">
            @error('password')
                <span class="invalid-feedback" role="alert" style="color: red;">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- Other form fields or sections can follow -->

										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary" type="button">Cancel</button>
												<button type="submit" class="btn btn-success">Add</button>
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