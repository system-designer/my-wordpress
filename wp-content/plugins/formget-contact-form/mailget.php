<?php
/*
 * Class to add MailGet Functionality  
 */

class mailGet {

    /*
     *  Generate MailGet Dashboard in admin panel
     */

    public function formget_mailget_interface() {
        ?>
        <div class="mg-main-container">
            <div id="mg_header">
                <div class="mg-logo">
                    <h2>Email Marketing</h2>
                </div>
                <div class="clear"></div>
            </div>
            <div class="mg-nav wrap" >
                <h2 class="nav-tab-wrapper">
                    <span id="mg_subscribe_tab" class="nav-tab nav-tab-active ">Subscription Form</span>
                    <span id="mg_mailget_tab" class="nav-tab">MailGet</span>
                    <span id="mg_setting_tab" class="nav-tab ">MailGet Form Settings</span>
                    <span id="mg_help_tab" class="nav-tab ">MailGet Help</span>
                </h2>
            </div>
            <div class="mg-content">
                <div class="mg-group" id="mg_subscribe_content">
                    <div class="mg-section section-text">
                        <h3 class="mg-heading">Setting for subscription Form</h3>
                    </div>
                    <div id="mg_msg_popup_option" class="mg-msg-popup-box" style="display: none;">Option Saved</div>
                    <div id = "mg_content_box">
                        <p class = "mg-box-text">Enable/Disable subscribe form</p>
                        <div class="mg-onoffswitch">
                            <input type="checkbox" name="mg_switch" class="mg-onoffswitch-checkbox" id="mg_switch" <?php echo (esc_html($this->formget_mailget_get_option('mg_switch')) == 'off') ? '' : 'checked'; ?>>
                            <label class="mg-onoffswitch-label" for="mg_switch">
                                <span class="mg-onoffswitch-inner"></span>
                                <span class="mg-onoffswitch-switch"></span>
                            </label>
                        </div>
                        <p class = "mg-box-text">Sliding Form Heading</p>
                        <div class="mg-form-text">
                            <input class = "mg-box-input" type = "text" name = "mg_form_slide_text" id = "mg_form_slide_text" value = "<?php echo esc_html($this->formget_mailget_get_option('mg_form_slide_text')); ?>" placeholder = "Subscribe Now!" />
                            <div id="mg_form_slide_help" class="mg-form-help-box" style="display: none;">Enter the Sliding Tab text</div>
                        </div>
                        <p class="mg-box-text"><b>Heading and Description for subscription form</b></p>
                        <div class="mg-form-text">
                            <input class = "mg-box-input" type = "text" name = "mg_form_heading_text" id = "mg_form_heading_text" value = "<?php echo esc_html($this->formget_mailget_get_option('mg_form_heading_text')); ?>" placeholder = "Form Heading" />
                            <div id="mg_form_heading_help" class="mg-form-help-box" style="display: none;">Enter your Form Heading</div>
                        </div>
                        <div class="mg-form-text">
                            <textarea id="mg_form_description_text" name="mg_form_description_text" rows="4" placeholder="Form Description"><?php echo esc_html($this->formget_mailget_get_option('mg_form_description_text')); ?></textarea>
                            <div id="mg_form_description_help" class="mg-form-help-box" style="display: none;">Enter your Form Description</div>
                        </div>
                        <p class="mg-box-text"><b>Subscription Form Button Text</b></p>
                        <div class="mg-form-text">
                            <input class = "mg-box-input" type = "text" name = "mg_form_sbmt_text" id = "mg_form_sbmt_text" value = "<?php echo esc_html($this->formget_mailget_get_option('mg_form_sbmt_text')); ?>" placeholder = "Get It Now" />
                            <div id="mg_form_sbmt_help" class="mg-form-help-box" style="display: none;">Enter Submit button text</div>
                        </div>
                        <p class="mg-box-text"><b>Select the page in which you want to show "Contact Us" tab. By default it is visible on every page.</b></p>
                        <p><a target="new" href="http://www.formget.com/mailget/builder_login">Click here to signup on MailGet and get api key.</a></p>
                        <?php
                        global $wpdb;
                        $page_title = $wpdb->get_results("SELECT post_title, id FROM $wpdb->posts WHERE (post_type = 'page' AND post_status = 'publish')");
						$val = array();
                        $val = $this->formget_mailget_get_option('mg_selected_page_id');
						if (is_array($val) && count($val)>0 && in_array("home1", $val)) {
				        ?>
                            <span id="mg_selected_box"><input id="mg_selected_box" type="checkbox" name="checkbox" value="home1" checked />Home</span>
                        <?php } else {
                            ?>
                            <span id="mg_selected_box"><input id="mg_selected_box" type="checkbox" name="checkbox" value="home1" />Home</span>
                            <?php
                        }

                        foreach ($page_title as $title) {
                            ?>
                            <span id="mg_selected_box"><input id="mg_selected_box" type="checkbox" name="checkbox" value="<?php echo ($title->id); ?>" <?php echo (is_array($val) && count($val)>0 && in_array($title->id, $val)) ? 'checked' : ''; ?> /><?php echo ($title->post_title); ?> </span>
                        <?php }
                        ?>                         
                    </div>
                    <div class="mg-section section-text" style="height: 45px;margin-bottom: 0;">
                        <input type = "button" id="submit_mg_options" class = "button-primary mg-submit-btn" name = "submit_mg_options" value = "Save Option">
                    </div>
                </div>
                <div class="mg-group" id="mg_mailget_content">
                    <div class="mg-section section-text">
                        <h3 class="mg-heading"> Login to MailGet and generate Api key.</h3>
                        <iframe src="http://www.formget.com/mailget/builder_login/new_user" class="fbuild-iframe" name="iframe" style="width:1245px; height:900px; border:1px solid #dfdfdf;  align:center; overflow-y:scroll;" >
                        </iframe>
                    </div>
                </div>
                <div class="mg-group" id="mg_setting_content">
                    <div class="mg-section section-text">
                        <h3 class="mg-heading">Set all the setting for MailGet Popup Box</h3>
                    </div>
                    <div id="mg_content_box">
                        <p class="mg-box-text">Enter Your MailGet Api Key</p>
                        <input class="mg-box-input" id="mg_api_key" type="text" name="mg_api_key" value="<?php echo esc_html($this->formget_mailget_get_option('mg_api_key')); ?>" />
                        <input type="button" id="submit_mg_api_key" class="button-primary mg-submit-btn" name="submit_mg_api_key" value="Get List" /><span id="mg_loading_img_span"><img id="mg_loading_img" src="<?php echo esc_url(plugins_url('image/mg-ajax-loader.gif', __FILE__)); ?>" style="display: none"></span>
                    </div>
                    <span id='mg_error_box' style="display: none;">Invalid API Key</span>
                    <div id="mg_content_box">
                        <p class="mg-box-text">Select Your Contact List</p>
                        <select id="mg_contact_list_id" class="mg-box-input" name="mg_contact_list_id"></select>
                        <input type = "button" id="submit_mg_contact_list_id" class = "button-primary mg-submit-btn" name = "submit_mg_contact_list_id" value = "Save List" style="display: none;">
                        <span id="mg_loading_img_span"><img id="mg_loading_img" class = 'list-img' src="<?php echo esc_url(plugins_url('image/mg-ajax-loader.gif', __FILE__)); ?>" style="display: none"></span>
                    </div>
                    <div id="mg_msg_popup_list_option" class="mg-msg-popup-box" style="display: none;">List Saved</div>
                </div>
                <div class = "mg-group" id = "mg_help_content">
                    <div class="mg-section section-text">
                        <h3 class="mg-heading">To get MailGet api key, follow the steps below:</h3>
                    </div>
                    <div id="mg_content_box">
                        <div class="mg-help">
                        <ol>
                            <li>Signup On <a target="new" href="http://www.formget.com/mailget/builder_login">MailGet</a></li>
                            <li> After login, create a new list. For That go to <span class="mg-help-guide">contacts tab -> Add New List -> Enter the name of your list -> Add</span></li>
                            <p>Your list is created now.</p>
                            <li> Once you're done creating list, GoTo<span class="mg-help-guide"> Settings Tab -> INTEGRATIONS -> MailGet API</span></li>
                            <li> Now click on <span class="mg-help-guide">Regenerate</span> button you will get an <span class="mg-help-guide">API Key </span>. Copy the key code from the text field.</li>
                            <li> Now click on <span class="mg-help-guide">MailGet Form Setting</span> tab present at the left side of <span class="mg-help-guide">MailGet Help</span> tab. Enter your MAILGET api key and click <span class="mg-help-guide">Get List</span>.</li>
                            <li>When you click the button your list will appear. Now all you need to do is select the list in which you want to store your contact details and then click on <span class="mg-help-guide">Save list</span>.</li>
                            <p>Now your are done!. Whenever a user subscribes to your form his details get stored.</p>
                        </ol>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    /*
     *  Generate MailGet Popup on front-end
     */

    public function formget_mailget_subscribe_form() {
        $mg_api_key = $this->formget_mailget_get_option('mg_api_key');
        ?>
        <div id="mg_box" data-class="mg_slide_right" class="mg-css-anim-right mg-animated ">
            <div id="mg_header_right" class="mg-header-right" style="width: 20px; margin-top: 110px; right:0; background-color: rgb(23, 184, 111);">
                <span class="mg-header-title-right">
                    <img src="//www.formget.com/app/code/contact_tab?c=<?php echo ($this->formget_mailget_get_option('mg_form_slide_text') != '') ? $this->formget_mailget_get_option('mg_form_slide_text') : 'Subscribe Now!'; ?>&amp;t_color=ffffff&amp;b_color=17B86F&amp;f_size=16&amp;t_pos=right" alt="Subscribe Now!">
                </span>
            </div>
            <div id="mg_wrapper_right" class="mg-wrapper-right" style="width: 291px;">
                <?php if ($mg_api_key != '') { ?>
                    <span class="mg-form-slide-close"></span>
                    <div class="mg-form-wrapper" id="success_mg_form">
                        <div class="mg-form-column-two" id="mg_form_wraper_div">
                            <form class="view-mg-form" id="mg_form" method="post">
                                <ul id="unorder_list_container">
                                    <div class="view-header">
                                        <h2 id="mg_form_setting_para_1"><?php echo esc_html($this->formget_mailget_get_option('mg_form_heading_text')); ?></h2>
                                        <p id="mg_form_setting_para_2"><?php echo esc_html($this->formget_mailget_get_option('mg_form_description_text')); ?></p>
                                    </div>
                                    <li style="display:block;" class="inkdesk-mg-form" id="0" data-title="1">
                                        <div class="view-wrapper">
                                            <div class="mg-outlined">
                                                <input type="text" name="mg_name" id="mg_name" maxlength="" data-label="Name" placeholder="Name" required="" />
                                            </div>
                                            <span id="mg_show_name_msg"></span>
                                        </div>
                                    </li>
                                    <li style="display:block;" class="inkdesk-mg-form" id="1" data-title="2">
                                        <div class="view-wrapper" >
                                            <div class="mg-outlined">
                                                <input type="email" name="mg_email" id="mg_email" maxlength="" data-label="Email" placeholder="Email" required="" />
                                            </div>
                                            <span id="mg_show_msg"></span>
                                        </div>
                                    </li>
                                    <li class="mg-form-button" id="" data-title="Button">
                                        <input type="hidden" name="save">
                                        <span class="mg-form-submit">
                                            <input type="button" name="save" id="save" value="<?php echo ($this->formget_mailget_get_option('mg_form_sbmt_text') == '') ? 'Get It Now' : $this->formget_mailget_get_option('mg_form_sbmt_text'); ?>"/>
                                        </span>
                                    </li>
                                </ul>
                            </form> 
                            <center>
                                <a class="mg-powered-by" href="#" target="_blank"></a>
                                <br>
                                <img id="mg_form_loading_img" style="margin:5px auto;display:none" src="https://s3-us-west-2.amazonaws.com/formget/view-form/images/save_gif.gif">
                            </center>

                        </div> <!---form_column_two -->
                        <div class="clear"></div>  
                    </div>
                </div>
            <?php } else {
                ?>
                <style>
                    #mg_wrapper_right{
                        background-color: rgb(247, 247, 246);
                    }
                </style>
                <a href="http://www.formget.com/mailget/builder_login" target="_blank" style="display: inline-block"><img src="<?php echo esc_url(plugins_url('image/notice.png', __FILE__)); ?>" alt="Login into MailGet and get Api key" style="  margin-left: 10px;"/></a>
                <?php }
                ?>
        </div>
        <?php
    }

    /*
     *  Function to genarate contact list after MailGet api key saved
     */

    public function formget_mailget_display_contact_lists() {
       if (!check_ajax_referer('mg_option_nonce', 'mg_option_nonce') && !is_user_logged_in() && !current_user_can('manage_options')) {
        return;
        }
	    ob_clean();
        if (isset($_POST['mg_api_key']) && $_POST['mg_api_key'] != '') {
            $list = $this->formget_mailget_get_contact_lists(sanitize_text_field($_POST['mg_api_key']));
            if ($list == 'Invalid API Key') {
                $error = array('error' => 'Invalid API Key');
                $return_array = json_encode($error);
                echo $return_array;
                die();
            } else {
                $this->formget_mailget_save_api_key(sanitize_text_field($_POST['mg_api_key']));
            }
            if (!empty($list)) {
                $mg_contact_list_id = $this->formget_mailget_get_option('mg_contact_list_id');
                $result = "";
                foreach ($list as $list_arr_row) {
                    $selected = $mg_contact_list_id == $list_arr_row->list_id ? 'selected' : '';
                    $result .= "<option " . $selected . " value=" . $list_arr_row->list_id . ">" . $list_arr_row->list_name . "</option>";
                }
                echo json_encode(array('result' => $result));
            }
        } elseif ($_POST['mg_api_key'] == '') {
            $error = array('error' => 'Invalid API Key');
            $mg_contact_list_id = $this->formget_mailget_get_option('mg_contact_list_id');
            if ($mg_contact_list_id == '') {
                $error = array('new' => 'new');
            }
            $return_array = json_encode($error);
            echo $return_array;
            die();
        }
        die(); // this is required to terminate immediately and return a proper response
    }

    /*
     * Fucntion to get contact list from MailGet Api
     */

    public function formget_mailget_get_contact_lists($mg_api_key) {
        require_once('inc/mailget_curl.php');
        $list_arr = array();
        $mg_obj = new mailget_curl($mg_api_key);
        $list_arr = $mg_obj->get_list_in_json($mg_api_key);
        if (!empty($list_arr)) {
            return $list_arr;
        } else {
            return NULL;
        }
    }

    /*
     * Function to get options data from datebase
     * @param : $name
     */

    public function formget_mailget_get_option($name) {
        $options = get_option('mg_options');
		if (isset($options[$name])) {
            return $options[$name];
        }
    }

    /*
     * Function to update data to database
     * @param : $name
     * @param :$value
     */

    public function formget_mailget_update_option($name, $value) {
        $options = get_option('mg_options');
        $options[$name] = $value;
        update_option('mg_options', $options);
    }

    /*
     * Fucntion to save MailGet api key to database
     * @param : $mg_api_key
     */

    public function formget_mailget_save_api_key($mg_api_key) {
        $mg_old_option = $this->formget_mailget_get_option('mg_api_key');
        if ($mg_api_key !== '' || $mg_old_option != $mg_api_key) {
            $this->formget_mailget_update_option('mg_api_key', $mg_api_key);
        }
    }

    /*
     * Function To save list id to database
     */

    public function formget_mailget_save_contact_list_id() {
		if (!check_ajax_referer('mg_option_nonce', 'mg_option_nonce') && !is_user_logged_in() && !current_user_can('manage_options')) {
        return;
        }
        $mg_old_value = $this->formget_mailget_get_option('mg_contact_list_id');
		//echo "mg-list-id==".$_POST['mg_contact_list_id'];
		if (isset($_POST['mg_contact_list_id']) && $_POST['mg_contact_list_id'] != '' && ($mg_old_value != $_POST['mg_contact_list_id'])) {
            $this->formget_mailget_update_option('mg_contact_list_id', $_POST['mg_contact_list_id']);
            die();
        }
    }

    /*
     * Function To save subscribe form options
     */

    public function formget_mailget_save_options() {
        if (!check_ajax_referer('mg_option_nonce', 'mg_option_nonce') && !is_user_logged_in() && !current_user_can('manage_options')) {
            return;
        }
		$new_page_arr = array();
        $mg_old_val = get_option('mg_options');
		if (!isset($_POST['mg_switch'])) {
            $this->formget_mailget_update_option('mg_switch', 'off');
        } else {
            $this->formget_mailget_update_option('mg_switch', 'on');
        }
        if (isset($_POST['mg_selected_page_id'])) {
			$page_id = $_POST['mg_selected_page_id'];
			if(!empty($page_id) && is_array($page_id)){
				foreach($page_id as $key=>$val){
				$new_page_arr[ $key ] = ( isset( $page_id[ $key ] ) ) ?
sanitize_text_field( $val ) :
'';
				}
			}
			$this->formget_mailget_update_option('mg_selected_page_id', $new_page_arr);
        }
		
        if (isset($_POST['mg_form_slide_text']) && ($mg_old_val['mg_form_slide_text'] != $_POST['mg_form_slide_text'])) {
           	$this->formget_mailget_update_option('mg_form_slide_text', sanitize_text_field($_POST['mg_form_slide_text']));
        }
        if (isset($_POST['mg_form_heading_text']) && ($mg_old_val['mg_form_heading_text'] != $_POST['mg_form_heading_text'])) {
            $this->formget_mailget_update_option('mg_form_heading_text', sanitize_text_field($_POST['mg_form_heading_text']));
        }
        if (isset($_POST['mg_form_description_text']) && ($mg_old_val['mg_form_description_text'] != $_POST['mg_form_description_text'])) {
			$this->formget_mailget_update_option('mg_form_description_text', sanitize_text_field($_POST['mg_form_description_text']));
        }
        if (isset($_POST['mg_form_sbmt_text']) && ($mg_old_val['mg_form_sbmt_text'] != $_POST['mg_form_sbmt_text'])) {
			$this->formget_mailget_update_option('mg_form_sbmt_text', sanitize_text_field($_POST['mg_form_sbmt_text']));
        }
        die();
    }

    /*
     * Function to save data to MailGet contact list
     */

    public function formget_mailget_form_action() {
        require_once('inc/mailget_curl.php');
        if (!check_ajax_referer('mg_nonce', 'mg_nonce')) {
            return;
        }
        $mg_api_key = $this->formget_mailget_get_option('mg_api_key');
        $mg_contact_list_id = $this->formget_mailget_get_option('mg_contact_list_id');
		if (isset($_POST)) {
            $name = $_POST['mg_name'];
            $email = $_POST['mg_email'];
        } else {
            $name = '';
            $email = '';
        }
        if ($mg_api_key != '' && $mg_contact_list_id != '' && $name != '' && $email != '') {
            $mg_obj = new mailget_curl($mg_api_key);
            $mg_arr = array(array(
                    'name' => sanitize_text_field($name),
                    'email' => sanitize_email($email),
                    'get_date' => date('j-m-y'),
                    'ip' => ''
                )
            );
            $curt_status = $mg_obj->curl_data($mg_arr, $mg_contact_list_id, 'single');
        }
        die();
    }

}
