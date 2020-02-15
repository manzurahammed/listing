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
					Create New Paper Size
				</h3>
			</div>
		</div>
	</div>
	<!--begin::Form-->
	{{Form::open(['url' => 'papersize', 'method' => 'post','class'=>'m-form m-form--fit m-form--label-align-right m-form--group-seperator'])}}
		<div class="m-portlet__body">
			<div class="form-group m-form__group row">
				<label class="col-lg-2 col-form-label">
					@lang('trn.NAME')
				</label>
				<div class="col-lg-4">
					<input required type="text" name="name" value="{{old('name')}}" class="form-control m-input" placeholder="@lang('trn.NAME')">
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label class="col-lg-2 col-md-2 col-form-label">
					@lang('trn.CATE_LIST')
				</label>
				
				<div class="col-lg-4 col-md-4 col-sm-12">
					{!! Form::select('category',$cat_list,'',array('class'=>'form-control m-select2 number'))!!}
				</div>
			</div>
			<div class="m-form__section m-form__section--last">
				<div class="m-form__heading">
					<h3 class="m-form__heading-title">
						@lang('trn.DIMENSION')
					</h3>
				</div>
				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-form-label">
						Width
					</label>
					<div class="col-lg-4">
						{!!Form::text('width','',array('class'=>'form-control m-input number','required' => 'required'))!!}
					</div>
				</div>
				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-form-label">
						Height
					</label>
					<div class="col-lg-4">
						{!!Form::text('height','',array('class'=>'form-control m-input number','required' => 'required'))!!}
					</div>
				</div>
				<div class="form-group m-form__group row">
					<label class="col-lg-2 col-md-2 col-form-label">
						@lang('trn.DESCRIPTION')
					</label>
					
					<div class="col-lg-6 col-md-6 col-sm-12">
						<textarea class="summernote" name="description">{{old('description')}}</textarea>
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