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
	{{Form::open(['url' => 'catpaper', 'method' => 'post','class'=>'m-form m-form--fit m-form--label-align-right'])}}
		<div class="m-portlet__body">
			<div class="form-group m-form__group row">
				<label class="col-lg-2 col-md-2 col-form-label">
					@lang('trn.CATE_LIST')
				</label>
				
				<div class="col-lg-4 col-md-4 col-sm-12">
					{!! Form::select('category',$cat_list,'',array('class'=>'form-control m-select2 ','id'=>'cateWithpPaper'))!!}
				</div>
			</div>
			<div id="catPaperList"></div>
		</div>
		<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
			<div class="m-form__actions m-form__actions--solid">
				<div class="row">
					<div class="col-lg-2"></div>
					<div class="col-lg-6">
						<button type="submit" class="btn btn-success">
							Update
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