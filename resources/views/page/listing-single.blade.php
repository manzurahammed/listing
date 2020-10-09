<!doctype html>
<html lang="en">
@include('frontend.dashboard.header-nosearch')

<div class="page-header-slider-wrap">
    <div class="page-header-slider">
        @php ($get_images = json_decode($listing->gallery_image))
        @foreach ($get_images as $item)
            <div class="item">
                <img src="{{$item}}" class="img-fluid" alt="">
            </div>
        @endforeach
    </div>
</div>

<div class="grey-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <nav class="listing-breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{'/'}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{'/search'}}">Listings</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$listing->title}}</li>
                    </ol>
                </nav>
            </div>
            <div class="col-lg-6">
                <div class="listing-details-meta">
                    <div class="save">
                        <a class="lisitng-favorite" data-listing-id="{{$listing->id}}" href="#"><i class="far fa-heart"></i>Save</a>
                    </div>
                    <div class="listing-share">
                        <a href="#" class="listing-share-button"><i class="fas fa-share-alt"></i>Share</a>
                        <div class="share-icons">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{'listing/'.$listing->id.'/details'}}"><i
                                        class="fab fa-facebook-f"></i></a>
                            <a href="https://twitter.com/home?status={{'listing/'.$listing->id.'/details'}}"><i
                                        class="fab fa-twitter"></i></a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{'listing/'.$listing->id.'/details'}}"><i
                                        class="fab fa-linkedin-in"></i></a>
                            <a href="https://pinterest.com/pin/create/button/?url={{'listing/'.$listing->id.'/details'}}"><i
                                        class="fab fa-pinterest-p"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="grey-bg section-border-top section-border-bottom">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="listing-details-header">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="listing-header">
                                <div class="thumb">
                                    @php ($icon = "/upload/default_image/avater-".rand(1,5).".jpg")
                                    <img src="{{$icon}}" class="img-fluid" alt="">
                                </div>
                                <div class="body">
                                    <h3>{{$listing->title}}</h3>
                                    <span class="location">
                                        <i class="fas fa-map-marker-alt"></i>1230 Honeysuckle Lane
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="listing-header-review">
                                <div class="rating">
                                    <p>{{$review->count()}}<br>Reviews</p>
                                    <span class="total-rating">{{number_format($total_rating/$review->count(),1)}}</span>
                                </div>
                                <div class="add-review">
                                    <a href="#"><i class="fas fa-star"></i>Add Review</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Listing Details -->
<div class="padding-top-60 section-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="listing-details-section listing-about">
                    <h4>{{$listing->title}}</h4>
                    {!! html_entity_decode($listing->description) !!}
                    <h4>Amenities:</h4>

                    <ul>
                        @foreach ($amenities as $item)
                            @if(in_array( $item->id, $selected_amenities ))
                                <li><i class="{{$item->icon_class}}"></i>{{$item->name}}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="listing-details-section listing-video">
                    <div id="video-player" data-plyr-provider="youtube" data-plyr-embed-id="{{$listing->video_url}}"></div>
                </div>
                <div class="listing-details-section listing-review">
                    <h4>Reviews for: {{$listing->title}}</h4>
                    @if ($review->isNotEmpty())
                        @foreach ($review as $key => $item)
                            <div class="listing-review-block">
                                <div class="review-header">
                                    <div class="thumb">
                                        <img src="{{url('upload/'.$item->ruser->image)}}" class="img-fluid" alt="">
                                    </div>
                                    <div class="header-info">
                                        <h5>{{$item->ruser->user_name}}</h5>
                                        <span class="review-date">{{date("d M, Y",strtotime($item->review_date))}}</span>
                                    </div>
                                    <div class="review-rating">
                                        @for($i=1;$i<$item->rating;$i++)
                                            <i class="fas fa-star"></i>
                                        @endfor
                                    </div>
                                </div>
                                <div class="review-body">
                                    <h5 class="review-title">“{{$item->title}}”</h5>
                                    <p>{{$item->description}}</p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="review-no-found">No Review Found</p>
                    @endif
                </div>
                @if(Auth::check())
                    <div class="listing-details-section listing-write-review">
                        <h4>Rate us &amp; Write a Review</h4>
                        <form name="listing_form" method='post' id="listing_form">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="rating-block">
                                        <select name="listing_rating" style="border-radius: 20px;" class="form-control" >
                                            <option value="1" >One Star</option>
                                            <option value="2" >Two Star</option>
                                            <option value="3" >Three Star</option>
                                            <option value="4" >Four Star</option>
                                            <option value="5" >Five Star</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input name="listing_title" id="listing_title" required type="text" class="form-control" placeholder="Review Title">
                            </div>
                            <div class="form-group">
                                <textarea name="listing_description" id="listing_description" required class="form-control" placeholder="Your Review"></textarea>
                            </div>
                            <input name="listing_id" value="{{$listing->id}}" hidden>
                            <button id="listing-id-submit" class="button">Submit Review</button>
                        </form>
                    </div>
                @endif
            </div>

            <div class="col-lg-4">
                <div class="listing-details-sidebar">
                    <div class="widget contact-widget">
                        <div class="cp-map widget-map" id="location" data-lat="{{$listing->latitude}}"
                             data-lng="{{$listing->longitude}}" data-zoom="10"></div>
                        <div class="contact-widget-block">
                            <ul>
                                <li><span><i class="fas fa-map-marker-alt"></i>Address:</span>855 Eagle Drive Detroit, MI 48219</li>
                                <li><span><i class="fas fa-phone"></i>Phone:</span>{{$listing->phone}}</li>
                                <li><span><i class="far fa-envelope"></i>Mail:</span>{{$listing->email}}</li>
                                <li><span><i class="fas fa-globe"></i>Website:</span><a href="{{$listing->website}}">{{$listing->website}}</a></li>
                            </ul>
                        </div>

                        <div class="widget-social-icon">
                            @foreach(json_decode($listing->social, true) as $key => $value)
                                <a href="{{$value}}"><i class="fab fa-{{$key}}"></i></a>
                            @endforeach
                        </div>
                    </div>
                    <div class="widget opening-status">
                        <div class="todays-status">
                            <span class="realtime-status status-open"><i class="far fa-clock"></i>Opening Hours</span>
                        </div>
                        <ul class="week-view">
                            @foreach($selected_time as $time)
                                @if($time->close)
                                    <li><span class="week-day">{{$time->day}}</span><span
                                                class="opening-time">Closed</span></li>
                                @else
                                    <li><span class="week-day">{{$time->day}}</span><span class="opening-time">{{$time->start_time}} - {{$time->end_time}}</span>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget host">
                        <div class="host-header">
                            <div class="header-info">
                                <span>Hosted by</span>
                                <h5>{{$listing->ruser->name}}</h5>
                            </div>
                            <div class="thumb">
                                <img src="{{url('upload/'.$listing->ruser->image)}}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="host-info">
                            <ul>
                                <li><span><i class="far fa-envelope"></i>Mail:</span>{{$listing->ruser->email}}</li>
                                <li><span><i class="fas fa-globe"></i>Website:</span><a href="{{$listing->website}}">{{$listing->website}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Listing Details End -->

@include('frontend.dashboard.footer')
</html>