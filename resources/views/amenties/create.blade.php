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
					Create New Amenties
				</h3>
			</div>
		</div>
	</div>
	<!--begin::Form-->
	{{Form::open(['url' => 'amenties', 'method' => 'post','class'=>'m-form m-form--fit m-form--label-align-right m-form--group-seperator'])}}
		<div class="m-portlet__body">
			<div class="form-group m-form__group row">
				<label class="col-lg-2 col-form-label">
					@lang('trn.NAME')
				</label>
				<div class="col-lg-4">
					<input type="text" name="name" value="{{old('name')}}" class="form-control m-input" placeholder="@lang('trn.NAME')">
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label class="col-lg-2 col-form-label">
					Icon Class
				</label>
				<div class="col-lg-4">
					<input type="text" name="icon_class" value="{{old('icon_class')}}" class="form-control m-input" placeholder="Icon Class">
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