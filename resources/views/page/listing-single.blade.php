<!doctype html>
<html lang="en">
@include('frontend.dashboard.header-nosearch')
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
                  <li>{{$item->name}}</li>
                  @endif
                @endforeach
                </ul>
              </div>
            </div>
            
            <div class="col-lg-4">
              <div class="listing-details-sidebar">
                <div class="widget contact-widget">
                <div class="cp-map widget-map" id="location" data-lat="{{$listing->latitude}}" data-lng="{{$listing->longitude}}" data-zoom="10"></div>
                  <div class="contact-widget-block">
                    <ul>
                      <li><span><i class="fas fa-phone"></i>Phone:</span>{{$listing->phone}}</li>
                      <li><span><i class="far fa-envelope"></i>Mail:</span>{{$listing->email}}</li>
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
                      <li><span class="week-day">{{$time->day}}</span><span class="opening-time">Closed</span></li>
                      @else
                      <li><span class="week-day">{{$time->day}}</span><span class="opening-time">{{$time->start_time}} - {{$time->end_time}}</span></li>
                    @endif
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Listing Details End -->

@include('frontend.dashboard.footer')
</html>