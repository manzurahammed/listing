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
                            <h4>4569</h4>
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
                            <h4>25</h4>
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
                            <h4>48</h4>
                            <span>Total Reviews</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-section dashboard-view-chart">
            <div class="dashboard-section-title">
                <h5>Statistic</h5>
                <span class="ti-bar-chart"></span>
            </div>
            <div class="dashboard-section-body">
                <canvas id="view-chart" width="600" height="250"></canvas>
            </div>
        </div>
@endsection