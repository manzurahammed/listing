<!doctype html>
<html lang="en">
@include('frontend.dashboard.header')




<div class="search-listing-wrap map-top">
    <div class="listing-map-block">
      <div id="searchmap" class="searchmap"></div>
    </div>
    <div class="listing-wrap grey-bg">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="listing-search-block">
              <form action="#">
                <div class="listing-filter-block">
                  <div class="category">
                    <select class="form-control select-category">
                      <option value="">Hotel & Restuarant</option>
                      <option value="">Beauty & Spa</option>
                      <option value="">Health & Medical</option>
                      <option value="">Real Estate</option>
                      <option value="">Food & Hotel</option>
                      <option value="">Travel</option>
                    </select>
                  </div>
                  <div class="price">
                    <input type="text" class="form-control" placeholder="Price">
                  </div>
                  <div class="status">
                    <a href="#" class="">Open Now<i class="far fa-clock"></i></a>
                  </div>
                  <div class="sort">
                    <select class="form-control sort-by">
                      <option value="">Sort By</option>
                      <option value="">ASC</option>
                      <option value="">DESC</option>
                    </select>
                  </div>
                  <div class="w-100"></div>
                  <div class="filter-tag">
                    <h5>Tags</h5>
                    <div class="tag-block">
                      <label for="tag-1">
                        <input type="checkbox" id="tag-1">
                        <span class="box"></span>
                        <span>Hotel</span>
                      </label>
                      <label for="tag-2">
                        <input type="checkbox" id="tag-2" checked>
                        <span class="box"></span>
                        <span>Play Ground</span>
                      </label>
                      <label for="tag-3">
                        <input type="checkbox" id="tag-3" checked>
                        <span class="box"></span>
                        <span>School</span>
                      </label>
                      <label for="tag-4">
                        <input type="checkbox" id="tag-4">
                        <span class="box"></span>
                        <span>Kids Zone</span>
                      </label>
                      <label for="tag-5">
                        <input type="checkbox" id="tag-5">
                        <span class="box"></span>
                        <span>Hot Coffee</span>
                      </label>
                      <label for="tag-6">
                        <input type="checkbox" id="tag-6">
                        <span class="box"></span>
                        <span>Wireless Internet</span>
                      </label>
                    </div>
                  </div>
                  <div class="filter-distance">
                    <h5>Radius</h5>
                    <div class="price-range-slider">
                      <div class="nstSlider" data-range_min="0" data-range_max="100" 
                       data-cur_min="20">
                        <div class="bar"></div>
                        <div class="leftGrip">
                          <div class="grip-label">
                            <span class="leftLabel"></span> <span>KM</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="listing-result">
              <div class="listing-result-header">
                <h5 class="searching-for">Results For: <span>Restaurant</span></h5>
                <div class="search-result-view-control">
                  <a href="#" class="grid-view view-change active"><i class="fas fa-th-large"></i></a>
                  <a href="#" class="list-view view-change"><i class="fas fa-bars"></i></a>
                </div>
              </div>
              <div class="listing-result-block">
                <div class="row">
                    @if ($listing->isNotEmpty())
                    @foreach ($listing as $key => $item)
                        @php ($image = 'feature_image/'.$item->feature_image)
                        <div class="col-lg-4 col-md-6 map-top-result-item">
                            <div class="lrn-listing-wrap">
                                <div class="listing-thumb">
                                <a href="listing/{{$item->id}}/details">
                                    {{Html::image($image,'profile picture',array('class' => 'img-fluid'))}}
                                </a>
                                </div>
                                <div class="listing-body">
                                <div class="meta">
                                    <a href="#" class="avater">
                                    <img src="images/listing/avater-2.jpg" class="img-fluid" alt="">
                                    </a>
                                    <a href="#" class="favourite"><span class="ti-heart"></span></a>
                                    <a href="#" class="preview" data-toggle="modal" data-target="#listingModal"><span class="ti-eye"></span></a>
                                </div>
                                <h3><a href="listing/{{$item->id}}/details">{{$item->title}}</a></h3>
                                <div class="reviews">
                                    <div class="rating">3.9</div>
                                    <span>5 Reviews</span>
                                </div>
                                <div class="listing-location">
                                    <div class="icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <span>4213 Hardman Road, South Burlington</span>
                                </div>
                                <div class="listing-category">
                                    <div class="icon"><i class="fab fa-pagelines"></i></div>
                                    <span><a href="#">Spa & Beauty</a></span>
                                </div>
                                <div class="listing-bottom">
                                    <span><i class="fas fa-phone"></i>+50 125 145601</span>
                                    <span class="status close-now"><i class="far fa-clock"></i>Closed Now</span>
                                </div>
                                </div>
                            </div>
                        </div>
                @endforeach
                @else
                    @lang('trn.NO_DATA_FOUND')
                @endif
                </div>
                <div class="row">
                  <div class="col">
                    <nav class="navigation pagination mar-10 justify-content-center">
                      <div class="nav-links">
                        <a class="prev page-numbers" href="#"><i class="fas fa-angle-left"></i></a>
                        <a class="page-numbers" href="#">1</a>
                        <span aria-current="page" class="page-numbers current">2</span>
                        <a class="page-numbers" href="#">3</a>
                        <a class="next page-numbers" href="#"><i class="fas fa-angle-right"></i></a>
                      </div>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 

@include('frontend.dashboard.footer')
</html>