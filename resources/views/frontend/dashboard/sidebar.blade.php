
<div class="lst-dash-user-profile">
    <div class="thumb">
        <img src="{{ asset('images/frontend/dash-author.jpg') }}" class="img-fluid" alt="">
    </div>
    <div class="profile-body">
        <h4>Manzur</h4>
        <span>@username</span>
        <span class="pro"><i class="fas fa-bookmark"></i>Pro User</span>
    </div>
</div>

<div class="lst-dash-side-nav">
    <ul class="dashboard-nav" id="dashboard-nav">
        <li class="navigation-item">
            <a href="dashboard.html" class="active"><i class="fas fa-home"></i>Dashboard</a>
        </li>
        <li class="navigation-item">
            <a href="{{url("/listing/profile")}}"><i class="fas fa-user"></i>Edit Profile</a>
        </li>
        <li class="navigation-item dropdown">
            <a href="#"><i class="fas fa-bolt"></i>My Listing</a>
            <ul class="dropdown-menu">
                <li><a href="{{url("/listing/all_listing")}}">All Listing</a></li>
                <li><a href="{{url("/listing/active_listing")}}">Active Listing</a></li>
                <li><a href="{{url("/listing/pending_listing")}}">Pending Listing</a></li>
                <li><a href="{{url("/listing/expired_listing")}}">Expired Listing</a></li>
            </ul>
        </li>
        <li class="navigation-item">
            <a href="{{url("/listing/add")}}"><i class="fas fa-plus-circle"></i>Add Listing</a>
        </li>
        <li class="navigation-item">
            <a href="{{url("/listing/bookmarked")}}"><i class="fas fa-heart"></i>Bookmarked</a>
        </li>
        <li class="navigation-item">
            <a href="{{url("/listing/review")}}"><i class="fas fa-star"></i>Review</a>
        </li>
    </ul>
    <a href="#" class="logout-button">Logout</a>
</div>