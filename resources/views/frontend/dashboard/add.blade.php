@extends('frontend.dashboard.main')

@section('dashboard')

    <div class="col-lg-9 order-lg-2">
        <div class="dashboard-section dashboard-add-listing">
            <div class="dashboard-section-body">
                <form action="#" class="post-listing">
                    <div class="form-field basic-field">
                        <h4>Basic Informations</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Listing Title *</label>
                                    <input type="text" class="form-control" placeholder="Ex: Golden Restuarant">
                                </div>
                                <div class="form-group">
                                    <label>Category *</label>
                                    <select class="form-control select-category" id="select-category">
                                        <option value="">Hotel & Restuarant</option>
                                        <option value="">Beauty & Spa</option>
                                        <option value="">Health & Medical</option>
                                        <option value="">Real Estate</option>
                                        <option value="">Food & Hotel</option>
                                        <option value="">Travel</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Contact Email *</label>
                                    <input type="email" class="form-control" placeholder="Ex: info@example.com">
                                </div>
                                <div class="form-group">
                                    <label>Phone No *</label>
                                    <input type="text" class="form-control" placeholder="222-333-3232">
                                </div>
                                <div class="form-group">
                                    <label>Website</label>
                                    <input type="text" class="form-control" placeholder="http://">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="cp-map listing-mark" id="location" data-lat="40.713355" data-lng="-74.005535" data-zoom="10"></div>
                                <div class="form-group">
                                    <label>Location (Full Address) *</label>
                                    <input type="text" class="form-control" placeholder="Find your place in Google map">
                                </div>
                                <div class="form-group">
                                    <label>Region *</label>
                                    <input type="text" class="form-control" placeholder="Select your listing region">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form-field information-field">
                        <h4>Details Informations</h4>
                        <div class="form-group">
                            <label>Description *</label>
                            <textarea class="form-control description-box"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Your Business video</label>
                                    <input type="text" class="form-control" placeholder="Youtube Video URL">
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="amenities-block">
                                    <h5>Amenities</h5>
                                    <div class="amenities">
                                        <input type="checkbox" checked name="check" id="check1" class="checkbox">
                                        <label for="check1">
                                            <span></span> Free Wifi
                                        </label>
                                    </div>
                                    <div class="amenities">
                                        <input type="checkbox" name="check" id="check2" class="checkbox">
                                        <label for="check2">
                                            <span></span> Free Parking
                                        </label>
                                    </div>
                                    <div class="amenities">
                                        <input type="checkbox" name="check" id="check3" class="checkbox">
                                        <label for="check3">
                                            <span></span> Child Zone
                                        </label>
                                    </div>
                                    <div class="amenities">
                                        <input type="checkbox" name="check" id="check4" class="checkbox">
                                        <label for="check4">
                                            <span></span>  Air Conditioned
                                        </label>
                                    </div>
                                    <div class="amenities">
                                        <input type="checkbox" name="check" id="check5" class="checkbox">
                                        <label for="check5">
                                            <span></span> Sport Zone
                                        </label>
                                    </div>
                                    <div class="amenities">
                                        <input type="checkbox" name="check" id="check6" class="checkbox">
                                        <label for="check6">
                                            <span></span> Music
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span class="label-cover">Company Logo *</span>
                                    <label class="upload-file">
                                        <input type="file">
                                        <i class="far fa-image"></i>
                                        <span>Click here or drop file to upload</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span class="label-cover">Cover Photo *</span>
                                    <label class="upload-file">
                                        <input type="file">
                                        <i class="far fa-image"></i>
                                        <span>Click here or drop file to upload</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="social-networks">
                            <h5>Social Networks</h5>
                            <div class="social-network-block">
                                <div class="form-group">
                                    <select class="form-control add-social-link">
                                        <option value="">Select Network</option>
                                        <option value="">Facebook</option>
                                        <option value="">Twitter</option>
                                        <option value="">Linkedin</option>
                                        <option value="">Google Plus</option>
                                        <option value="">Instagram</option>
                                        <option value="">Pinterest</option>
                                        <option value="">Reddit</option>
                                    </select>
                                    <input type="text" placeholder="Enter Link" class="form-control social-link-input">
                                    <div class="delete">
                                        <i class="far fa-trash-alt"></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select class="form-control add-social-link">
                                        <option value="">Select Network</option>
                                        <option value="">Facebook</option>
                                        <option value="">Twitter</option>
                                        <option value="">Linkedin</option>
                                        <option value="">Google Plus</option>
                                        <option value="">Instagram</option>
                                        <option value="">Pinterest</option>
                                        <option value="">Reddit</option>
                                    </select>
                                    <input type="text" placeholder="Enter Link" class="form-control social-link-input">
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
                                <tr>
                                    <td>Monday</td>
                                    <td><input type="text" class="set-time"></td>
                                    <td><input type="text" class="set-time"></td>
                                    <td><label for="monday"><input id="monday" type="checkbox"><span></span></label></td>
                                </tr>
                                <tr>
                                    <td>Tuesday</td>
                                    <td><input type="text" class="set-time"></td>
                                    <td><input type="text" class="set-time"></td>
                                    <td><label for="tuesday"><input id="tuesday" type="checkbox" checked><span></span></label></td>
                                </tr>
                                <tr>
                                    <td>Wednesday</td>
                                    <td><input type="text" class="set-time"></td>
                                    <td><input type="text" class="set-time"></td>
                                    <td><label for="wednesday"><input id="wednesday" type="checkbox"><span></span></label></td>
                                </tr>
                                <tr>
                                    <td>Thursday</td>
                                    <td><input type="text" class="set-time"></td>
                                    <td><input type="text" class="set-time"></td>
                                    <td><label for="thursday"><input id="thursday" type="checkbox"><span></span></label></td>
                                </tr>
                                <tr>
                                    <td>Friday</td>
                                    <td><input type="text" class="set-time"></td>
                                    <td><input type="text" class="set-time"></td>
                                    <td><label for="friday"><input id="friday" type="checkbox"><span></span></label></td>
                                </tr>
                                <tr>
                                    <td>Saturday</td>
                                    <td><input type="text" class="set-time"></td>
                                    <td><input type="text" class="set-time"></td>
                                    <td><label for="saturday"><input id="saturday" type="checkbox"><span></span></label></td>
                                </tr>
                                <tr>
                                    <td>Sunday</td>
                                    <td><input type="text" class="set-time"></td>
                                    <td><input type="text" class="set-time"></td>
                                    <td><label for="sunday"><input id="sunday" type="checkbox"><span></span></label></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="button-area">
                        <button class="button">Save &amp; Preview</button>
                        <p>You must be <span>logged in</span> to add products.</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection