$(document).ready(function () {
    var categroyID = ''
    var keywords = ''
    var listingAjaxFilter = function (categroyID, keywords) {
        $.ajax({
            type: 'POST',
            url: '/searchmap',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data: {
                category_ID: categroyID,
                keywords: keywords,
            },
            success: function (response) {
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
        listingAjaxFilter(categroyID, keywords)
    })
    // category filter
    $('#categoryfilter').on('change', function (e) {
        categroyID = e.target.value
        listingAjaxFilter(categroyID, keywords)
    })
})
