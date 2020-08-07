$(document).ready(function () {
    'use strict'

    function initialize() {
        $('.cp-map').each(function (index) {
            //Taking data attribute from map wrapper
            var mapLat = parseFloat($(this).data('lat'))
            var mapLng = parseFloat($(this).data('lng'))
            var mapZoom = parseInt($(this).data('zoom'))
            var mapType = $(this).data('maptype')

            var container = L.DomUtil.get('location')
            if (container != null) {
                container._leaflet_id = null
            }

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

            var map = L.map('location', {
                center: latlng,
                zoom: 14,
                scrollWheelZoom: false,
                layers: [tiles],
            })

            L.marker([mapLat, mapLng]).addTo(map)
        })
    }
    initialize()

    $('#listingModal').on('shown.bs.modal', function () {
        initialize()
    })
})
