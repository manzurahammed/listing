
<div class="lst-dash-user-profile">
    <div class="thumb">
        @php ($image = 'upload/'.Auth::user()->image)
        {{Html::image($image,'profile picture',array('class' => 'img-fluid'))}}
    </div>
    <div class="profile-body">
        <h4>{{Auth::user()->name}}</h4>
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
        <li class="navigation-item">
            <a href="{{url("/listing/all_listing")}}"><i class="fas fa-bolt"></i>My Listing</a>
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