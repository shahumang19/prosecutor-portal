$(document).ready(function(e){
    //alert();
    $("#from").hide();
    $("#to").hide();
    $('#search_param').val($('#dft').html());

    $('.search-panel .dropdown-menu').find('a').click(function(e) {
        e.preventDefault();
        var param = $(this).attr("href").replace("#","");
        var concept = $(this).text();
        $('.search-panel span#search_concept').text(concept);
        //$('.input-group #search_param').val(param);
        $('#search_param').val(concept);
        
        if(concept == 'Date')
        {
            $("#from").show();
            $("#to").show();
            $("#sbar").hide();
        }
        else
        {
            $("#sbar").show();
            $("#from").hide();
            $("#to").hide();
        }

    });
});

