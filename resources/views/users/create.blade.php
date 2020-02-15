@extends('layouts.default')

@section('content')
<div class="m-content">
	<div class="m-portlet m-portlet--mobile">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<span class="m-portlet__head-icon m--hide">
					<i class="la la-gear"></i>
				</span>
				<h3 class="m-portlet__head-text">
					Create New User
				</h3>
			</div>
		</div>
	</div>
	<!--begin::Form-->
	{{Form::open(['url' => 'users', 'method' => 'post','files' => true,'class'=>'m-form m-form--fit m-form--label-align-right m-form--group-seperator'])}}
		<div class="m-portlet__body">
			<div class="form-group m-form__group row">
				<label class="col-lg-2 col-form-label">
					@lang('trn.NAME')
				</label>
				<div class="col-lg-4">
					{{Form::text('name',old('name'),array('class'=>'form-control m-input'))}}
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label class="col-lg-2 col-form-label">
					Email
				</label>
				<div class="col-lg-4">
					{{Form::email('email',old('email'),array('class'=>'form-control m-input'))}}
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label class="col-lg-2 col-form-label">
					Password
				</label>
				<div class="col-lg-4">
					{{Form::password('password',array('class'=>'form-control m-input'))}}
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label class="col-lg-2 col-form-label">
					Confirm Password
				</label>
				<div class="col-lg-4">
					{{Form::password('password_confirmation',array('class'=>'form-control m-input'))}}
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label class="col-lg-2 col-md-2 col-form-label">
					Bio
				</label>

				<div class="col-lg-4 col-md-4 col-sm-12">
					{!! Form::textarea('bio','',array('class'=>'form-control'))!!}
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label class="col-lg-2 col-md-2 col-form-label">
					Role
				</label>

				<div class="col-lg-4 col-md-4 col-sm-12">
					{!! Form::select('role',['1'=>'Admin',2=>'Client'],'',array('class'=>'form-control'))!!}
				</div>
			</div>
			
			<div class="m-form__group form-group row">
				<label class="col-lg-2 col-form-label">
					Status
				</label>
				<div class="col-lg-6">
					<div class="m-checkbox-inline pp-inline">
						<label class="m-checkbox">
							{{Form::checkbox('status',1,old('name'))}}
							<span></span>
						</label>
					</div>
				</div>
			</div>
			<div class="m-form__group form-group row">
				<label class="col-lg-2 col-form-label">
					Profile Pic
				</label>
				<div class="col-lg-6">
					<div class="m-checkbox-inline pp-inline">
						<label class="custom-file">
							
							{{Form::file('image',array('class'=>'custom-file-input'))}}
							<span class="custom-file-control"></span>
						</label>
					</div>
				</div>
			</div>
		</div>
		<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
			<div class="m-form__actions m-form__actions--solid">
				<div class="row">
					<div class="col-lg-2"></div>
					<div class="col-lg-6">
						<button type="submit" class="btn btn-success">
							@lang('trn.SAVE')
						</button>
						<button type="reset" class="btn btn-secondary">
							
							@lang('trn.CANCEL')
						</button>
					</div>
				</div>
			</div>
		</div>
	{{ Form::close() }}
	<!--end::Form-->
</div>
</div>
@endsection