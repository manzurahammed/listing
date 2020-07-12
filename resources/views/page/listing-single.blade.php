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
                  <li><i class="fas fa-wifi"></i>Free Wifi</li>
                  <li><i class="fas fa-motorcycle"></i>Free Parking</li>
                  <li><i class="fas fa-asterisk"></i>Air Conditioned</li>
                  <li><i class="far fa-closed-captioning"></i>Online Ordering</li>
                  <li><i class="fas fa-child"></i>Child Zone</li>
                  <li><i class="fas fa-puzzle-piece"></i>Sport Zone</li>
                  <li><i class="fas fa-music"></i>Music</li>
                </ul>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="listing-details-sidebar">
                <div class="widget contact-widget">
                  <div class="cp-map widget-map" id="location" data-lat="40.713355" data-lng="-74.005535" data-zoom="10"></div>
                  <div class="contact-widget-block">
                    <ul>
                      <li><span><i class="fas fa-map-marker-alt"></i>Address:</span>855 Eagle Drive Detroit, MI 48219</li>
                      <li><span><i class="fas fa-phone"></i>Phone:</span>+50 125 145601</li>
                      <li><span><i class="far fa-envelope"></i>Mail:</span>example@domain.com</li>
                      <li><span><i class="fas fa-globe"></i>Website:</span><a href="#">www.yourwebsite.com</a></li>
                    </ul>
                  </div>
                  <div class="widget-social-icon">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                  </div>
                </div>
                <div class="widget opening-status">
                  <div class="todays-status">
                    <span class="realtime-status status-open"><i class="far fa-clock"></i>Open Now</span>
                    <span class="todays-time">Today: 6:00 am - 10:00 pm</span>
                  </div>
                  <ul class="week-view">
                    <li><span class="week-day">Monday</span><span class="opening-time">09:00 am - 05:00 pm</span></li>
                    <li><span class="week-day">Tuesday</span><span class="opening-time">09:00 am - 05:00 pm</span></li>
                    <li><span class="week-day">Wednesday</span><span class="opening-time">09:00 am - 05:00 pm</span></li>
                    <li><span class="week-day">Thursday</span><span class="opening-time">06:00 am - 10:00 pm</span></li>
                    <li><span class="week-day">Friday</span><span class="opening-time">09:00 am - 05:00 pm</span></li>
                    <li><span class="week-day">Saturday</span><span class="opening-time">09:00 am - 05:00 pm</span></li>
                    <li><span class="week-day">Sunday</span><span class="opening-time">Closed</span></li>
                  </ul>
                  <div class="local-time"><span>March 28, 2018 12:58 pm local time</span></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Listing Details End -->

@include('frontend.dashboard.footer')
</html>