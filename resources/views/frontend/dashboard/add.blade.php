@extends('frontend.dashboard.main')

@section('dashboard')



        <div class="dashboard-section dashboard-add-listing">
            <div class="dashboard-section-body">
                {{Form::open(['url' => 'listing/savelisting', 'method' => 'post','files' => true,'class'=>'post-listing'])}}
                    <div class="form-field basic-field">
                        <h4>Basic Informations</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Listing Title</label>
                                    <input type="text" required name="title" value="{{old('title')}}" class="form-control" placeholder="Ex: Golden Restuarant">
                                </div>
                                <div class="form-group">
                                    <label>Contact Email</label>
                                    <input type="email" required name="email" value="{{old('email')}}" class="form-control" placeholder="Ex: info@example.com">
                                </div>
                                <div class="form-group">
                                    <label>Location (Latitude)</label>
                                    <input type="text" required name="latitude" value="{{old('latitude')}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Website</label>
                                    <input type="text" name="website" value="{{old('website')}}" class="form-control" placeholder="http://">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Category *</label>
                                    {{Form::select('cat_id', $categories,old('cat_id'),['required'=>'required','class'=>'form-control select-category','id'=>'select-category'])}}
                                </div>
                                <div class="form-group">
                                    <label>Phone No </label>
                                    <input type="text" name="phone" value="{{old('phone')}}" class="form-control" placeholder="222-333-3232">
                                </div>
                                <div class="form-group">
                                    <label>Location (Longitude)</label>
                                    <input type="text" required name="longitude" value="{{old('longitude')}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Region</label>
                                    {{Form::select('city_id', $cities,old('city_id'),['required'=>'required','class'=>'form-control select-category','id'=>'select-category'])}}
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form-field information-field">
                        <h4>Details Informations</h4>
                        <div class="form-group">
                            <label>Description *</label>
                            <textarea name="description" class="form-control description-box">{{old('description')}}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Your Business video</label>
                                    <input type="text" name="video_url" value="{{old('video_url')}}" class="form-control" placeholder="Youtube Video URL">
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="amenities-block">
                                    <h5>Amenities</h5>
                                    @foreach ($amenities as $item)
                                        <div class="amenities">
                                            {{Form::checkbox('amenities[]', $item->id,old('amenities'),['id'=>$item->id,'class'=>'checkbox'])}}
                                            <label for="{{$item->id}}">
                                                <span></span> {{$item->name}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span class="label-cover">Feature Image</span>
                                    <label class="upload-file">
                                        <input accept="image/*" name="feature_image" type="file">
                                        <i class="far fa-image"></i>
                                        <span>Click here to upload file</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span class="label-cover">Gallery Image</span>
                                    <label class="upload-file">
                                        <input name="gallery_image[]" accept="image/*" multiple type="file">
                                        <i class="far fa-image"></i>
                                        <span>Click here to upload file</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="social-networks">
                            <h5>Social Networks</h5>
                            <div class="social-network-block">
                                <div class="form-group">
                                    <select name="social_icon[]" class="form-control add-social-link">
                                        <option value="">Select Network</option>
                                        <option value="facebook">Facebook</option>
                                        <option value="twitter">Twitter</option>
                                        <option value="linkedin">Linkedin</option>
                                        <option value="instagram">Instagram</option>
                                        <option value="pinterest">Pinterest</option>
                                    </select>
                                    <input type="text" name="social_url[]" placeholder="Enter Link" class="form-control social-link-input">
                                    <div class="delete">
                                        <i class="far fa-trash-alt"></i>
                                    </div>
                                </div>

                            </div>
                            <a href="#" class="button add-field-button">Add</a>
                        </div>
                    </div>
                    <div class="form-field business-field">
                        <h4>Business Hours</h4>
                        <div class="business-field-switch">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                <label class="custom-control-label" for="customSwitch1"></label>
                            </div>
                        </div>
                        <div class="office-hour-wrap">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Day</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Closed</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($days as $day)
                                <tr>
                                    <td>{{$day}}</td>
                                    <td>
                                        {{Form::text('start_time['.$day.']','',['class'=>'set-time'])}}
                                    <td>
                                        {{Form::text('end_time['.$day.']','',['class'=>'set-time'])}}
                                    </td>
                                    <td>
                                        <label for="{{$day}}">
                                            {{Form::checkbox('off_day['.$day.']', $day,'',['id'=>$day])}}
                                            <span></span>
                                        </label>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="button-area">
                        <button class="button">Save &amp; Preview</button>
                        <p>You must be <span>logged in</span> to add products.</p>
                    </div>
                {{Form::close()}}
        </div>
    </div>
@endsection