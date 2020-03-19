@extends('frontend.dashboard.main')

@section('dashboard')

    <div class="dashboard-section dashboard-my-profile">
        <div class="dashboard-section-title">
            <h5>Profile Details</h5>
            <span class="ti-user"></span>
        </div>
        <div class="dashboard-section-body">
            {!! Form::model($users, ['route' => ['listing.profile', $users->id], 'method' => 'put','files' => true]) !!}
                <div class="row">
                    <div class="col">
                        <div class="upload-profile-photo">
                            <div class="update-photo">
                                @php ($image = 'upload/'.$users->image)
                                {{Html::image($image,'profile picture',array('class' => 'image'))}}
                            </div>
                            <div class="file-upload">
                                <input type="file" name="image" class="file-input">Change
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Name *</label>
                    <input type="text" name="name" value="{{$users->name}}" placeholder="Name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email Address *</label>
                    <input type="email" name="email" value="{{$users->email}}" placeholder="example@domain.com" class="form-control">
                </div>
                <div class="form-group">
                    <label>About You</label>
                    <textarea class="form-control" name="bio" placeholder="Enter about yourself">{{$users->bio}}</textarea>
                </div>
                <button type="submit" class="button">Update Profile</button>
            {{Form::close()}}
        </div>
    </div>
@endsection