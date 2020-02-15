var ajaxUrl = 'http://localhost:8000/';

$.ajaxSetup(
{
    headers:
    {
        'X-CSRF-Token': $('input[name="_token"]').val()
    }
});

var SummernoteDemo = function () {    
    //== Private functions
    var demos = function () {
        $('.summernote').summernote({
            height: 150, 
        });
    }

    return {
        // public functions
        init: function() {
            demos(); 
        }
    };
}();

function select2load(){
    $('.m-select2').select2({
        placeholder: "Select a Option"
    });
}

//== Initialization
jQuery(document).ready(function() {
    SummernoteDemo.init();
    select2load();

    $(".number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

    $(document).on('change','#cateWithpPaper',function(){
        var id = $(this).val();
        if(id>0){
            $.ajax({
                url: ajaxUrl+'getpaperlisrt',
                method: 'POST',
                data: {id:id},
                cache: false,
                success: function(data) {
                    $("#catPaperList").html(data);
                    select2load();
                },
                error: function(data) {  
                    console.log(data)          
                }
            });
        }else{
            alert('Wrong ID');
        }
    });

    $(document).on('change','.user-status',function(){
        var value = 0;
        var id = $(this).data('id');
        if($(this).prop('checked') == true){
            value = 1;
        }
        $.ajax({
            url: ajaxUrl+'updatestatus',
            method: 'POST',
            data: {id:id,value:value},
            cache: false,
            success: function(data) {
               if(data.status){
                    if(value){
                       toastr.success("User Active"); 
                   }else{
                        toastr.error("User Deactive");
                   }
               }
            },
            error: function(data) {
                console.log(data)          
            }
        });
    });

    $(document).on('change','.show_nav',function(){
        var value = 0;
        var id = $(this).data('id');
        if($(this).prop('checked') == true){
            value = 1;
        }
        $.ajax({
            url: ajaxUrl+'show_nav',
            method: 'POST',
            data: {id:id,value:value},
            cache: false,
            success: function(data) {
               if(data.status){
                   toastr.success("Status Change");
               }
            },
            error: function(data) {
                console.log(data)          
            }
        });
    });

});