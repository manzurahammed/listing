@extends('frontend.dashboard.main')

@section('dashboard')

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
@endsection