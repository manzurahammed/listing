$(document).ready(function () {
    var categroyID = ''
    var keywords = ''
    var listingAjaxFilter = function (param) {
        $.ajax({
            type: 'POST',
            url: '/searchmap',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data: {
                type: param.type,
                category_ID: param.categroy,
                keywords: param.keywords,
                location: param.location,
                radius: param.radius,
            },
            success: function (response) {
                console.log(response)
                $('#listingsearchresults').html(response.markup)
                liefletMapInIt()
            },
        })
    }
    // ajax serach
    $('#ajaxsearch').on('click', function (e) {
        e.preventDefault()
        keywords = $('.searchkeyword').val()
        categroyID = $('.searchcategory').val()
        listingAjaxFilter({
            type: 'searchandfilter',
            categroy: categroyID,
            keywords: keywords,
        })
    })
    // category filter
    $('#categoryfilter').on('change', function (e) {
        categroyID = e.target.value
        listingAjaxFilter({
            type: 'searchandfilter',
            categroy: categroyID,
            keywords: keywords,
        })
    })

    /*-------------------------------------------
      Redius Search
	-------------------------------------------*/
    // calculate distance
    function calcDistance(fromLat, fromLng, toLat, toLng) {
        return google.maps.geometry.spherical.computeDistanceBetween(
            new google.maps.LatLng(fromLat, fromLng),
            new google.maps.LatLng(toLat, toLng)
        )
    }
    // get user current location
    var currentLocation = null
    var rangeChangeFlag = false
    $('.nstSlider').nstSlider({
        left_grip_selector: '.leftGrip',
        value_changed_callback: function (cause, leftValue, rightValue) {
            $(this).parent().find('.leftLabel').text(leftValue)
            if (!rangeChangeFlag) {
                rangeChangeFlag = true
                if ('geolocation' in navigator) {
                    navigator.geolocation.getCurrentPosition(function (
                        position
                    ) {
                        var currentLatitude = position.coords.latitude
                        var currentLongitude = position.coords.longitude
                        currentLocation =
                            currentLatitude + ',' + currentLongitude
                    })
                }
                return
            }
            if (currentLocation != '') {
                listingAjaxFilter({
                    type: 'radius',
                    location: currentLocation,
                    radius: leftValue,
                })
            }
        },
    })
})
