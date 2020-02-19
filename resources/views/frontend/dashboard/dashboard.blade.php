@extends('frontend.dashboard.main')

@section('dashboard')

    <div class="col-lg-9 order-lg-2">
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
        <div class="row">
            <div class="col-md">
                <div class="dashboard-section dashboard-activity">
                    <div class="dashboard-section-title">
                        <h5>Your Activities</h5>
                        <span class="ti-flag-alt-2"></span>
                    </div>
                    <div class="dashboard-section-body">
                        <div class="activity-list">
                            <i class="fas fa-bolt"></i>
                            <div class="content">
                                <h5>Your Profile Updated!</h5>
                                <span class="time">5 hours ago</span>
                            </div>
                            <div class="close-activity">
                                <i class="fas fa-times"></i>
                            </div>
                        </div>
                        <div class="activity-list">
                            <i class="fas fa-arrow-circle-down"></i>
                            <div class="content">
                                <h5>You change your password</h5>
                                <span class="time">11 hours ago</span>
                            </div>
                            <div class="close-activity">
                                <i class="fas fa-times"></i>
                            </div>
                        </div>
                        <div class="activity-list">
                            <i class="fas fa-check-square"></i>
                            <div class="content">
                                <h5>Your ads approved!</h5>
                                <span class="time">11 hours ago</span>
                            </div>
                            <div class="close-activity">
                                <i class="fas fa-times"></i>
                            </div>
                        </div>
                        <div class="activity-list">
                            <i class="fas fa-check-square"></i>
                            <div class="content">
                                <h5>You submit a new ads</h5>
                                <span class="time">5 hours ago</span>
                            </div>
                            <div class="close-activity">
                                <i class="fas fa-times"></i>
                            </div>
                        </div>
                        <div class="activity-list">
                            <i class="fas fa-user"></i>
                            <div class="content">
                                <h5>You subscribed as a pro user ! </h5>
                                <span class="time">2 days ago</span>
                            </div>
                            <div class="close-activity">
                                <i class="fas fa-times"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="dashboard-section dashboard-notification">
                    <div class="dashboard-section-title">
                        <h5>Notifications</h5>
                        <span class="ti-bell"></span>
                    </div>
                    <div class="dashboard-section-body">
                        <div class="dash-notification">
                            <span class="ti-bell"></span>
                            <div class="content">
                                <h5><a href="#">Someone bookmarked your listing</a></h5>
                                <span class="time">5 hours ago</span>
                            </div>
                        </div>
                        <div class="dash-notification">
                            <span class="ti-bell"></span>
                            <div class="content">
                                <h5><a href="#">Someone left a review on Restaurant listing!</a></h5>
                                <span class="time">7 hours ago</span>
                            </div>
                        </div>
                        <div class="dash-notification">
                            <span class="ti-bell"></span>
                            <div class="content">
                                <h5><a href="#">Someone bookmarked your listing</a></h5>
                                <span class="time">2 days ago</span>
                            </div>
                        </div>
                        <div class="dash-notification">
                            <span class="ti-bell"></span>
                            <div class="content">
                                <h5><a href="#">John Doe left a review on Burger House</a></h5>
                                <span class="time">5 days ago</span>
                            </div>
                        </div>
                        <div class="dash-notification">
                            <span class="ti-bell"></span>
                            <div class="content">
                                <h5><a href="#">Someone bookmarked your listing</a></h5>
                                <span class="time">6 days ago</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection