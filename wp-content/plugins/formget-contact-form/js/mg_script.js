jQuery(document).ready(function () {
    jQuery('.mg-group').hide();
    jQuery('#mg_subscribe_content').css("display", "block");

    jQuery('#mg_subscribe_tab').click(function () {
        jQuery('.mg-group').hide();
        jQuery('.nav-tab').removeClass('nav-tab-active');
        jQuery(this).addClass('nav-tab-active');
        jQuery('#mg_subscribe_content').css("display", "block");
    });

    jQuery('#mg_mailget_tab').click(function () {
        jQuery('.mg-group').hide();
        jQuery('.nav-tab').removeClass('nav-tab-active');
        jQuery(this).addClass('nav-tab-active');
        jQuery('#mg_mailget_content').css("display", "block");
    });

    jQuery('#mg_setting_tab').click(function () {
        jQuery('.mg-group').hide();
        jQuery('.nav-tab').removeClass('nav-tab-active');
        jQuery(this).addClass('nav-tab-active');
        jQuery('#mg_setting_content').css("display", "block");
    });

    jQuery('#mg_help_tab').click(function () {
        jQuery('.mg-group').hide();
        jQuery('.nav-tab').removeClass('nav-tab-active');
        jQuery(this).addClass('nav-tab-active');
        jQuery('#mg_help_content').css("display", "block");

    });
    jQuery('#submit_mg_api_key').click(function () {
		jQuery("#mg_loading_img").show();
        jQuery("#mg_error_box").hide();
        var data = {
            'action': 'formget_mailget_display_contact_lists',
            'mg_api_key': jQuery('#mg_api_key').val(),
            'mg_option_nonce': mg_option.mg_option_nonce
        };

        // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
        jQuery.post(ajaxurl, data, function (response) {
		    var data = JSON.parse(response);
			if (data.error) {
                jQuery("#mg_error_box").show();
                jQuery("#mg_loading_img").hide();
                jQuery("#mg_contact_list_id option").remove();
            } else if (data.result) {
                jQuery("#mg_loading_img").hide();
                jQuery("#mg_error_box").hide();
                jQuery('#mg_contact_list_id').html(data.result);
            }
        });
    });

    jQuery('#submit_mg_contact_list_id').click(function () {
        var data = {
            'action': 'formget_mailget_save_contact_list_id',
            'mg_contact_list_id': jQuery('#mg_contact_list_id').val(),
            'mg_option_nonce': mg_option.mg_option_nonce
        };
        // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
        jQuery.post(ajaxurl, data, function (response) {
			var success = jQuery('#mg_msg_popup_list_option');
            var maskWidth = jQuery(window).width();
            var maskHeight = jQuery(window).height();
            var dialogLeft = (maskWidth / 2) - (success.width()) / 2;
            var dialogTop = (maskHeight / 2) - (success.width()) / 2;
            success.css({top: dialogTop, left: dialogLeft, position: 'fixed'});
            mg_popup(success, 2000);
        });
    });

    jQuery('#submit_mg_options').click(function () {

        var checkedValues = jQuery('input[name=checkbox]:checkbox:checked').map(function () {
            return this.value;
        }).get();
        var mgswitch = jQuery('input[name=mg_switch]:checkbox:checked').map(function () {
            return this.value;
        }).get();
		 var data = {
            'action': 'formget_mailget_save_options',
            'mg_switch': mgswitch,
            'mg_form_slide_text': jQuery('#mg_form_slide_text').val(),
            'mg_form_heading_text': jQuery('#mg_form_heading_text').val(),
            'mg_form_description_text': jQuery('#mg_form_description_text').val(),
            'mg_form_sbmt_text': jQuery('#mg_form_sbmt_text').val(),
            'mg_selected_page_id': checkedValues,
            'mg_option_nonce': mg_option.mg_option_nonce
        };
	    // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
        jQuery.post(ajaxurl, data, function (response) {
			var success = jQuery('#mg_msg_popup_option');
            var maskWidth = jQuery(window).width();
            var maskHeight = jQuery(window).height();
            var dialogLeft = (maskWidth / 2) - (success.width()) / 2;
            var dialogTop = (maskHeight / 2) - (success.width()) / 2;
            success.css({top: dialogTop, left: dialogLeft, position: 'fixed'});
            mg_popup(success, 2000);
        });
    });
    jQuery('#mg_form_heading_text').click(function () {
        mg_popup('#mg_form_heading_help', 3000);
    });
    jQuery('#mg_form_description_text').click(function () {
        mg_popup('#mg_form_description_help', 3000);
    });
    jQuery('#mg_form_slide_text').click(function () {
        mg_popup('#mg_form_slide_help', 3000);
    });
    jQuery('#mg_form_sbmt_text').click(function () {
        mg_popup('#mg_form_sbmt_help', 3000);
    });
    function mg_popup(mg_id, mg_time) {
        var success = jQuery(mg_id);
        success.fadeIn();
        window.setTimeout(function () {
            success.fadeOut();
        }, mg_time);
    }
     jQuery(".list-img").show();
     jQuery("#submit_mg_contact_list_id").hide();
    var list_data = {
        'action': 'formget_mailget_display_contact_lists',
        'mg_api_key': jQuery('#mg_api_key').val(),
        'mg_option_nonce': mg_option.mg_option_nonce
    };
    jQuery.post(ajaxurl, list_data, function (response) {
        var list_data = JSON.parse(response);
		if (list_data.error) {
            jQuery(".list-img").hide();
            jQuery("#mg-error-box").show();
            jQuery("#submit_mg_contact_list_id").show();
        } else if (list_data.result) {
            jQuery(".list-img").hide();
            jQuery("#submit_mg_contact_list_id").show();
            jQuery('#mg_contact_list_id').html(list_data.result);
        } else if (list_data.new) {
            jQuery(".list-img").hide();
            jQuery("#submit_mg_contact_list_id").show();
        }
    });

});