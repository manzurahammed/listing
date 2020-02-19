@extends('frontend.dashboard.main')

@section('dashboard')

    <div class="grey-bg-2 padding-bottom-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 order-lg-2">
                    <div class="dashboard-section dashboard-my-profile">
                        <div class="dashboard-section-title">
                            <h5>Profile Details</h5>
                            <span class="ti-user"></span>
                        </div>
                        <div class="dashboard-section-body">
                            <form action="#">
                                <div class="row">
                                    <div class="col">
                                        <div class="upload-profile-photo">
                                            <div class="update-photo">
                                                <img class="image" src="dashboard/images/dash-author.jpg" alt="">
                                            </div>
                                            <div class="file-upload">
                                                <input type="file" class="file-input">Change
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label>First Name *</label>
                                            <input type="text" placeholder="First Name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label>Last Name *</label>
                                            <input type="text" placeholder="Last Name" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Username *</label>
                                    <input type="text" placeholder="@username" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email Address *</label>
                                    <input type="email" placeholder="example@domain.com" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>About You</label>
                                    <textarea class="form-control" placeholder="Enter about yourself"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text facebook"><i class="fab fa-facebook-f"></i><span>Facebook</span></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="facebook.com/username">
                                        </div>
                                    </div>
                                    <div class="col-md form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text linkedin"><i class="fab fa-linkedin-in"></i><span>Linkedin</span></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="linkedin.com/username">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text twitter"><i class="fab fa-twitter"></i><span>Twitter</span></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="twitter.com/username">
                                        </div>
                                    </div>
                                    <div class="col-md form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text instagram"><i class="fab fa-instagram"></i><span>Instagram</span></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="instagram.com/username">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="button">Update Profile</button>
                            </form>
                        </div>
                    </div>
                    <div class="dashboard-section dashboard-change-pass">
                        <div class="dashboard-section-title">
                            <h5>Change Password</h5>
                            <span class="ti-lock"></span>
                        </div>
                        <div class="dashboard-section-body">
                            <form>
                                <div class="form-group">
                                    <label>Current Password *</label>
                                    <input type="password" class="form-control" placeholder="Enter Old Password">
                                </div>
                                <div class="form-group">
                                    <label>New Password *</label>
                                    <input type="password" class="form-control" placeholder="Enter New Password">
                                </div>
                                <div class="form-group">
                                    <label>Retype Password *</label>
                                    <input type="password" class="form-control" placeholder="Retype New Password">
                                </div>
                                <button type="submit" class="button">Update Password</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 order-lg-1">
                    <div class="lst-dash-user-profile">
                        <div class="thumb">
                            <img src="dashboard/images/dash-author.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="profile-body">
                            <h4>Steve Aldridge</h4>
                            <span>@username</span>
                            <span class="pro"><i class="fas fa-bookmark"></i>Pro User</span>
                        </div>
                    </div>
                    <div class="lst-dash-side-nav">
                        <ul class="dashboard-nav" id="dashboard-nav">
                            <li class="navigation-item">
                                <a href="dashboard.html"><i class="fas fa-home"></i>Dashboard</a>
                            </li>
                            <li class="navigation-item">
                                <a href="edit-profile.html" class="active"><i class="fas fa-user"></i>Edit Profile</a>
                            </li>
                            <li class="navigation-item dropdown">
                                <a href="#"><i class="fas fa-bolt"></i>My Listing</a>
                                <ul class="dropdown-menu">
                                    <li><a href="all-listing.html">All Listing</a></li>
                                    <li><a href="all-listing.html">Active Listing</a></li>
                                    <li><a href="all-listing.html">Pending Listing</a></li>
                                    <li><a href="all-listing.html">Expired Listing</a></li>
                                </ul>
                            </li>
                            <li class="navigation-item">
                                <a href="dashboard-add-listing.html"><i class="fas fa-plus-circle"></i>Add Listing</a>
                            </li>
                            <li class="navigation-item">
                                <a href="bookmarked.html"><i class="fas fa-heart"></i>Bookmarked</a>
                            </li>
                            <li class="navigation-item">
                                <a href="#"><i class="fas fa-check-square"></i>Booking</a>
                            </li>
                            <li class="navigation-item">
                                <a href="message.html"><i class="far fa-comment-alt"></i>Messages</a>
                            </li>
                            <li class="navigation-item">
                                <a href="dashboard-pricing.html"><i class="fas fa-bell"></i>Pricing Table</a>
                            </li>
                            <li class="navigation-item">
                                <a href="review.html"><i class="fas fa-star"></i>Review</a>
                            </li>
                        </ul>
                        <a href="#" class="logout-button">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection