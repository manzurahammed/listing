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
					Edit Page Information
				</h3>
			</div>
		</div>
	</div>
	<!--begin::Form-->
	{!! Form::model($pages, ['route' => ['pages.update', $pages->id], 'method' => 'put','files' => true, 'class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator']) !!}
		<div class="m-portlet__body">
			<div class="form-group m-form__group row">
				<label class="col-lg-2 col-form-label">
					@lang('trn.NAME')
				</label>
				<div class="col-lg-4">
					{{Form::text('name',$pages->name,array('class'=>'form-control m-input'))}}
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label class="col-lg-2 col-form-label">
					Slug
				</label>
				<div class="col-lg-4">
					{{Form::text('slug',$pages->slug,array('class'=>'form-control m-input'))}}
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label class="col-lg-2 col-md-2 col-form-label">
					Page Content
				</label>
				
				<div class="col-lg-6 col-md-6 col-sm-12">
					<textarea class="summernote" name="content">{{$pages->content}}</textarea>
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label class="col-lg-2 col-form-label">
					Page Order
				</label>
				<div class="col-lg-4">
					{{Form::text('order',$pages->order,array('class'=>'form-control number m-input'))}}
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label class="col-lg-2 col-form-label">
					Status
				</label>
				<div class="col-lg-4">
					<div class="m-checkbox-inline pp-inline">
						<label class="m-checkbox">
							@php ($check = $pages->status==1?true:false)
							{{Form::checkbox('status','on',$check)}}
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
							Update
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