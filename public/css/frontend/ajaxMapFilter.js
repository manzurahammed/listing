$(document).ready(function () {
    var categroyID = ''
    var listingAjaxFilter = function (categroyID) {
        $.ajax({
            type: 'POST',
            url: '/searchmap',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data: {
                category_ID: categroyID,
            },
            success: function (response) {
                $('#listingsearchresults').html(response.markup)
                liefletMapInIt()
            },
        })
    }

    $('#categoryfilter').on('change', function (e) {
        categroyID = e.target.value
        listingAjaxFilter(categroyID)
    })

    //

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
    $('#get_location').on('click', function () {
        var currentAction = $(this)
        if ('geolocation' in navigator) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var currentLatitude = position.coords.latitude
                var currentLongitude = position.coords.longitude
                currentLocation = currentLatitude + ',' + currentLongitude
                $(currentAction).parent().addClass('active')
            })
        }
        $('#resetfilter').removeClass('disabled')
    })
})
