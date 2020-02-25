<div class="m-alert m-alert--icon m-alert--outline alert alert-danger alert-dismissible fade show" role="alert">
	<div class="m-alert__icon">
		<i class="la la-warning"></i>
	</div>
	<div class="m-alert__text">
		@foreach ($errors->all() as $error)
			<p>{{ $error }}</p>
		@endforeach
	</div>
	<div class="m-alert__close">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
	</div>
	{{$slot}}
</div>