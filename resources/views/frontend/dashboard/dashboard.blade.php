@extends('frontend.dashboard.main')

@section('dashboard')


        <div class="lst-dash-statistic">
            <div class="row">
                <div class="col-12 col-sm">
                    <div class="static-block total-view">
                        <div class="icon">
                            <span class="ti-map-alt"></span>
                        </div>
                        <div class="content">
                            <h4>{{$total_view}}</h4>
                            <span>Listing Views</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm">
                    <div class="static-block active-listings">
                        <div class="icon">
                            <span class="ti-eye"></span>
                        </div>
                        <div class="content">
                            <h4>{{$active_listing}}</h4>
                            <span>Active Listing</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm">
                    <div class="static-block all-reviews">
                        <div class="icon">
                            <span class="ti-star"></span>
                        </div>
                        <div class="content">
                            <h4>{{$total_review}}</h4>
                            <span>Total Reviews</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection