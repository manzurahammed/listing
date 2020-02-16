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
					@lang('trn.CREATE_EDIT_HEADING')
				</h3>
			</div>
		</div>
	</div>
	<!--begin::Form-->
	{!! Form::model($cities, ['route' => ['cities.update', $cities->id], 'method' => 'put', 'files' => true,'class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator']) !!}
		<div class="m-portlet__body">
			<div class="form-group m-form__group row">
				<label class="col-lg-2 col-form-label">
					@lang('trn.NAME')
				</label>
				<div class="col-lg-4">
					{!!Form::text('name',$cities->name,array('class'=>'form-control m-input'))!!}

				</div>
			</div>

			<div class="m-form__group form-group row">
				<label class="col-lg-2 col-form-label">
					City Image
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

			<div class="m-form__group form-group row">
				<label class="col-lg-2 col-form-label">
					@lang('trn.SHOW_NAV')
				</label>
				<div class="col-lg-6">
					<div class="m-checkbox-inline pp-inline">
						<label class="m-checkbox">
							@php ($check = $cities->show_nav==1?true:false)
							{{Form::checkbox('show_nav',1,$check)}}
							<span></span>
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