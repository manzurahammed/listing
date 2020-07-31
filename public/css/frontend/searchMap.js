function liefletMapInIt() {
    if (document.getElementById('searchmap') != null) {
        var container = L.DomUtil.get('searchmap')
        if (container != null) {
            container._leaflet_id = null
        }
        L.HtmlIcon = L.Icon.extend({
            options: {},

            initialize: function (options) {
                L.Util.setOptions(this, options)
            },

            createIcon: function () {
                var div = document.createElement('div')
                div.innerHTML = this.options.html
                if (div.classList) div.classList.add('leaflet-marker-icon')
                else div.className += ' ' + 'leaflet-marker-icon'
                return div
            },

            createShadow: function () {
                return null
            },
        })

        var tiles = L.tileLayer(
                'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}',
                {
                    attribution:
                        'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                    maxZoom: 18,
                    id: 'mapbox/streets-v11',
                    tileSize: 512,
                    zoomOffset: -1,
                    accessToken:
                        'pk.eyJ1IjoidHVzaGFyOTkwOSIsImEiOiJja2QxanV1NzIwNGJmMnpueG50dGtzZmlwIn0.5pTJYB1OzUhkO7k357E1Ww',
                }
            ),
            latlng = L.latLng(40.716593, -74.0012097)

        var map = L.map('searchmap', {
            center: latlng,
            zoom: 14,
            scrollWheelZoom: false,
            layers: [tiles],
        })

        // cluster marker icon
        // var markers = L.markerClusterGroup();
        var markers = L.markerClusterGroup({
            scrollWheelZoom: false,
            showCoverageOnHover: false,
            maxClusterRadius: 10,
            iconCreateFunction: function (cluster) {
                return L.divIcon({
                    html:
                        '<div class="markerclusergroupicon"><span class="number">' +
                        cluster.getChildCount() +
                        '</span><div>',
                    className: 'mycluster',
                })
            },
        })

        // get all address from listing single
        var addressPoints = document.getElementsByClassName('lrn-listing-wrap')

        if (addressPoints.length > 0) {
            for (var i = 0; i < addressPoints.length; i++) {
                var markerContent = document.getElementsByClassName(
                    'lrn-listing-wrap'
                )
                // content
                if (jQuery(addressPoints[i]).data('mapicon') != undefined) {
                    var iconContentPopUp = new L.HtmlIcon({
                        html:
                            "<div class='marker mcn" +
                            jQuery(addressPoints[i]).data('postid') +
                            "' data-markerid=" +
                            jQuery(addressPoints[i]).data('postid') +
                            "><div class='markerimage'><img src='" +
                            jQuery(addressPoints[i]).data('mapicon') +
                            "' alt='icon' /></div></div>",
                        markerid:
                            '' + jQuery(addressPoints[i]).data('postid') + '',
                    })
                } else {
                    var iconClassName = jQuery(addressPoints[i]).data(
                        'iconclass'
                    )
                    var iconContentPopUp = new L.HtmlIcon({
                        html:
                            "<div class='marker mcn" +
                            jQuery(addressPoints[i]).data('postid') +
                            "' data-markerid=" +
                            jQuery(addressPoints[i]).data('postid') +
                            "><div class='markericon'><span class='icon' style='background: " +
                            jQuery(addressPoints[i]).data('iconcolor') +
                            "'><i class='" +
                            iconClassName.replace('_', ' ') +
                            "'></i></span></div></div>",
                        markerid:
                            '' + jQuery(addressPoints[i]).data('postid') + '',
                    })
                }
                //
                markers.on('clusterclick', function () {
                    var iconContentPopUp = new L.HtmlIcon({
                        html:
                            '<div class=marker mcn' +
                            jQuery(addressPoints[i]).data('postid') +
                            ' data-markerid=' +
                            jQuery(addressPoints[i]).data('postid') +
                            '></div>',
                        markerid:
                            '' + jQuery(addressPoints[i]).data('postid') + '',
                    })
                })
                // update map position
                map.panTo(
                    new L.LatLng(
                        jQuery(addressPoints[0]).data('latitude'),
                        jQuery(addressPoints[0]).data('longitude')
                    )
                )
                var popupInfo = markerContent[i]
                var marker = L.marker(
                    new L.LatLng(
                        jQuery(addressPoints[i]).data('latitude'),
                        jQuery(addressPoints[i]).data('longitude')
                    ),
                    { icon: iconContentPopUp }
                )
                marker.bindPopup(popupInfo.cloneNode(true), {
                    minWidth: 370,
                    offset: new L.Point(0, -200),
                })
                markers.addLayer(marker)
            }
            map.addLayer(markers)
        }
    }
}

liefletMapInIt()

$(document).ready(function () {
    var currentLocation
    if (navigator.geolocation) {
        currentLocation = navigator.geolocation.getCurrentPosition(function (
            position
        ) {
            jQuery('.lrn-listing-wrap').each(function (index, item) {
                jQuery(item)
                    .find('.locationroute')
                    .html(
                        '<a target="_blank" href="https://www.google.es/maps/dir/' +
                            position.coords.latitude +
                            ',' +
                            position.coords.longitude +
                            '/' +
                            $(item).data('latitude') +
                            ',' +
                            $(item).data('longitude') +
                            '">Get Directions</a>'
                    )
            })
        })
    }

    // ;
})
