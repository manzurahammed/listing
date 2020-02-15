<div class="form-group m-form__group row">
	<label class="col-lg-2 col-md-2 col-form-label">
		@lang('trn.CATE_LIST')
	</label>
	<div class="col-lg-4 col-md-4 col-sm-12">
		{!! Form::select('catpaper',$cat_list,$paper,array('multiple'=>'multiple','name'=>'catpaper[]','class'=>'form-control m-select2'))!!}
	</div>
</div>