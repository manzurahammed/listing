<div class="listing-review-block">
	<div class="review-header">
		<div class="thumb">
			<img src="{{url('upload/'.$review->image)}}" class="img-fluid" alt="">
		</div>
		<div class="header-info">
			<h5>{{$review->user_name}}</h5>
			<span class="review-date">{{date("d M, Y",strtotime($review->review_date))}}</span>
		</div>
		<div class="review-rating">
			@for($i=1;$i<$review->rating;$i++)
				<i class="fas fa-star"></i>
			@endfor
		</div>
	</div>
	<div class="review-body">
		<h5 class="review-title">“{{$review->title}}”</h5>
		<p>{{$review->description}}</p>
	</div>
</div>