<!doctype html>
<html lang="en">
@include('frontend.dashboard.header')
<div class="search-listing-wrap grid-right">
    <div id="searchmapwrap" class="listing-map-block">
        <div id="searchmap" class="searchmap"></div>
    </div>
    <div class="listing-wrap grey-bg">
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
                        <button id="ajaxsearch" class="button btn btn-primary"><i
                                    class="fas fa-search"></i></button>
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
        <div class="listing-result">
            <div class="listing-result-header">
                <h5 class="searching-for">Listing List</h5>
                <div class="search-result-view-control">
                    <a href="#" class="grid-view view-change active"><i class="fas fa-th-large"></i></a>
                    <a href="#" class="list-view view-change"><i class="fas fa-bars"></i></a>
                </div>
            </div>
            <div id="listingsearchresults" class="listing-result-block">
                <div class="row">
                    @if ($listing->isNotEmpty())
                        @foreach ($listing as $key=> $item)
                            @php ($icon = "/upload/default_image/avater-".rand(1,5).".jpg")

                            @php ($image = '/upload/default.gif')
                            @if($item->feature_image !='')
                                @php ($image = 'feature_image/'.$item->feature_image)
                            @endif

                            <div class="result-item col-md-6">
                                <div class="lrn-listing-wrap" data-latitude="{{$item->latitude}}"
                                     data-longitude="{{$item->longitude}}"
                                     data-mapicon={{url('upload/cat_image/'.$item->catname->image)}}>
                                    <div class="listing-thumb">
                                        {{Html::image($image,'profile picture',array('class' => 'img-fluid'))}}
                                    </div>
                                    <div class="listing-body">
                                        <div class="meta">
                                            <a href="{{'/search'}}" class="avater">
                                                <img src="{{ $icon }}" class="img-fluid" alt="">
                                            </a>
                                            <a href="#" class="favourite"><span class="ti-heart"></span></a>
                                            <a href="{{"listing/{$item->id}/details"}}" class="preview" ><span class="ti-eye"></span></a>
                                        </div>
                                        <h3 class="varified"><a
                                                    href="{{"listing/{$item->id}/details"}}">{{$item->title}}</a>
                                        </h3>
                                        <div class="reviews">
                                            <div class="rating">3.9</div>
                                            <span>13 Reviews</span>
                                        </div>
                                        <div class="listing-location">
                                            <div class="icon">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </div>
                                            <span>{{$item->website}}</span>
                                        </div>
                                        <div class="listing-category">
                                            <div class="icon">
                                                {{Html::image("/upload/cat_image/".$item->catname->image,'profile picture',array('class'=>'img-fluid'))}}
                                            </div>
                                            <span><a href="{{'/search'}}">{{$item->catname->name}}</a></span>
                                        </div>
                                        <div class="listing-bottom">
                                            <span><i class="fas fa-phone"></i>{{$item->phone}}</span>
                                            <span class="status open"><i
                                                        class="far fa-clock"></i>Open Now</span>
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

@include('frontend.dashboard.footer')
</html>