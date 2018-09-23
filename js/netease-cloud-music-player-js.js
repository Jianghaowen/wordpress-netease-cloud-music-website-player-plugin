 jQuery(document).ready(function () {
 jQuery("#music5").click(
    function(){
               jQuery("#music4").css('display','block');
               jQuery("#music5").css('display','none');
			   jQuery("#guan2").addClass('open');
                           jQuery("#guan2").removeClass('close');
    }
);
 jQuery("#guan2").click(
    function(){
               jQuery("#music4").css('display','none');
               jQuery("#music5").css('display','block');
			   jQuery("#guan2").removeClass('open');
                           jQuery("#guan2").addClass('close');
    }
);
});


