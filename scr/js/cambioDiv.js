jQuery(document).ready(function() {
    $(".oculto").hide();
    $("#div2").show();
    $(".MO").click(function(){
        var nodo = $(this).attr("href");

        if ($(nodo).is(":visible")){
            $(nodo).hide();
            return false;
        }else{
            $(".oculto").hide();
            $(nodo).fadeToggle( "slow" );
            return false;
        }
    });
});
