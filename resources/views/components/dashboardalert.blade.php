<div class="m-alert m-alert--icon m-alert--outline alert alert-{{$type or 'success'}} alert-dismissible fade show" role="alert">
	<div class="m-alert__icon">
		@if ($type=='success')
			<i class="la la-check-circle-o"></i>
		@else
			<i class="la la-warning"></i>
		@endif
	</div>
		@if (isset($title))
			<div class="m-alert__text">
				{{$title}}
			</div>
		@endif
	<div class="m-alert__close">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
	</div>
	{{$slot}}
</div>