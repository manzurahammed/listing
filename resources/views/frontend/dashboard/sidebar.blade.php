
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
            <a href="{{url("listing/profile")}}" class="{{ (request()->is('listing/profile')) ? 'active' : '' }}"><i class="fas fa-user"></i>Edit Profile</a>
        </li>
        <li class="navigation-item">
            <a href="{{url("listing/all_listing")}}" class="{{ (request()->is('listing/all_listing')) ? 'active' : '' }}"><i class="fas fa-bolt"></i>My Listing</a>
        </li>
        <li class="navigation-item">
            <a href="{{url("listing/add")}}" class="{{ (request()->is('listing/add')) ? 'active' : '' }}"><i class="fas fa-plus-circle"></i>Add Listing</a>
        </li>
        <li class="navigation-item">
            <a href="{{url("listing/bookmarked")}}" class="{{ (request()->is('listing/bookmarked')) ? 'active' : '' }}"><i class="fas fa-heart"></i>Bookmarked</a>
        </li>
        <li class="navigation-item">
            <a href="{{url("listing/review")}}" class="{{ (request()->is('listing/review')) ? 'active' : '' }}"><i class="fas fa-star"></i>Review</a>
        </li>
    </ul>
    <a href="{{url("logout")}}" class="logout-button">Logout</a>
</div>