@extends('layouts.default')

@section('content')
<div class="m-content">
	<div class="m-portlet m-portlet--mobile">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						Amenties
					</h3>
				</div>
			</div>
		</div>
		<div class="m-portlet__body">
			<!--begin: Search Form -->
			<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
				<div class="row align-items-center">
					<div class="col-xl-8 order-2 order-xl-1">
						<div class="form-group m-form__group row align-items-center">
							<div class="col-md-4">
								<div class="m-input-icon m-input-icon--left">
									
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 order-1 order-xl-2 m--align-right">
						<a href="{{url("/amenties/create")}}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
							<span>
								<i class="la la-cart-plus"></i>
								<span>
									Add New Amenties
								</span>
							</span>
						</a>
						<div class="m-separator m-separator--dashed d-xl-none"></div>
					</div>
				</div>
			</div>
			<table class="table table-striped m-table">										<!--begin::Thead-->
				<thead>
					<tr>
						<th class="m-widget11__label">
							#
						</th>
						<th class="m-widget11__app">
							Name
						</th>
						<th class="m-widget11__app">
							Icon
						</th>
						<th class="m-widget11__price">
							Action
						</th>
					</tr>
				</thead>
				<tbody>
					@if ($amenties->isNotEmpty())
						@foreach ($amenties as $key=> $item)
							<tr>
								<th scope="row">
									{{$key+1}}
								</th>
								<td>
									<span class="m-widget11__title">
										{{$item->name}}
									</span>
								</td>
								<td>
									<a href="amenties/{{$item->id}}/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details"><i class="la la-edit"></i></a>
									{!! Form::open(['method' => 'DELETE','class'=>'delete-form','route' => ['amenties.destroy', $item->id]]) !!}
										<button onClick="return confirm('Are you absolutely sure you want to delete?')" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" type="submit"><i class="la la-trash"></i> </button>
									{!! Form::close() !!}
								</td>
							</tr>
						@endforeach
					@else
						<tr>
							<td colspan="5" class="m--align-center m--font-brand ">
								@lang('trn.NO_DATA_FOUND')
							</td>
						</tr>
					@endif
				</tbody>
				<!--end::Tbody-->
			</table>
			@if ($amenties->isNotEmpty())
				<div class="table-pagination">
					{{$amenties->links() }}
				</div>
				<div class="table-information">
					<span class="info">Displaying {{$amenties->lastItem()}} of {{$amenties->total()}} records</span>
				</div>
			@endif
		</div>
	</div>
</div>
@endsection