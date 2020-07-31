<!doctype html>
<html lang="en">
@include('frontend.dashboard.header')
<div class="search-listing-wrap map-top">
    <div class="row">
      <div class="col">
        <div id="searchmapwrap" class="listing-map-block">
          <div id="searchmap" class="searchmap"></div>
        </div>
      </div>
      <div class="col">
        <div class="listing-wrap grey-bg">
            <div class="row">
              <div class="col">
                {{-- Search & Filter --}}
                <div class="listing-search-block">
                  <form action="#">
                    {{-- search --}}
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                            <input type="text" class="form-control searchkeyword" placeholder="search">
                        </div>
                      </div>
                      <div class="col">
                        <button id="ajaxsearch" class="button btn btn-primary"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                    {{-- filter --}}
                    <div class="listing-filter-block">
                      <div class="category">
                        <select id="categoryfilter" class="form-control select-category">
                          <option value="">Select Category</option>
                        @if ($category->isNotEmpty())
                          @foreach ($category as $key => $item)
                          <option value="{{$item->id}}">{{$item->name}}</option>
                          @endforeach
                        @endif
                        </select>
                      </div>
                      <div class="w-100"></div>
                      <div class="filter-tag">
                        <h5>Tags</h5>
                        <div class="tag-block">
                          @if(count($amenties) > 0) 
                            @foreach ($amenties as $item)
                          <label for="amenties-{{$item->id}}">
                            <input type="checkbox" id="amenties-{{$item->id}}">
                            <span class="box"></span>
                            <span>{{$item->name}}</span>
                          </label>
                          @endforeach
                          @endif
                        </div>
                      </div>
                      <div class="filter-distance">
                        <h5>Radius</h5>
                        <div class="price-range-slider">
                          <div class="nstSlider" data-range_min="0" data-range_max="1000" 
                           data-cur_min="0">
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
                {{-- search result --}}
                <div class="listing-result">
                  <div id="listingsearchresults" class="listing-result-block">
                    <div class="row">
                        @if ($listing->isNotEmpty())
                        @foreach ($listing as $key => $item)
                            
                            @php ($image = 'feature_image/'.$item->feature_image)
                            <div class="col-lg-4 col-md-6 map-top-result-item">
                                <div class="lrn-listing-wrap" data-latitude="{{$item->latitude}}" data-longitude="{{$item->longitude}}" data-mapicon={{url('upload/cat_image/'.$item->image)}}>
                                    <div class="listing-thumb">
                                      <a href="listing/{{$item->id}}/details">
                                          {{Html::image($image,'profile picture',array('class' => 'img-fluid'))}}
                                      </a>
                                      <div class="locationroute"></div>
                                    </div>
                                    <div class="listing-body">
                                    <h3><a href="listing/{{$item->id}}/details">{{$item->title}}</a></h3>
                                    <div class="listing-location">
                                      <span>{{\Illuminate\Support\Str::limit(strip_tags($item->description), 50)}}</span>
                                    </div>
                                    <div class="listing-category">
                                        <div class="icon">
                                          @php ($cat_image = 'upload/cat_image/'.$item->image)
                                            {{Html::image($cat_image,'mapicon',array('class' => 'img-fluid'))}}
                                        </div>
                                    <span><a href="#">{{$item->name}}</a></span>
                                    </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                    @else
                        @lang('trn.NO_DATA_FOUND')
                    @endif
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