<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @since      2.0.10
 *
 * @package    WHMC
 * @subpackage WHMC/admin
 */

class whmcmiscellaneousLite
{

    /**
     * The ID of this plugin.
     *
     * @since    2.0.10
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */

    public function __construct()
    {
        add_action('admin_init', array(
            $this,
            'whmc_whmcmiscellaneous'
        ));

    }

    public function whmc_whmcmiscellaneous()
    {

        register_setting("whmcmiscellaneous", "whmcmiscellaneous");
        

        add_settings_section("notification_section_setting", " ", array(
            $this,
            'settting_sec_func'
        ) , 'whmcmiscellaneous_secs');


        add_settings_field("rmeoveajaxonsingle", esc_html__("Remove Ajax for Single Product Page", "mini-cart-for-woocommerce").'<sup class="whmcnews">New</sup>' , array(
            $this,
            "rmeoveajaxonsingle"
        ) , 'whmcmiscellaneous_secs', "notification_section_setting");



    
    }

    /**
     * This function is a callback function of  add seeting section
     */

    public function settting_sec_func()
    {

        return true;
    }

    public function rmeoveajaxonsingle()
    {

        $notifications = get_option('whmcmiscellaneous');
        printf('<input type="checkbox" name="whmcmiscellaneous[rmeoveajaxonsingle]" class="whmc_apple-switch" id="rmeoveajaxonsingle" value="rmeoveajaxonsingle" %s >', (isset($notifications['rmeoveajaxonsingle']) && $notifications['rmeoveajaxonsingle'] == 'rmeoveajaxonsingle') ? 'checked' : '');

    }


}

if(class_exists('whmcmiscellaneousLite')){

    new whmcmiscellaneousLite;
}