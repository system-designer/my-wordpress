jQuery(document).ready(function () {
    jQuery('.mg-form-submit #save').click(function () {
        var x = document.forms["mg_form"]["mg_email"].value;
        var y = document.forms["mg_form"]["mg_name"].value;
        var atpos = x.indexOf("@");
        var dotpos = x.lastIndexOf(".");
        if ((atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) || (y.length < 2)) {
            if (y.length < 2) {
                document.getElementById("mg_show_name_msg").innerHTML = "Name required !";
                document.getElementById("mg_show_name_msg").style.margin = "5px 0 -5px";
                document.forms["mg_form"]["mg_name"].focus();
                return false;
            }
            document.getElementById("mg_show_msg").innerHTML = "valid email required !";
            document.getElementById("mg_show_msg").style.margin = "5px 0 -5px";
            document.forms["mg_form"]["mg_email"].focus();
            return false;
        } else {
            jQuery('#mg_form_loading_img').show();
            var data = {
                'action': 'formget_mailget_form_action',
                'mg_email': x,
                'mg_name': y,
                'mg_nonce': mg.mg_nonce
            };
            // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
            jQuery.post(mg.ajaxurl, data, function (response) {
				var success = jQuery('#mg_form_wraper_div');
                var form_height = jQuery('#mg_wrapper_right').height() - 70;
                success.empty().fadeIn();
                success.html('<div style="height:' + form_height + 'px;margin-top:120px;"><center><p><strong>Your Message Submitted Successfully.</strong></p><br></center></div>');
                success.fadeIn();
            });
        }
    });
});
jQuery(document).ready(function () {
    jQuery('#mg_header_right').click(function () {
        jQuery("#mg_box").toggleClass('popup').fadeIn('normal');
    });
    jQuery('.mg-form-slide-close').click(function () {
        jQuery("#mg_box").toggleClass('popup').fadeIn('normal');
    });
    jQuery('#mg_email').click(function () {
        jQuery("#mg_show_msg").empty().css('margin', '0');
    });
    jQuery('#mg_name').click(function () {
        jQuery("#mg_show_name_msg").empty().css('margin', '0');
    });
    setTimeout(function () {
        jQuery("#mg_box").css('visibility', 'visible');
        jQuery('#mg_box').addClass('bounceInRight');
    }, 3000);
    var form_height = jQuery('#mg_wrapper_right').height();
    setTimeout(function () {
        var he = jQuery('#mg_header_right').height() + 10;
        var net_height = form_height / 2 - he / 2;
        jQuery('#mg_header_right').css('margin-top', net_height);
    }, 1500);
});