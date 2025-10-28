<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @since      2.0.10
 *
 * @package    mini-cart-for-woocommerce
 * @subpackage mini-cart-for-woocommerce/admin
 */

class WHMC_Admin_Sidebar
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
            'whmc_sidepanel_settings_page'
        ));

    }

    public function whmc_sidepanel_settings_page()
    {

        register_setting("whmc_sidepanel", "whmc_sidepanel");

        add_settings_section("sidepanel_section_setting", " ", array(
        $this,
        'settting_sec_func'
        ) , 'whmc_admin_sec_sidepanel');


        add_settings_field("wmhc_sidebar_toppart", esc_html__("Top Part", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_sidebar_top"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmc_sidebar_top'
        ));
        add_settings_field("wmhc_remobetippar", esc_html__("Remove Top part", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_remobetippar"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");

        add_settings_field("wmhcside_toppart_bg", esc_html__("Top Background", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhcside_toppart_bg"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");

        add_settings_field("wmhc_sidebartop_icon", esc_html__("Top Icon", "mini-cart-for-woocommerce").'<sup class="whmcnews">New</sup>' , array(
        $this,
        "wmhc_top_icon"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmpropanel'
        ));

        add_settings_field("wmhcside_toppart_icon", esc_html__("Icon Color", "mini-cart-for-woocommerce") , array($this,"wmhcside_toppart_icon") , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array('class' => 'wmhcside_toppart_icon'
        ));
        add_settings_field("wmhcside_topcartcnt", esc_html__("Remove cart count", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhcside_topcartcnt"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");


        add_settings_field("wmhcside_toppartbbclr", esc_html__("Buble Background", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhcside_toppartbbclr"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'wmhcside_topcartcnt'
        ));

        add_settings_field("wmhcside_topbtxbclr", esc_html__("Buble Text Color", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhcside_topbtxbclr"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'wmhcside_topcartcnt'
        ));

        add_settings_field("wmhcside_toppartycart", esc_html__("Cart Heading", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhcside_toppartycart"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");

    add_settings_field("wmhcside_topclearcart", esc_html__("Remove Clear Cart Button", "mini-cart-for-woocommerce").'<sup class="whmcnewspro">PRO</sup>' , array($this,"wmhcside_topclearcart") , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array('class' => 'wmhcside_rvtoppat pomobles'));

        add_settings_field("wmhctopclearcartxt", esc_html__("Input Button Title", "mini-cart-for-woocommerce") , array($this,
        "wmhctopclearcartxt") , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array('class' => 'wmhctopclearcart wmhcside_rvtoppat pomobles'));


        add_settings_field("wmhctopclearcartbg", esc_html__("Clear Cart - Background", "mini-cart-for-woocommerce") , array($this,
        "wmhctopclearcartbg") , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array('class' => 'wmhctopclearcart wmhcside_rvtoppat pomobles'));


        add_settings_field("wmhctopclearcartclr", esc_html__("Clear Cart - Color", "mini-cart-for-woocommerce") , array($this,
        "wmhctopclearcartclr") , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array('class' => 'wmhctopclearcart wmhcside_rvtoppat pomobles'));

        add_settings_field("wmhc_sidebar_barpart", esc_html__("Reward Progress Bar", "mini-cart-for-woocommerce") , array(
            $this,
            "gereReward"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
            'class' => 'whmc_sidebar_top5'));
        add_settings_field("enablerewardbar", esc_html__("Enable Reward Bar", "mini-cart-for-woocommerce") , array(
            $this,
            "enablerewardbar"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");
        
        add_settings_field("wmhc_sidebar_rewarddiscount", esc_html__("Reward 1: Discount", "mini-cart-for-woocommerce") , array(
            $this,
            "wmhc_sidebar_rewarddiscount"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting" , array(
            'class' => 'whmc_rewradbar'
        ));        
        add_settings_field("wmhc_sidebar_freeship", esc_html__("Reward 2: Free Shipping", "mini-cart-for-woocommerce") , array(
            $this,
            "wmhc_sidebar_freeship"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting" , array(
            'class' => 'whmc_rewradbar'
        ));        
        add_settings_field("wmhc_rewardunlockmessage", esc_html__("Unlocking Messsage", "mini-cart-for-woocommerce") , array(
            $this,
            "wmhc_rewardunlockmessage"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting" , array(
            'class' => 'whmc_rewradbar'
        ));        
        add_settings_field("wmhc_rewardstyling", esc_html__("General Settings", "mini-cart-for-woocommerce") , array(
            $this,
            "wmhc_rewardstyling"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting" , array(
            'class' => 'whmc_rewradbar'
        )); 
        add_settings_field("wmhc_sidebar_top", esc_html__(" Middle Part", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_sidebar_top"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmc_sidebar_top2'
        ));



        add_settings_field("whmc_side_img_brious", esc_html__("Product Image Border Radius(px)", "mini-cart-for-woocommerce") , array(
        $this,
        "whmc_side_img_brious"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");

        add_settings_field("whmc_side_priceqty", esc_html__("Price Style", "mini-cart-for-woocommerce") , array(
        $this,
        "whmc_side_priceqty"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");


        add_settings_field("whmc_displaqtry", esc_html__("Enable Quantity box", "mini-cart-for-woocommerce").'<sup class="whmcnewspro">PRO</sup>' , array($this,"whmc_displaqtry"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array('class' => 'whmpropanel'
        ));
        add_settings_field("whmc_side_svaevlue", esc_html__("'Saving Text' for Discount product", "mini-cart-for-woocommerce").'<sup class="whmcnewspro">PRO</sup>' , array(
            $this,
            "whmc_side_svaevlue"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array('class' => 'whmpropanel'
        ));
        add_settings_field("whmc_svaevluft", esc_html__("Font Size (Save Value)", "mini-cart-for-woocommerce") , array(
        $this,
        "whmc_svaevluft"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmcvaluespos'
        ));

        add_settings_field("whmc_svaecolor", esc_html__("Color (Save Value)", "mini-cart-for-woocommerce") , array(
        $this,
        "whmc_svaecolor"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmcvaluespos'
        ));


        add_settings_field("whmc_qrtborder", esc_html__("Quantity Border Color", "mini-cart-for-woocommerce") , array(
        $this,
        "whmc_qrtborder"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmcqrtybox'
        ));


        add_settings_field("whmc_qrtborderradis", esc_html__("Quantity Border Radius(px)", "mini-cart-for-woocommerce") , array(
        $this,
        "whmc_qrtborderradis"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmcqrtybox'
        ));

        add_settings_field("wmhc_cart_side_text_color", esc_html__("Product Title Color", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_cart_side_text_color"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");

        add_settings_field("wmhc_cart_side_text_size", esc_html__("Product Title Font", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_cart_side_text_size"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");

        add_settings_field("wmhc_cart_side_price_color", esc_html__("Price Color", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_cart_side_price_color"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");
        add_settings_field("wmhc_cart_side_price_size", esc_html__("Price Font Size", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_cart_side_price_size"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");

       add_settings_field("wmhc_cart_stock", esc_html__("Display Stock Qty", "mini-cart-for-woocommerce").'<sup class="whmcnewspro">PRO</sup>', array(
            $this,
            "wmhc_cart_stock"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array('class' => 'pomobles'));

        add_settings_field("wmhc_stock_color", esc_html__("Stock Color", "mini-cart-for-woocommerce"), array(
            $this,
            "wmhc_stock_color"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array('class' => 'pomobles'));
       add_settings_field("wmhc_middleborderclr", esc_html__("Middle background", "mini-cart-for-woocommerce").'<sup class="whmcnews">New</sup>' , array(
            $this,
            "wmhc_middleborderclr"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");

       add_settings_field("wmhc_itemboxbg", esc_html__("Item box background", "mini-cart-for-woocommerce").'<sup class="whmcnews">New</sup>' , array(
            $this,
            "wmhc_itemboxbg"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");
        add_settings_field("wmhc_sidebar_bottom", esc_html__(" Bottom Part", "mini-cart-for-woocommerce") , array(
        $this,"wmhc_sidebar_bottom") , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array('class' => 'whmc_sidebar_top3'));

        add_settings_field("wmhc_bottomborder", esc_html__("Border", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_bottomborder"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");
        add_settings_field("wmhc_bottmborderclr", esc_html__("Border Color", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_bottmborderclr"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");

add_settings_field("wmhc_wrapper_bg", esc_html__("Bottom Background", "mini-cart-for-woocommerce") , array($this,"wmhc_wrapper_bg") , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");
        add_settings_field("wmhc_coupon_icons", esc_html__("Coupon icon", "mini-cart-for-woocommerce").'<sup class="whmcnewspro">PRO</sup>' , array(
        $this,
        "wmhc_coupon_icons"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmc_sidebar_copin pomobles'
        ));


        add_settings_field("wmhc_coupon_imodla", esc_html__("Coupon Modal", "mini-cart-for-woocommerce").'<sup class="whmcnewspro">PRO</sup>' , array(
        $this,
        "wmhc_coupon_imodla"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmc_sidebar_copin wmhcdiscount pomobles'
        ));


        add_settings_field("wmhc_cart_side_subtotal", esc_html__("Sub Total", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_cart_side_subtotal"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmc_sidebar_copin'
        ));

        add_settings_field("wmhc_cart_shipping", esc_html__("Shipping", "mini-cart-for-woocommerce").'<sup class="whmcnewspro">PRO</sup>' , array(
        $this,
        "wmhc_cart_shipping"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmc_sidebar_copin pomobles'
        ));

        add_settings_field("wmhcside_btm_shipping", esc_html__("Tax", "mini-cart-for-woocommerce").'<sup class="whmcnewspro">PRO</sup>' , array(
        $this,
        "wmhcside_btm_shipping"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmc_sidebar_copin pomobles'
        ));

        add_settings_field("wmhcside_btm_discount", esc_html__("Display Discount", "mini-cart-for-woocommerce").'<sup class="whmcnewspro">PRO</sup>' , array(
        $this,
        "wmhcside_btm_discount"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmc_sidebar_copin wmhcdiscount pomobles'
        ));
        add_settings_field("wmhc_cart_side_customtxt", esc_html__("Custom Text", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_cart_side_customtxt"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmc_sidebar_copin'
        ));
        add_settings_field("wmhcside_btm_total", esc_html__("Total ", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhcside_btm_total"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmc_sidebar_copin'
        ));

        add_settings_field("wmhc_cart_side_button_text_color", esc_html__("Checkout Button", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_cart_side_button_text_color"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmc_sidebar_copin'
        ));
        add_settings_field("wmhc_cart_viewcart", esc_html__("View Cart", "mini-cart-for-woocommerce").'<sup class="whmcnews">New</sup>' , array(
            $this,
            "wmhc_cart_viewcart"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array('class' => 'whmc_sidebar_copin'
        ));
        add_settings_field("wmhc_cart_side_text_change", esc_html__("Keep Shopping", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_cart_side_text_change"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmc_sidebar_copin'
        ));
        add_settings_field("wmhc_cart_emptycart", esc_html__("Empty Cart", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_cart_emptycart"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array(
        'class' => 'whmc_sidebar_copin'
        ));

        add_settings_field("wmhc_sidebar_gse", esc_html__("General Settings", "mini-cart-for-woocommerce") , array($this,"wmhc_sidebar_gse"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting", array('class' => 'whmc_sidebar_top4'));

        add_settings_field("wmhc_cart_side_position", esc_html__("Change sidebar position?", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_cart_side_position"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");

        add_settings_field("wmhcsidebaropstls", esc_html__("Sidebar Open Style", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhcsidebaropstls"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");

        add_settings_field("wmhcsidebarclstls", esc_html__("Sidebar Close Style", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhcsidebarclstls"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");


        add_settings_field("wmhc_cart_side_autup", esc_html__("Stop Auto Open?", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_cart_side_autup"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");


        add_settings_field("wmhcsidebarstyles", esc_html__("Sidebar Box Style", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhcsidebarstyles"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");




        add_settings_field("wmhc_wrapperloader", esc_html__("Loader", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_wrapperloader"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");


        add_settings_field("wmhc_locar", esc_html__("Loader Color", "mini-cart-for-woocommerce") , array(
        $this,
        "wmhc_locar"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");

        add_settings_field("wmhc_minicartsize", esc_html__("Width Of Sidebar", "mini-cart-for-woocommerce").'<sup class="whmcnews">New</sup>' , array(
            $this,
            "wmhc_minicartsize"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting");


        add_settings_field("wmhc_relatedproduct", esc_html__("Suggested Products", "mini-cart-for-woocommerce").'<sup class="whmcnewspro">PRO</sup>' , array(
            $this,
            "wmhc_relatedproduct"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting",  array('class'=>'whmc_sidebar_top6'));


        add_settings_field("wmhc_sidebar_relatedproduct", esc_html__("Cross-sell / Upsell / Suggested/Recommended Products", "mini-cart-for-woocommerce") , array(
            $this,
            "wmhc_sidebar_relatedproduct"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting",  array('class'=>'whmc_hideadvancesettings'));


        add_settings_field("wmhc_sidebar_hidepro", esc_html__("Hide Pro features from preview", "mini-cart-for-woocommerce") , array(
            $this,
            "wmhc_sidebar_hidepro"
        ) , 'whmc_admin_sec_sidepanel', "sidepanel_section_setting",  array('class'=>'remobedactive'));







    }

    public function wmhc_sidebar_hidepro(){
            $sidepanels = get_option('whmc_sidepanel');
        printf('<input type="checkbox" name="whmc_sidepanel[wmhc_hideallpro]" class="whmc_apple-switch"  value="wmhc_hideallpro" %s id="wmhc_hideallpro"><p>Click to hide Pro Features Settings and Preview</p>', (isset($sidepanels['wmhc_hideallpro']) && $sidepanels['wmhc_hideallpro'] == 'wmhc_hideallpro') ? 'checked' : '');

    }

    public function wmhc_minicartsize(){
        $sidepanels = get_option('whmc_sidepanel');

        $wmhc_minicartsize = isset($sidepanels['wmhc_minicartsize']) ? $sidepanels['wmhc_minicartsize'] : '400';
        $wmhc_minicartsizemob = isset($sidepanels['wmhc_minicartsizemob']) ? $sidepanels['wmhc_minicartsizemob'] : '400';

    printf('<input type="number" name="whmc_sidepanel[wmhc_minicartsize]" value="%s" id="wmhc_minicartsize">', esc_attr($wmhc_minicartsize));

    printf('<strong style="margin:0px 10px;"><label>Mobile</label><strong><input type="number" name="whmc_sidepanel[wmhc_minicartsizemob]" value="%s" id="wmhc_minicartsizemob">', esc_attr($wmhc_minicartsizemob));
    }
    /**
     * This function is a callback function of  add seeting section
     */
    public function gereReward()
    {
       echo '<p>'.esc_html('Customers will see a progress bar informing them when they qualify for a discount or free delivery based on their cart total.', 'mini-cart-for-woocommerce').'</p>
       <p>'.esc_html('You can activate either one or both bars. If both are active, the bar with the lower target amount appears first, and the higher target amount comes after.', 'mini-cart-for-woocommerce').'</p>';
    }
    public function wmhc_sidebar_bottom()
    {
        return true;
    }
    public function wmhc_sidebar_top()
    {
        return true;
    }
    public function wmhc_relatedproduct()
    {
        echo "<p><em>Note: Preview isn’t supported. Please view the frontend to see your changes in effect.</em><a href='https://woominicart.sharabindu.com/''>View Frontend Demo</a></p>";
    }

    public function wmhc_sidebar_gse()
    {
        return true;
    }
    public function settting_sec_func()
    {
        return true;
    }

    public function whmc_svaecolor(){
        $sidepanels = get_option('whmc_sidepanel');

        $whmc_svaecolor = isset($sidepanels['whmc_svaecolor']) ? $sidepanels['whmc_svaecolor'] : '#34dd16';

    printf('<input type="text" name="whmc_sidepanel[whmc_svaecolor]" value="%s"  class="side_bottom_color" id="whmc_svaecolor">', esc_attr($whmc_svaecolor));
    }

    public function wmhc_coupon_icons(){

        $whmc_coupon_icon = 'icon_d-1';
        $whmc_coupon_iconcolor = '#929292';
        $wmhc_applycoupon_value = esc_html__('Apply Coupon?','mini-cart-for-woocommerce');
    ?> 
    <ul class="whmc_ptc_wrape_tb"><li><strong class="whmc_ptc_tb"><label><?php echo esc_html('Choose a Icon','mini-cart-for-woocommerce') ?></label></strong>

    <select id="whmc_coupon_icon" class='default'>
    
     <option value="icon_d-1">icon 1</option>    
     <option value="icon_d-2">icon 2</option>    
    <option value="icon_d-4">icon 3</option>         
    <option value="icon_d-3">icon 4</option>         
    <option value="icon_d-5">icon 5</option>
    <option value="icon_d-7">icon 6</option>         
    <option value="icon_d-8">icon 7</option>         
    <option value="icon_d-9">iicon 8</option>         
    <option value="icon_d-10">icon 9</option>         
    <option value="icon_d-11">icon 10</option>     
    <option id="defaulrts" value="whmcNone">None</option>  

    </select></li>
    <?php

    printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Icon Color", "mini-cart-for-woocommerce").'</label></strong><input type="text" value="%s"  class="side_bottom_color" id="whmc_coupon_iconcolor"></li>', esc_attr($whmc_coupon_iconcolor));

    printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Text", "mini-cart-for-woocommerce").': </label></strong><input type="text"  value="%s"  placeholder="'.esc_html__('Apply Coupon?','mini-cart-for-woocommerce').'" id="wmhc_applycoupon_value"></li>', esc_attr($wmhc_applycoupon_value));

    printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Disable this field", "mini-cart-for-woocommerce").':</label></strong><input type="checkbox" class="whmc_apple-switch" id="wmhc_cart_coupon_remove"></li></ul>',);


    }

    public function wmhc_itemboxbg()
    {
        $sidepanels = get_option('whmc_sidepanel');
        $wmhc_itemboxbg = isset($sidepanels['wmhc_itemboxbg']) ? $sidepanels['wmhc_itemboxbg'] : '#ffffff';

        printf('<input type="text" name="whmc_sidepanel[wmhc_itemboxbg]" value="%s"  class="side_bottom_color" id="wmhc_itemboxbg">', esc_attr($wmhc_itemboxbg));
    }
    public function wmhc_middleborderclr()
    {
        $sidepanels = get_option('whmc_sidepanel');
        $wmhc_cart_side_border_btm = isset($sidepanels['wmhc_cart_side_border_btm']) ? $sidepanels['wmhc_cart_side_border_btm'] : '#f8f9fa';

        printf('<input type="text" name="whmc_sidepanel[wmhc_cart_side_border_btm]" value="%s"  class="side_bottom_color" id="wmhc_cart_side_border_btm">', esc_attr($wmhc_cart_side_border_btm));
    }
public function wmhcsidebarstyles(){

        $sidepanels = get_option('whmc_sidepanel');

        $wmhcsidebarstyles = isset($sidepanels['wmhcsidebarstyles']) ? $sidepanels['wmhcsidebarstyles'] : 'one'; ?>

<select name="whmc_sidepanel[wmhcsidebarstyles]" id="wmhcsidebarstyles">
    
     <option value="one" <?php
        echo esc_attr($wmhcsidebarstyles) == "one" ? 'selected' : '';?>>Full</option> 

    <option value="two" <?php
        echo esc_attr($wmhcsidebarstyles) == "two" ? 'selected' : '';?>>Small</option> 
        </select>   
        <?php
}
public function wmhcsidebarclstls(){

        $sidepanels = get_option('whmc_sidepanel');

        $wmhcsidebarclstls = isset($sidepanels['wmhcsidebarclstls']) ? $sidepanels['wmhcsidebarclstls'] : 'backSlideOut'; ?>

<select name="whmc_sidepanel[wmhcsidebarclstls]" id="wmhcsidebarclstls">
    
     <option value="backSlideOut" <?php
        echo esc_attr($wmhcsidebarclstls) == "backSlideOut" ? 'selected' : '';?>>Left Out</option> 
    
     <option value="backSlideOutRight" <?php
        echo esc_attr($wmhcsidebarclstls) == "backSlideOutRight" ? 'selected' : '';?>>Right Out</option>

    <option value="backTopOut" <?php
        echo esc_attr($wmhcsidebarclstls) == "backTopOut" ? 'selected' : '';?>>Top Out</option> 
    <option value="backBottomOut" <?php
        echo esc_attr($wmhcsidebarclstls) == "backBottomOut" ? 'selected' : '';?>>Bottom Out</option> 
        </select>   
        <?php
}public function wmhcsidebaropstls(){

        $sidepanels = get_option('whmc_sidepanel');

        $wmhcsidebaropstls = isset($sidepanels['wmhcsidebaropstls']) ? $sidepanels['wmhcsidebaropstls'] : 'backSlideIn'; ?>

<select name="whmc_sidepanel[wmhcsidebaropstls]" id="wmhcsidebaropstls">
    
     <option value="backSlideIn" <?php
        echo esc_attr($wmhcsidebaropstls) == "backSlideIn" ? 'selected' : '';?>>Left In</option> 
    
     <option value="backSlideRight" <?php
        echo esc_attr($wmhcsidebaropstls) == "backSlideRight" ? 'selected' : '';?>>Right In</option>

    <option value="backTopIn" <?php
        echo esc_attr($wmhcsidebaropstls) == "backTopIn" ? 'selected' : '';?>>Top In</option> 

    <option value="backBottomIn" <?php
        echo esc_attr($wmhcsidebaropstls) == "backBottomIn" ? 'selected' : '';?>>Bottom In</option> 
        </select>   
        <?php
}
public function wmhc_coupon_imodla(){

        $sidepanels = get_option('whmc_sidepanel');

        $whmc_coupon_icon = isset($sidepanels['whmc_coupon_modalicon']) ? $sidepanels['whmc_coupon_modalicon'] : 'icon_d-9';
        $whmc_coupon_position = isset($sidepanels['whmc_coupon_position']) ? $sidepanels['whmc_coupon_position'] : 'bottom';

        $whmc_cmoiconclr = isset($sidepanels['whmc_cmoiconclr']) ? $sidepanels['whmc_cmoiconclr'] : '#dd1313';        
        $whmccoupon_modalibg = isset($sidepanels['whmccoupon_modalibg']) ? $sidepanels['whmccoupon_modalibg'] : '#fff';
        $whmc_cmplacehlder = isset($sidepanels['whmc_cmplacehlder']) ? $sidepanels['whmc_cmplacehlder'] : 'Input coupon code';
        $whmc_cmbrnabel = isset($sidepanels['whmc_cmbrnabel']) ? $sidepanels['whmc_cmbrnabel'] : 'Apply';
        $whmc_cmbtnbg = isset($sidepanels['whmc_cmbtnbg']) ? $sidepanels['whmc_cmbtnbg'] : '#1851a7';
        $whmc_cppbrius = isset($sidepanels['whmc_cppbrius']) ? $sidepanels['whmc_cppbrius'] : '50';

    printf('<ul class="whmc_ptc_wrape_tb"><li><strong class="whmc_ptc_tb"><label>'.esc_html__("Placeholder Text", "mini-cart-for-woocommerce").'</label></strong><input type="text" name="whmc_sidepanel[whmc_cmplacehlder]" value="%s" id="whmc_cmplacehlder"></li>', esc_attr($whmc_cmplacehlder));

    printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Button Label", "mini-cart-for-woocommerce").'</label></strong><input type="text" name="whmc_sidepanel[whmc_cmbrnabel]" value="%s" id="whmc_cmbrnabel"></li>', esc_attr($whmc_cmbrnabel));    
    printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Button Background", "mini-cart-for-woocommerce").'</label></strong><input type="text" name="whmc_sidepanel[whmc_cmbtnbg]" value="%s"  class="side_bottom_color" id="whmc_cmbtnbg"></li>', esc_attr($whmc_cmbtnbg));

        printf('<li><strong class="whmc_ptc_tb"><label for="wmhc__text_size">'.esc_html__("Border Radius (px)", "mini-cart-for-woocommerce").'</label></strong><input type="range" name="whmc_sidepanel[whmc_cppbrius]" min="1" max="50" value="%s" oninput="wcppbrius.value = this.value" id="whmc_cppbrius"><output id="wcppbrius">%s<output></li>',esc_attr($whmc_cppbrius), esc_html($whmc_cppbrius));
    ?> 
    <li><strong class="whmc_ptc_tb"><label><?php echo esc_html('Icon before coupon Code?','mini-cart-for-woocommerce') ?></label></strong>

    <select id="whmc_coupon_modalicon"  class="default" name="whmc_sidepanel[whmc_coupon_modalicon]">
    
     <option value="whmcNone" <?php
        echo esc_attr($whmc_coupon_icon) == "whmcNone" ? 'selected' : '';?>>whmcNone</option>     
     <option value="icon_d-1" <?php
        echo esc_attr($whmc_coupon_icon) == "icon_d-1" ? 'selected' : '';?>>icon 1</option>       
     <option value="icon_d-2" <?php
        echo esc_attr($whmc_coupon_icon) == "icon_d-2" ? 'selected' : '';?>>icon 2</option>    

    <option value="icon_d-4" <?php
        echo esc_attr($whmc_coupon_icon) == "icon_d-4" ? 'selected' : '';?>>icon 3</option>         
    <option value="icon_d-3" <?php
        echo esc_attr($whmc_coupon_icon) == "icon_d-3" ? 'selected' : '';?>>icon 4</option>         
    <option value="icon_d-5" <?php
        echo esc_attr($whmc_coupon_icon) == "icon_d-5" ? 'selected' : '';?>>icon 5</option>              
    <option value="icon_d-7" <?php
        echo esc_attr($whmc_coupon_icon) == "icon_d-7" ? 'selected' : '';?>>icon 6</option>         
    <option value="icon_d-8" <?php
        echo esc_attr($whmc_coupon_icon) == "icon_d-8" ? 'selected' : '';?>>icon 7</option>         
    <option value="icon_d-9" <?php
        echo esc_attr($whmc_coupon_icon) == "icon_d-9" ? 'selected' : '';?>>icon 8</option>         
    <option value="icon_d-10" <?php
        echo esc_attr($whmc_coupon_icon) == "icon_d-10" ? 'selected' : '';?>>icon 9</option>         
    <option value="icon_d-11" <?php
        echo esc_attr($whmc_coupon_icon) == "icon_d-11" ? 'selected' : '';?>>icon 10</option>     


    </select></li>

    <li class="copcopos">
      <strong class="whmc_ptc_tb"><label><?php echo esc_html('Coupon Code Position','mini-cart-for-woocommerce') ?></label></strong>
  
<select name="whmc_sidepanel[whmc_coupon_position]" id="whmc_coupon_position">
    
     <option value="top" <?php
        echo esc_attr($whmc_coupon_position) == "top" ? 'selected' : '';?>>Top</option>
     <option value="bottom" <?php
        echo esc_attr($whmc_coupon_position) == "bottom" ? 'selected' : '';?>>Bottom</option>
    </select>

    </li>
    <?php

    printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Icon Color", "mini-cart-for-woocommerce").'</label></strong><input type="text" name="whmc_sidepanel[whmc_cmoiconclr]" value="%s"  class="side_bottom_color" id="whmc_cmoiconclr"></li>', esc_attr($whmc_cmoiconclr));

    printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Box Background", "mini-cart-for-woocommerce").'</label></strong><input type="text" name="whmc_sidepanel[whmccoupon_modalibg]" value="%s"  class="side_bottom_color" id="whmccoupon_modalibg"></li>', esc_attr($whmccoupon_modalibg));
    printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Hide all my coupons", "mini-cart-for-woocommerce").':</label></strong><input type="checkbox" name="whmc_sidepanel[wmhc_hideall_my_coupon]" class="whmc_apple-switch"  value="wmhc_hideall_my_coupon" %s id="wmhc_hideall_my_coupon"></li>', (isset($sidepanels['wmhc_hideall_my_coupon']) && $sidepanels['wmhc_hideall_my_coupon'] == 'wmhc_hideall_my_coupon') ? 'checked' : '');

    printf('<li class="rmimdhgr"><strong class="whmc_ptc_tb"><label>'.esc_html__("Remove Image", "mini-cart-for-woocommerce").':</label></strong><input type="checkbox" name="whmc_sidepanel[wmhc_cpnimgaehide]" class="whmc_apple-switch"  value="wmhc_cpnimgaehide" %s id="wmhc_cpnimgaehide"></li>', (isset($sidepanels['wmhc_cpnimgaehide']) && $sidepanels['wmhc_cpnimgaehide'] == 'wmhc_cpnimgaehide') ? 'checked' : '');

    printf('<li class="rmidesvbfd"><strong class="whmc_ptc_tb"><label>'.esc_html__("Remove coupon description", "mini-cart-for-woocommerce").':</label></strong><input type="checkbox" name="whmc_sidepanel[wmhc_hide_copnds]" class="whmc_apple-switch"  value="wmhc_hide_copnds" %s id="wmhc_hide_copnds"></li></ul>', (isset($sidepanels['wmhc_hide_copnds']) && $sidepanels['wmhc_hide_copnds'] == 'wmhc_hide_copnds') ? 'checked' : '');

    }



    public function wmhc_top_icon()
    {

        $options = get_option('whmc_sidepanel');;
        $fcp_top_icon = isset($options['fcp_top_icon']) ? $options['fcp_top_icon'] : 'fcp_icon_2';

    ?>
    <select id="fcp_top_icon"  class="default" name="whmc_sidepanel[fcp_top_icon]">
    <option value="whmcNone" selected>None</option>
    
    <option value="fcp_icon_1" <?php
        echo esc_attr($fcp_top_icon) == "fcp_icon_1" ? 'selected' : '';?>>fcp_icon_1</option>    
    <option value="fcp_icon_2" <?php
        echo esc_attr($fcp_top_icon) == "fcp_icon_2" ? 'selected' : '';?>>fcp_icon_2</option>    
    <option value="fcp_icon_3" <?php
        echo esc_attr($fcp_top_icon) == "fcp_icon_3" ? 'selected' : '';?>>fcp_icon_3</option>    
    <option value="fcp_icon_4" <?php
        echo esc_attr($fcp_top_icon) == "fcp_icon_4" ? 'selected' : '';?>>fcp_icon_4</option>    
    <option value="fcp_icon_5" <?php
        echo esc_attr($fcp_top_icon) == "fcp_icon_5" ? 'selected' : '';?>>fcp_icon_5</option>    
    <option value="fcp_icon_6" <?php
        echo esc_attr($fcp_top_icon) == "fcp_icon_6" ? 'selected' : '';?>>fcp_icon_6</option>    
    <option value="fcp_icon_7" <?php
        echo esc_attr($fcp_top_icon) == "fcp_icon_7" ? 'selected' : '';?>>fcp_icon_7</option>    
    <option value="fcp_icon_8" <?php
        echo esc_attr($fcp_top_icon) == "fcp_icon_8" ? 'selected' : '';?>>fcp_icon_8</option>

    <option value="fcp_icon_11" <?php
        echo esc_attr($fcp_top_icon) == "fcp_icon_11" ? 'selected' : '';?>>fcp_icon_11</option>   

    <option value="icon_45" <?php
        echo esc_attr($fcp_top_icon) == "icon_45" ? 'selected' : '';?>>icon_45</option>  

    <option value="icon_38" <?php
        echo esc_attr($fcp_top_icon) == "icon_38" ? 'selected' : '';?>>icon_38</option>
   
    <option value="icon_39" <?php
        echo esc_attr($fcp_top_icon) == "icon_39" ? 'selected' : '';?>>icon_39</option>
   
    <option value="icon_40" <?php
        echo esc_attr($fcp_top_icon) == "icon_40" ? 'selected' : '';?>>icon_40</option>

    <option value="icon_41" <?php
        echo esc_attr($fcp_top_icon) == "icon_41" ? 'selected' : '';?>>icon_41</option>

    <option value="fcp_icon_9" <?php echo esc_attr($fcp_top_icon) == "fcp_icon_9" ? 'selected' : '';?>>fcp_icon_9</option> 
       
    <option value="fcp_icon_10" <?php
        echo esc_attr($fcp_top_icon) == "fcp_icon_10" ? 'selected' : '';?>>fcp_icon_10</option>  
    <option value="fcp_icon_12">Premium Icon</option>    
    <option value="fcp_icon_13">Premium Icon</option>    
    <option value="fcp_icon_14">Premium Icon</option>    
    <option value="fcp_icon_15">Premium Icon</option>    
    <option value="fcp_icon_16">Premium Icon</option>    
    <option value="fcp_icon_17">Premium Icon</option>    
    <option value="fcp_icon_18">Premium Icon</option>    
    <option value="fcp_icon_19">Premium Icon</option>          
    <option value="fcp_icon_20">Premium Icon</option>
         
    <option value="icon_19">Premium Icon</option>

    <option value="icon_20">Premium Icon</option>        
    <option value="icon_21">Premium Icon</option>               
    <option value="icon_254">Premium Icon</option>        
      
    <option value="icon_25">Premium Icon</option>  
              
    <option value="icon_26">Premium Icon</option>        
    <option value="icon_27">Premium Icon</option>        
    <option value="icon_28">Premium Icon</option>        
    <option value="icon_29">Premium Icon</option>    

    <option value="icon_30">Premium Icon</option>
    
    <option value="icon_31">Premium Icon</option>  
  
    <option value="icon_34">Premium Icon</option>
    
    <option value="icon_35">Premium Icon</option>

    <option value="icon_37">Premium Icon</option>
    
    <option value="icon_43">Premium Icon</option>
 
    <option value="icon_46">Premium Icon</option> 
    <option value="icon_44">Premium Icon</option>   

    <option value="icon_30" <?php
        echo esc_attr($fcp_top_icon) == "icon_30" ? 'selected' : '';?>>icon_30</option>
    
    <option value="icon_31" <?php
        echo esc_attr($fcp_top_icon) == "icon_31" ? 'selected' : '';?>>icon_31</option>  
  
    <option value="icon_34" <?php
        echo esc_attr($fcp_top_icon) == "icon_34" ? 'selected' : '';?>>icon_34</option>
    
    <option value="icon_35" <?php
        echo esc_attr($fcp_top_icon) == "icon_35" ? 'selected' : '';?>>icon_35</option>

    <option value="icon_37" <?php
        echo esc_attr($fcp_top_icon) == "icon_37" ? 'selected' : '';?>>icon_37</option>
    
    <option value="icon_43" <?php
        echo esc_attr($fcp_top_icon) == "icon_43" ? 'selected' : '';?>>icon_43</option>
 
    <option value="icon_46" <?php
        echo esc_attr($fcp_top_icon) == "icon_46" ? 'selected' : '';?>>icon_46</option> 
    <option value="icon_44" <?php
        echo esc_attr($fcp_top_icon) == "icon_44" ? 'selected' : '';?>>icon_44</option> 
  </select>
        
            <?php
    }

    public function wmhcside_toppart_bg()
    {
        $sidepanels = get_option('whmc_sidepanel');

        $wmhcside_toppart_bg = isset($sidepanels['wmhcside_toppart_bg']) ? $sidepanels['wmhcside_toppart_bg'] : '#efefef';

        printf('<input type="text" name="whmc_sidepanel[wmhcside_toppart_bg]" value="%s"  class="side_bottom_color" id="wmhcside_toppart_bg">', esc_attr($wmhcside_toppart_bg));

  }
    public function wmhcside_toppart_icon()
    {
        $sidepanels = get_option('whmc_sidepanel');

        $wmhcside_toppart_icon = isset($sidepanels['wmhcside_toppart_icon']) ? $sidepanels['wmhcside_toppart_icon'] : '#000000';

        printf('<input type="text" name="whmc_sidepanel[wmhcside_toppart_icon]" value="%s"  class="side_bottom_color" id="wmhcside_toppart_icon">', esc_attr($wmhcside_toppart_icon));


  } 
   public function wmhcside_toppartbbclr()
    {
        $sidepanels = get_option('whmc_sidepanel');

        $wmhcside_toppartbbclr = isset($sidepanels['wmhcside_toppartbbclr']) ? $sidepanels['wmhcside_toppartbbclr'] : '#000000';

        printf('<input type="text" name="whmc_sidepanel[wmhcside_toppartbbclr]" value="%s"  class="side_bottom_color" id="wmhcside_toppartbbclr">', esc_attr($wmhcside_toppartbbclr));
  } public function wmhcside_topbtxbclr()
    {
        $sidepanels = get_option('whmc_sidepanel');

        $wmhcside_topbtxbclr = isset($sidepanels['wmhcside_topbtxbclr']) ? $sidepanels['wmhcside_topbtxbclr'] : '#fff';

        printf('<input type="text" name="whmc_sidepanel[wmhcside_topbtxbclr]" value="%s"  class="side_bottom_color" id="wmhcside_topbtxbclr">', esc_attr($wmhcside_topbtxbclr));
  } 
    public function wmhcside_toppartycart()
    {
        $sidepanels = get_option('whmc_sidepanel');
        $wmhcside_toppartycart = isset($sidepanels['wmhcside_toppartycart']) ? $sidepanels['wmhcside_toppartycart'] : esc_html__('Your Cart','mini-cart-for-woocommerce');
        printf('<input type="text" name="whmc_sidepanel[wmhcside_toppartycart]" value="%s" placeholder="'.esc_html('Your Cart', 'mini-cart-for-woocommerce').'" id="wmhcside_toppartycart">', esc_attr($wmhcside_toppartycart));
  } 

    public function wmhc_bottmborderclr()
    {

        $sidepanels = get_option('whmc_sidepanel');


        $wmhc_bottmborderclr = isset($sidepanels['wmhc_bottmborderclr']) ? $sidepanels['wmhc_bottmborderclr'] : '#ccc';

        printf('<input type="text" name="whmc_sidepanel[wmhc_bottmborderclr]" value="%s"  class="side_bottom_color" id="wmhc_bottmborderclr">', esc_attr($wmhc_bottmborderclr));

    }
    public function wmhc_bottomborder()
    {

        $sidepanels = get_option('whmc_sidepanel');


        $wmhc_bottomborder = isset($sidepanels['wmhc_bottomborder']) ? $sidepanels['wmhc_bottomborder'] : 'dotted';
?>

<select name="whmc_sidepanel[wmhc_bottomborder]" id="wmhc_bottomborder">
    
    <option value="solid" <?php
        echo esc_attr($wmhc_bottomborder) == "solid" ? 'selected' : '';?>><?php echo esc_html__('Solid','mini-cart-for-woocommerce') ?></option>    
    <option value="dotted" <?php
        echo esc_attr($wmhc_bottomborder) == "dotted" ? 'selected' : '';?>><?php echo esc_html__('Dotted','mini-cart-for-woocommerce') ?></option>    
    <option value="dashed" <?php
        echo esc_attr($wmhc_bottomborder) == "dashed" ? 'selected' : '';?>><?php echo esc_html__('Dashed ','mini-cart-for-woocommerce') ?></option>    
    <option value="none" <?php
        echo esc_attr($wmhc_bottomborder) == "none" ? 'selected' : '';?>><?php echo esc_html__('None ','mini-cart-for-woocommerce') ?></option>



    </select>
<?php

    }
    public function wmhc_wrapperloader()
    {

        $sidepanels = get_option('whmc_sidepanel');

        $wmhc_wrapperloader = isset($sidepanels['wmhc_wrapperloader']) ? $sidepanels['wmhc_wrapperloader'] : 'icon_s-6';
?>

<select id="wmhc_wrapperloader" name="whmc_sidepanel[wmhc_wrapperloader]" class="default">
    
    <option value="icon_s-6" <?php echo esc_attr($wmhc_wrapperloader) == "icon_s-6" ? 'selected' : '';?>>Loader 1</option>

    <option value="icon_s-5" <?php echo esc_attr($wmhc_wrapperloader) == "icon_s-5" ? 'selected' : '';?>>Loader 2</option>

    <option value="icon_s-3" <?php echo esc_attr($wmhc_wrapperloader) == "icon_s-3" ? 'selected' : '';?>>Loader 3</option>

    <option value="icon_s-2" <?php echo esc_attr($wmhc_wrapperloader) == "icon_s-2" ? 'selected' : '';?>>Loader 4</option>

    <option value="icon_spin" <?php echo esc_attr($wmhc_wrapperloader) == "icon_spin" ? 'selected' : '';?>>Loader 5</option>

    <option value="icon_s-0" <?php echo esc_attr($wmhc_wrapperloader) == "icon_s-0" ? 'selected' : '';?>>Loader 6</option>       
    </select>
<?php

    }

    
    public function wmhc_cart_side_subtotal()
    {

        $sidepanels = get_option('whmc_sidepanel');

        $wmhc_cart_side_subtotal = isset($sidepanels['wmhc_cart_side_subtotal']) ? $sidepanels['wmhc_cart_side_subtotal'] : '';

        $wmhc_cart_side_subtoral_font = isset($sidepanels['wmhc_cart_side_subtoral_font']) ? $sidepanels['wmhc_cart_side_subtoral_font'] : '14';


        $sidepanels_subtototal_value = isset($sidepanels['wmhc_subtototal_value']) ? $sidepanels['wmhc_subtototal_value'] : esc_html__('Sub total','mini-cart-for-woocommerce');

        printf('<ul class="whmc_ptc_wrape_tb"><li><strong class="whmc_ptc_tb"><label>'.esc_html__("Title", "mini-cart-for-woocommerce").': </label></strong>
        <input type="text" name="whmc_sidepanel[wmhc_subtototal_value]" value="%s"  placeholder="Sub total" id="wmhc_subtototal_value"></li>', esc_attr($sidepanels_subtototal_value));

        printf('<li><strong class="whmc_ptc_tb"><label >'.esc_html__("Color", "mini-cart-for-woocommerce").'</label></strong><input type="text" name="whmc_sidepanel[wmhc_cart_side_subtotal]" value="%s"  class="side_bottom_color" id="wmhc_cart_side_subtotal"></<li>', esc_attr($wmhc_cart_side_subtotal));

        printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Font Size (Px)", "mini-cart-for-woocommerce").'</label></strong><input type="number" name="whmc_sidepanel[wmhc_cart_side_subtoral_font]" value="%s" id="wmhc_cart_side_subtoral_font"></li>', esc_attr($wmhc_cart_side_subtoral_font));

        printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Disable this field", "mini-cart-for-woocommerce").':</label></strong><input type="checkbox" name="whmc_sidepanel[wmhc_cart_subtotal_remove]" class="whmc_apple-switch" id="wmhc_cart_subtotal_remove" value="wmhc_cart_subtotal_remove" %s ></li></ul>', (isset($sidepanels['wmhc_cart_subtotal_remove']) && $sidepanels['wmhc_cart_subtotal_remove'] == 'wmhc_cart_subtotal_remove') ? 'checked' : '');

    }  
    public function wmhc_cart_side_customtxt()
    {
    $sidepanels = get_option('whmc_sidepanel');

    $wmhc_subcstxt = isset($sidepanels['wmhc_subcstxt']) ? $sidepanels['wmhc_subcstxt'] : esc_html__('Shipping & taxes may be re-calculated at checkout','mini-cart-for-woocommerce');
        printf('<input type="text" name="whmc_sidepanel[wmhc_subcstxt]" value="%s" id="wmhc_subcstxt" class="widefat">', esc_attr($wmhc_subcstxt));
 }
    public function wmhc_cart_shipping()
    {

        $wmhc_cart_shipping = '';

        $wmhc_cart_side_shipping_font = '14';

        $wmhc_shipping_value = esc_html__('Shipping','mini-cart-for-woocommerce');
        $whmc_shipicon = 'icon_pen';
        printf('<ul class="whmc_ptc_wrape_tb"><li><strong class="whmc_ptc_tb"><label>'.esc_html__("Title", "mini-cart-for-woocommerce").': </label></strong><input type="text"  value="%s"  placeholder="Shipping" id="wmhc_shipping_value"></li>', esc_attr($wmhc_shipping_value));

        printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Color", "mini-cart-for-woocommerce").'</label></strong><input type="text" value="%s"  class="side_bottom_color" id="wmhc_cart_shipping"></<li>', esc_attr($wmhc_cart_shipping));

        printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Font Size", "mini-cart-for-woocommerce").'</label></strong><input type="number" value="%s" id="wmhc_cart_side_shipping_font"></li>', esc_attr($wmhc_cart_side_shipping_font));

?>
<li><strong class="whmc_ptc_tb"><label><?php echo esc_html('Icon','mini-cart-for-woocommerce') ?></label></strong>

    <select id="whmc_shopicon"  class="default">
     
     <option value="icon_pen">Icon 1</option>       
     <option value="icon_local_shipping">Icon 2</option>    

    <option value="icon_t-10">Icon 3</option>         
    <option value="icon_t-9">Icon 4</option>         
    <option value="icon_ship">Icon 5</option>              
    <option value="icon_rocket">Icon 6</option>         
     <option value="whmcNone">None</option>

    </select>
</li>

<?php
        printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Disable this field", "mini-cart-for-woocommerce").':</label></strong><input type="checkbox" class="whmc_apple-switch" id="wmhc_cart_shipping_remove"></li></ul>');


    }

    public function wmhcside_btm_shipping()
    {

        $wmhcside_btm_shipping = esc_html__('Tax','mini-cart-for-woocommerce');

        $wmhc_cart_shipping_font = '14';

        $wmhc_shipping_Color = '0';

        printf('<ul class="whmc_ptc_wrape_tb"><li><strong class="whmc_ptc_tb"><label>'.esc_html__("Title", "mini-cart-for-woocommerce").': </label></strong>
        <input type="text" value="%s"  placeholder="Tax" id="wmhcside_btm_shipping"></li>', esc_attr($wmhcside_btm_shipping));

        printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Text Color", "mini-cart-for-woocommerce").'</label></strong><input type="text" value="%s"  class="side_bottom_color" id="wmhc_shipping_Color"></<li>', esc_attr($wmhc_shipping_Color));

        printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Font size", "mini-cart-for-woocommerce").'</label></strong><input type="number" value="%s" id="wmhc_cart_shipping_font"></li>', esc_attr($wmhc_cart_shipping_font));

        printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Disable this field", "mini-cart-for-woocommerce").':</label></strong><input type="checkbox" name="whmc_sidepanel[wmhc_cart_tax_remove]" class="whmc_apple-switch" id="wmhc_cart_tax_remove"></li></ul>');
    }

    public function wmhcside_btm_discount()
    {

        $sidepanels = get_option('whmc_sidepanel');

        $wmhcside_btm_discount = isset($sidepanels['wmhcside_btm_discount']) ? $sidepanels['wmhcside_btm_discount'] :  esc_html__('Discount','mini-cart-for-woocommerce');

        $wmhc_cart_discount_font = isset($sidepanels['wmhc_cart_discount_font']) ? $sidepanels['wmhc_cart_discount_font'] : '14';

        $wmhc_discount_color = isset($sidepanels['wmhc_discount_color']) ? $sidepanels['wmhc_discount_color'] : '0';

        printf('<ul class="whmc_ptc_wrape_tb"><li><strong class="whmc_ptc_tb"><label>'.esc_html__("Title", "mini-cart-for-woocommerce").'</label></strong>
        <input type="text" name="whmc_sidepanel[wmhcside_btm_discount]" value="%s"  placeholder="Discount" id="wmhcside_btm_discount"></li>', esc_attr($wmhcside_btm_discount));

        printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Text Color", "mini-cart-for-woocommerce").'</label></strong><input type="text" name="whmc_sidepanel[wmhc_discount_color]" value="%s"  class="side_bottom_color" id="wmhc_discount_color"></<li>', esc_attr($wmhc_discount_color));

        printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Font Size", "mini-cart-for-woocommerce").'</label></strong><input type="number" name="whmc_sidepanel[wmhc_cart_discount_font]" value="%s" id="wmhc_cart_discount_font"></li>', esc_attr($wmhc_cart_discount_font));

        printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Add the minus icon:", "mini-cart-for-woocommerce").':</label></strong><input type="checkbox" name="whmc_sidepanel[wmhcdicminusicon]" class="whmc_apple-switch" value="wmhcdicminusicon" %s id="wmhcdicminusicon"></li></ul>', (isset($sidepanels['wmhcdicminusicon']) && $sidepanels['wmhcdicminusicon'] == 'wmhcdicminusicon') ? 'checked' : '');
    }

    public function wmhcside_btm_total()
    {

        $sidepanels = get_option('whmc_sidepanel');

        $wmhcside_btm_total = isset($sidepanels['wmhcside_btm_total']) ? $sidepanels['wmhcside_btm_total'] : esc_html__('Total','mini-cart-for-woocommerce');

        $wmhc_cart_total_font = isset($sidepanels['wmhc_cart_total_font']) ? $sidepanels['wmhc_cart_total_font'] : '14';

        $wmhc_total_color = isset($sidepanels['wmhc_total_color']) ? $sidepanels['wmhc_total_color'] : '';
        $wmhc_cartttlborclr = isset($sidepanels['wmhc_cartttlborclr']) ? $sidepanels['wmhc_cartttlborclr'] : '';


        $wmhc_cartttlborder = isset($sidepanels['wmhc_cartttlborder']) ? $sidepanels['wmhc_cartttlborder'] : 'dashed';

        printf('<ul class="whmc_ptc_wrape_tb"><li><strong class="whmc_ptc_tb"><label>'.esc_html__("Title", "mini-cart-for-woocommerce").' </label></strong><input type="text" name="whmc_sidepanel[wmhcside_btm_total]" value="%s"  placeholder="'.esc_html__("Total ", "mini-cart-for-woocommerce").'" id="wmhcside_btm_total"></li>', esc_attr($wmhcside_btm_total));

        printf('<li><strong class="whmc_ptc_tb"><label >'.esc_html__("Text Color", "mini-cart-for-woocommerce").'</label></strong><input type="text" name="whmc_sidepanel[wmhc_total_color]" value="%s"  class="side_bottom_color" id="wmhc_total_color" ></<li>', esc_attr($wmhc_total_color));

        printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Font Size", "mini-cart-for-woocommerce").'</label></strong><input type="number" name="whmc_sidepanel[wmhc_cart_total_font]" value="%s" id="wmhc_cart_total_font"></li>', esc_attr($wmhc_cart_total_font));

?>
<li><strong class="whmc_ptc_tb"><label ><?php echo esc_html__("Border", "mini-cart-for-woocommerce");?></label></strong>
<select name="whmc_sidepanel[wmhc_cartttlborder]" id="wmhc_cartttlborder">
    
    <option value="solid " <?php
        echo esc_attr($wmhc_cartttlborder) == "solid " ? 'selected' : '';?>><?php echo esc_html__('Solid','mini-cart-for-woocommerce') ?></option>    
    <option value="dotted " <?php
        echo esc_attr($wmhc_cartttlborder) == "dotted " ? 'selected' : '';?>><?php echo esc_html__('Dotted','mini-cart-for-woocommerce') ?></option>    
    <option value="dashed " <?php
        echo esc_attr($wmhc_cartttlborder) == "dashed " ? 'selected' : '';?>><?php echo esc_html__('Dashed ','mini-cart-for-woocommerce') ?></option>        
    <option value="none " <?php
        echo esc_attr($wmhc_cartttlborder) == "none " ? 'selected' : '';?>><?php echo esc_html__('None ','mini-cart-for-woocommerce') ?></option>



    </select></li>

  <?php  
        printf('<li><strong class="whmc_ptc_tb"><label >'.esc_html__("Border Color", "mini-cart-for-woocommerce").'</label></strong><input type="text" name="whmc_sidepanel[wmhc_cartttlborclr]" value="%s"  class="side_bottom_color" id="wmhc_cartttlborclr"></<li>', esc_attr($wmhc_cartttlborclr));

        printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Disable this field", "mini-cart-for-woocommerce").':</label></strong><input type="checkbox" name="whmc_sidepanel[wmhc_cart_total_remove]" class="whmc_apple-switch" id="wmhc_cart_total_remove" value="wmhc_cart_total_remove" %s></li></ul>',(isset($sidepanels['wmhc_cart_total_remove']) && $sidepanels['wmhc_cart_total_remove'] == 'wmhc_cart_total_remove') ? 'checked' : '');


}

    public function wmhc_cart_side_button_text_color()
    {

        $sidepanels = get_option('whmc_sidepanel');
        $sidepanels_rang_value = isset($sidepanels['wmhc_cart_side_button_text_color']) ? $sidepanels['wmhc_cart_side_button_text_color'] : '#fff';

        $wmhc_cart_side_button_color = isset($sidepanels['wmhc_cart_side_button_color']) ? $sidepanels['wmhc_cart_side_button_color'] :'#1e73be';

        $sidepanels_chekout_text_value = isset($sidepanels['wmhc_chekout_text_value']) ? $sidepanels['wmhc_chekout_text_value'] : esc_html__('Checkout','mini-cart-for-woocommerce');

        $whmc_cartborderrdis = isset($sidepanels['whmc_cartborderrdis']) ? $sidepanels['whmc_cartborderrdis'] : '6';
        $whmc_cartborderclr = isset($sidepanels['whmc_cartborderclr']) ? $sidepanels['whmc_cartborderclr'] : '';

        printf('<ul class="whmc_ptc_wrape_tb"><li><strong class="whmc_ptc_tb"><label >'.esc_html__("Checkout Button Text", "mini-cart-for-woocommerce").'</label></strong>
        <input type="text" name="whmc_sidepanel[wmhc_chekout_text_value]" value="%s"  placeholder="Checkout" id="wmhc_chekout_text_value"></li>', esc_attr($sidepanels_chekout_text_value));

        printf('<li><strong class="whmc_ptc_tb"><label> '.esc_html__("Remove Cart Icon", "mini-cart-for-woocommerce").':</label></strong><input type="checkbox" name="whmc_sidepanel[wmhc_chkcaricon]" id="wmhc_chkcaricon" class="whmc_apple-switch"  value="wmhc_chkcaricon" %s></li>', (isset($sidepanels['wmhc_chkcaricon']) && $sidepanels['wmhc_chkcaricon'] == 'wmhc_chkcaricon') ? 'checked' : '');
        printf('<li><strong class="whmc_ptc_tb"><label> '.esc_html__("Remove Cart Amount", "mini-cart-for-woocommerce").':</label></strong><input type="checkbox" name="whmc_sidepanel[wmhc_chkbtnamot]" id="wmhc_chkbtnamot" class="whmc_apple-switch"  value="wmhc_chkbtnamot" %s></li>', (isset($sidepanels['wmhc_chkbtnamot']) && $sidepanels['wmhc_chkbtnamot'] == 'wmhc_chkbtnamot') ? 'checked' : '');


        printf('<li><strong class="whmc_ptc_tb"><label for="wmhc__text_size">'.esc_html__("Background", "mini-cart-for-woocommerce").'</label></strong><input type="text" name="whmc_sidepanel[wmhc_cart_side_button_color]" value="%s"  class="side_button_color" id="wmhc_cart_side_button_color"></li>', esc_attr($wmhc_cart_side_button_color));

        printf('<li><strong class="whmc_ptc_tb"><label for="wmhc__text_size">'.esc_html__("Color", "mini-cart-for-woocommerce").'</label></strong><input type="text" name="whmc_sidepanel[wmhc_cart_side_button_text_color]" value="%s"  class="side_bottom_text_color" id="wmhc_cart_side_button_text_color"></li>', esc_attr($sidepanels_rang_value));


        printf('<li><strong class="whmc_ptc_tb"><label for="wmhc__text_size">'.esc_html__("Border Radius (px)", "mini-cart-for-woocommerce").'</label></strong><input type="range" name="whmc_sidepanel[whmc_cartborderrdis]" min="1" max="50" value="%s" oninput="outrupbtsd.value = this.value" id="whmc_cartborderrdis"><output id="outrupbtsd">%s<output></li>',esc_attr($whmc_cartborderrdis), esc_html($whmc_cartborderrdis));

        printf('<li><strong class="whmc_ptc_tb"><label for="wmhc__text_size">'.esc_html__("Border Color", "mini-cart-for-woocommerce").'</label></strong><input type="text" name="whmc_sidepanel[whmc_cartborderclr]" value="%s"  class="side_bottom_text_color" id="whmc_cartborderclr"></li>', esc_attr($whmc_cartborderclr)); ?>

<li><strong class="whmc_ptc_tb"><label ><?php echo esc_html__("Link behavior", "mini-cart-for-woocommerce")?></label></strong>
    <select id="whmcchecklink">
    
    <option value="checkoutpage" selected><?php echo esc_html__('Checkout Page','mini-cart-for-woocommerce') ?></option>    
    <option value="customcheckout"><?php echo esc_html__('Custom link (PRO)','mini-cart-for-woocommerce') ?></option>    
    </select></li>
        <?php

        printf('<li class="checkoutcustomlink"><strong class="whmc_ptc_tb"><label for="wmhc__text_size">'.esc_html__("Input URL (PRO)", "mini-cart-for-woocommerce").'</label></strong><input type="text"   id="whmc_chkcutomlink" class="widefat"></li></ul>');



    }

    public function whmc_svaevluft()
    {

        $sidepanels = get_option('whmc_sidepanel');
        $whmc_svaevluft = isset($sidepanels['whmc_svaevluft']) ? $sidepanels['whmc_svaevluft'] : '13';
        printf('<input type="range" name="whmc_sidepanel[whmc_svaevluft]" min="1" max="50" value="%s" oninput="outrufnt.value = this.value" id="whmc_svaevluft"><output id="outrufnt">%s<output>',esc_attr($whmc_svaevluft), esc_html($whmc_svaevluft));

    }
    public function wmhc_cart_side_text_color()
    {

        $sidepanels = get_option('whmc_sidepanel');
        $sidepanels_rang_value = isset($sidepanels['wmhc_cart_side_text_color']) ? $sidepanels['wmhc_cart_side_text_color'] : '#3a3a3a';

        printf('<input type="text" name="whmc_sidepanel[wmhc_cart_side_text_color]" value="%s"  class="side_text_color" id="wmhc_cart_side_text_color">', esc_attr($sidepanels_rang_value));


    }


    public function wmhc_cart_side_text_size()
    {

        $sidepanels = get_option('whmc_sidepanel');
        $wmhc_cart_side_text_size = isset($sidepanels['wmhc_cart_side_text_size']) ? $sidepanels['wmhc_cart_side_text_size'] : '16';

        printf('<input type="number" name="whmc_sidepanel[wmhc_cart_side_text_size]" value="%s" id="wmhc_cart_side_text_size">', esc_attr($wmhc_cart_side_text_size));

    }



    public function wmhc_cart_side_price_color()
    {

        $sidepanels = get_option('whmc_sidepanel');
        $wmhc_cart_side_price_color = isset($sidepanels['wmhc_cart_side_price_color']) ? $sidepanels['wmhc_cart_side_price_color'] : '#3a3a3a';

        printf('<input type="text" name="whmc_sidepanel[wmhc_cart_side_price_color]" value="%s"  class="side_text_color" id="wmhc_cart_side_price_color">', esc_attr($wmhc_cart_side_price_color));


    }


    public function wmhc_cart_side_price_size()
    {

        $sidepanels = get_option('whmc_sidepanel');
        $wmhc_cart_side_price_size = isset($sidepanels['wmhc_cart_side_price_size']) ? $sidepanels['wmhc_cart_side_price_size'] : '15';


        printf('<input type="number" name="whmc_sidepanel[wmhc_cart_side_price_size]" value="%s"  id="wmhc_cart_side_price_size">', esc_attr($wmhc_cart_side_price_size));

    }


    public function wmhc_cart_side_text_change()
    {

        $sidepanels = get_option('whmc_sidepanel');


        $whmc_keepshop_text_value = isset($sidepanels['whmc_keepshop_text_value']) ? $sidepanels['whmc_keepshop_text_value'] : 'Keep Shopping';    
        $whmclinkbehavior = isset($sidepanels['whmclinkbehavior']) ? $sidepanels['whmclinkbehavior'] : 'close';


        printf('<ul class="whmc_ptc_wrape_tb" ><li><strong class="whmc_ptc_tb"><label>'.esc_html__("Remove Keep Shopping", "mini-cart-for-woocommerce").'</label></strong><input type="checkbox" name="whmc_sidepanel[wmhc_cart_side_hide_kshop]" class="whmc_apple-switch" id="wmhc_cart_side_hide_kshop" value="wmhc_cart_side_hide_kshop" %s></li>', (isset($sidepanels['wmhc_cart_side_hide_kshop']) && $sidepanels['wmhc_cart_side_hide_kshop'] == 'wmhc_cart_side_hide_kshop') ? 'checked' : '');
        printf('<li><strong class="whmc_ptc_tb"><label >'.esc_html__("Button Label", "mini-cart-for-woocommerce").'</label></strong><input type="text" name="whmc_sidepanel[whmc_keepshop_text_value]" value="%s"  placeholder="Keep Shopping" id="whmc_keepshop_text_value"></li>', esc_attr($whmc_keepshop_text_value));

        ?><li><strong class="whmc_ptc_tb"><label ><?php echo esc_html__("Link behavior", "mini-cart-for-woocommerce")?></label></strong>
    <select name="whmc_sidepanel[whmclinkbehavior]" id="whmclinkbehavior">
    
    <option value="close" <?php
        echo esc_attr($whmclinkbehavior) == "close" ? 'selected' : '';?>><?php echo esc_html__('Close Sidebar','mini-cart-for-woocommerce') ?></option>    
    <option value="shoplink" <?php
        echo esc_attr($whmclinkbehavior) == "shoplink" ? 'selected' : '';?>><?php echo esc_html__('Shop link','mini-cart-for-woocommerce') ?></option>    
    </select></li></ul>
    <?php }

public function wmhcside_topclearcart(){

        $sidepanels = get_option('whmc_sidepanel');

        printf('<input type="checkbox" name="whmc_sidepanel[wmhcside_topclearcart]" class="whmc_apple-switch" id="wmhcside_topclearcart"  value="wmhcside_topclearcart" %s><p class="whmc_description">'.esc_html__("click to remove 'Clear cart button'", "mini-cart-for-woocommerce").'</p>', (isset($sidepanels['wmhcside_topclearcart']) && $sidepanels['wmhcside_topclearcart'] === 'wmhcside_topclearcart') ? 'checked' : '');

    }    
  public function wmhctopclearcartxt(){
        $sidepanels = get_option('whmc_sidepanel');

        $wmhctopclearcartxt = isset($sidepanels['wmhctopclearcartxt']) ? $sidepanels['wmhctopclearcartxt'] : 'CLEAR CART';

        printf('<input type="text" name="whmc_sidepanel[wmhctopclearcartxt]" value="%s" id="wmhctopclearcartxt">', esc_attr($wmhctopclearcartxt));
  }
  public function wmhctopclearcartbg(){
        $sidepanels = get_option('whmc_sidepanel');

        $wmhctopclearcartbg = isset($sidepanels['wmhctopclearcartbg']) ? $sidepanels['wmhctopclearcartbg'] : '#000';

        printf('<input type="text" name="whmc_sidepanel[wmhctopclearcartbg]" value="%s" id="wmhctopclearcartbg">', esc_attr($wmhctopclearcartbg));
  }
  public function wmhctopclearcartclr(){
        $sidepanels = get_option('whmc_sidepanel');

        $wmhctopclearcartclr = isset($sidepanels['wmhctopclearcartclr']) ? $sidepanels['wmhctopclearcartclr'] : '#fff';

        printf('<input type="text" name="whmc_sidepanel[wmhctopclearcartclr]" value="%s" id="wmhctopclearcartclr">', esc_attr($wmhctopclearcartclr));
  } 



    public function wmhc_cart_emptycart()
    {

        $sidepanels = get_option('whmc_sidepanel');

        $sidepanels_no_cart_text_value = isset($sidepanels['wmhc_no_cart_text_value']) ? $sidepanels['wmhc_no_cart_text_value'] : esc_html__('Cart is empty.','mini-cart-for-woocommerce');

        $whmcfillcart = isset($sidepanels['whmcfillcart']) ? $sidepanels['whmcfillcart'] : esc_html__('Fill your cart with amazing items','mini-cart-for-woocommerce');
        $whmcemptyshopbrn = isset($sidepanels['whmcemptyshopbrn']) ? $sidepanels['whmcemptyshopbrn'] : esc_html__('Shop Now','mini-cart-for-woocommerce');
        $whmcemptyspbtclr = isset($sidepanels['whmcemptyspbtclr']) ? $sidepanels['whmcemptyspbtclr'] :'#fff';
        $whmcemptyspbtbg = isset($sidepanels['whmcemptyspbtbg']) ? $sidepanels['whmcemptyspbtbg'] :'#1e73be';
        $emptyicclr = isset($sidepanels['emptyicclr']) ? $sidepanels['emptyicclr'] :'#666666';
        $whmcemptyspbris = '6';
        $wmhupimage = WHMC_LIGHT_URL.'assets/admin/img/logo.png';
        $choosetyps = isset($sidepanels['choosetyps']) ? $sidepanels['choosetyps'] :'icon';



     $emptyicons = isset($options['emptyicons']) ? $options['emptyicons'] : 'fcp_icon_3'; ?>
   <ul class="whmc_ptc_wrape_tb" >
    <li ><strong class="whmc_ptc_tb"><label><?php echo esc_html__("Choose Media", "mini-cart-for-woocommerce"); ?></label></strong>
    <select id="choosetyps"  name="whmc_sidepanel[choosetyps]"><option value="icon" <?php echo esc_attr($choosetyps) == "icon" ? 'selected' : '';?>>Icon</option>  

        <option value="image">Image</option>

        <option value="none" <?php echo esc_attr($choosetyps) == "none" ? 'selected' : '';?>>None</option>
    </select>
    </li>

    <li class="choosetypsiocn"><strong class="whmc_ptc_tb"><label><?php echo esc_html__("Change Icon", "mini-cart-for-woocommerce"); ?>:<sup class="whmcnewspro">PRO</sup></label></strong>

    <select id="emptyicons"  class="default">
    <option value="fcp_icon_1">Icon 1</option>    
    <option value="fcp_icon_2">Icon 2</option>    
    <option value="fcp_icon_3">Icon 3</option>    
    <option value="fcp_icon_4">Icon 4</option>    
    <option value="fcp_icon_5">Icon 5</option>    
    <option value="fcp_icon_6">Icon 6</option>    
    <option value="fcp_icon_7">Icon 7</option>    
    <option value="fcp_icon_8">Icon 8</option>
    <option value="fcp_icon_11" >Icon 9</option>   
    <option value="icon_45">Icon 10</option>  
    <option value="icon_38">Icon 11</option>
    <option value="icon_39">Icon 12</option>
    <option value="icon_40">Icon 13</option>
    <option value="icon_41">Icon 14</option>
    <option value="fcp_icon_9">Icon 15</option> 
    <option value="fcp_icon_10">Icon 16</option>  
    <option value="fcp_icon_12">Icon 17</option>    
    <option value="fcp_icon_13">Icon 18</option>    
    <option value="fcp_icon_14">Icon 19</option>    
    <option value="fcp_icon_15">Icon 20</option>    
    <option value="fcp_icon_16">Icon 21</option>    
    <option value="fcp_icon_17">Icon 22</option>    
    <option value="fcp_icon_18">>Icon 23</option>    
    <option value="fcp_icon_19">Icon 24</option>
    <option value="fcp_icon_20">Icon 25</option>
    <option value="icon_19">Icon 26</option>
    <option value="icon_20">Icon 27</option>        
    <option value="icon_21">Icon 28</option>
    <option value="icon_254">Icon 29</option>        
    <option value="icon_25">Icon 30</option>  
    <option value="icon_26">Icon 31</option>        
    <option value="icon_27">Icon 32</option>        
    <option value="icon_28">Icon 33</option>        
    <option value="icon_29">Icon 34</option>    
    <option value="icon_30">Icon 35</option>
    <option value="icon_31">Icon 36</option>  
    <option value="icon_34">Icon 37</option>
    <option value="icon_35">Icon 38</option>
    <option value="icon_37">Icon 39</option>
    <option value="icon_43">Icon 40</option>
    <option value="icon_46">Icon 41</option> 
    <option value="icon_44">Icon 42</option> 
  </select></li>
        
            <?php
        printf('<li  class="choosetypsimage"><strong class="whmc_ptc_tb"><label>'.esc_html__("Upload Image", "mini-cart-for-woocommerce").':<sup class="whmcnewspro">PRO</sup></label></strong><input class="master_widefat" id="wmhupimage" type="text" value="%s"/><input id="wmhupimagesd" type="button" class="button button-primary" value="Insert Image" /></li>',esc_attr($wmhupimage));

        printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Empty Title", "mini-cart-for-woocommerce").':</label></strong><textarea rows="3" cols="40" name="whmc_sidepanel[wmhc_no_cart_text_value]" id="wmhc_no_cart_text_value" placeholder="Cart is empty...">%s</textarea></li>', esc_attr($sidepanels_no_cart_text_value));
        printf('<li><strong class="whmc_ptc_tb"><label>'.esc_html__("Empty Subtitle", "mini-cart-for-woocommerce").':</label></strong><textarea rows="3" cols="40" name="whmc_sidepanel[whmcfillcart]" id="whmcfillcart" placeholder="Fill your cart with amazing items">%s</textarea></li>', esc_attr($whmcfillcart));

        printf('<li><strong class="whmc_ptc_tb"><label >'.esc_html__("Shop Button", "mini-cart-for-woocommerce").'</label></strong><input type="text" name="whmc_sidepanel[whmcemptyshopbrn]" value="%s"  id="whmcemptyshopbrn" placeholder="Shop Now"></li>', esc_attr($whmcemptyshopbrn));

        printf('<li class="cgiseiconre"><strong class="whmc_ptc_tb"><label >'.esc_html__("Icon Color", "mini-cart-for-woocommerce").'</label></strong><input type="text" name="whmc_sidepanel[emptyicclr]" value="%s" id="emptyicclr" class="side_text_color" ></li>', esc_attr($emptyicclr));

        printf('<li><strong class="whmc_ptc_tb"><label >'.esc_html__("Button Color", "mini-cart-for-woocommerce").'</label></strong><input type="text" name="whmc_sidepanel[whmcemptyspbtclr]" value="%s" id="whmcemptyspbtclr" class="side_text_color" ></li>', esc_attr($whmcemptyspbtclr));

        printf('<li><strong class="whmc_ptc_tb"><label >'.esc_html__("Button Background", "mini-cart-for-woocommerce").'</label></strong><input type="text" name="whmc_sidepanel[whmcemptyspbtbg]" value="%s" id="whmcemptyspbtbg"  class="side_text_color" ></li>', esc_attr($whmcemptyspbtbg));

        printf('<li><strong class="whmc_ptc_tb"><label for="wmhc__text_size">'.esc_html__("Border Radius (px)", "mini-cart-for-woocommerce").'</label></strong><input type="number" name="whmc_sidepanel[whmcemptyspbris]" min="1" max="50" value="%s"  id="whmcemptyspbris"></li></ul>',esc_attr($whmcemptyspbris));

    }
    public function wmhc_cart_side_autup()
    {

        $sidepanels = get_option('whmc_sidepanel');

        printf('<input type="checkbox" name="whmc_sidepanel[wmhc_cart_side_autup]" class="whmc_apple-switch"  value="wmhc_cart_side_autup" %s><p class="whmc_description">'.esc_html__("The sidebar opens automatically after carting a product, click to close it", "mini-cart-for-woocommerce").'</p>', (isset($sidepanels['wmhc_cart_side_autup']) && $sidepanels['wmhc_cart_side_autup'] === 'wmhc_cart_side_autup') ? 'checked' : '');

    }public function wmhc_remobetippar()
    {

        $sidepanels = get_option('whmc_sidepanel');

        printf('<input type="checkbox" name="whmc_sidepanel[wmhc_remobetippar]" class="whmc_apple-switch" id="wmhc_remobetippar"  value="wmhc_remobetippar" %s><p class="whmc_description">'.esc_html__("click to remove top part", "mini-cart-for-woocommerce").'</p>', (isset($sidepanels['wmhc_remobetippar']) && $sidepanels['wmhc_remobetippar'] === 'wmhc_remobetippar') ? 'checked' : '');

    }  public function wmhcside_topcartcnt()
    {

        $sidepanels = get_option('whmc_sidepanel');

        printf('<input type="checkbox" name="whmc_sidepanel[wmhcside_topcartcnt]" class="whmc_apple-switch" id="wmhcside_topcartcnt"  value="wmhcside_topcartcnt" %s><p class="whmc_description">'.esc_html__("click to remove Cart Count", "mini-cart-for-woocommerce").'</p>', (isset($sidepanels['wmhcside_topcartcnt']) && $sidepanels['wmhcside_topcartcnt'] === 'wmhcside_topcartcnt') ? 'checked' : '');

    }    

    public function wmhc_wrapper_bg()
    {

        $sidepanels = get_option('whmc_sidepanel');


        $wmhc_cart_side_top_background = isset($sidepanels['wmhc_cart_side_top_background']) ? $sidepanels['wmhc_cart_side_top_background'] : '#fff';
        
        
        printf('<input type="text" name="whmc_sidepanel[wmhc_cart_side_top_background]" value="%s"  class="side_bottom_color" id="wmhc_cart_side_top_background">', esc_attr($wmhc_cart_side_top_background));

    }   

    public function wmhc_locar()
    {

        $sidepanels = get_option('whmc_sidepanel');


        $loadclr = isset($sidepanels['loadclr']) ? $sidepanels['loadclr'] : '#000';
        
        
        printf('<input type="text" name="whmc_sidepanel[loadclr]" value="%s"  class="side_bottom_color" id="loadclr">', esc_attr($loadclr));

    }
    public function wmhc_cart_side_position()
    {

        $sidepanels = get_option('whmc_sidepanel');

        printf('<input type="checkbox" name="whmc_sidepanel[wmhc_cart_side_position]" class="whmc_apple-switch"  value="wmhc_cart_side_position" %s><p class="whmc_description">'.esc_html__("Click to change sidebar from left to right,Default:Left", "mini-cart-for-woocommerce").'</p>', (isset($sidepanels['wmhc_cart_side_position']) && $sidepanels['wmhc_cart_side_position'] === 'wmhc_cart_side_position') ? 'checked' : '');

    }

    public function whmc_qrtborder()
    {         $options = get_option('whmc_sidepanel');
        $whmc_qrtborder = isset($options['whmc_qrtborder']) ? $options['whmc_qrtborder'] : '';
        printf('<input type="text" name="whmc_sidepanel[whmc_qrtborder]" value="%s"  class="side_text_color" id="whmc_qrtborder">', esc_attr($whmc_qrtborder));
}    public function whmc_qrtborderradis()
    {         $options = get_option('whmc_sidepanel');
        $whmc_qrtborderradis = isset($options['whmc_qrtborderradis']) ? $options['whmc_qrtborderradis'] : '6';
        printf('<input type="range" name="whmc_sidepanel[whmc_qrtborderradis]" min="0" max="50" value="%s" oninput="outrup.value = this.value" id="whmc_qrtborderradis"><output id="outrup">%s<output>',esc_attr($whmc_qrtborderradis), esc_html($whmc_qrtborderradis));
}
    public function whmc_side_priceqty()

    {         $options = get_option('whmc_sidepanel');;
        $whmcpricesty = isset($options['whmcpricesty']) ? $options['whmcpricesty'] : 'qty';

        ?>
  <select name="whmc_sidepanel[whmcpricesty]" id="whmcpricesty">
    <option value="deprice" <?php
        echo esc_attr($whmcpricesty) == "deprice" ? 'selected' : '';?>><?php echo esc_html__('Default Price','mini-cart-for-woocommerce') ?></option>  
    <option value="price" <?php
        echo esc_attr($whmcpricesty) == "price" ? 'selected' : '';?>><?php echo esc_html__('Current Price','mini-cart-for-woocommerce') ?></option>
  
    <option value="qty" <?php
        echo esc_attr($whmcpricesty) == "qty" ? 'selected' : '';?>><?php echo esc_html__('Qty & price','mini-cart-for-woocommerce') ?></option>    
    <option value="subtotal" <?php
        echo esc_attr($whmcpricesty) == "subtotal" ? 'selected' : '';?>><?php echo esc_html__('Product subtotal','mini-cart-for-woocommerce') ?></option>
    </select>
<?php
    }


    public function whmc_displaqtry()

    { ?>
  <select id="whmc_displaqtry">
    
    <option value="yes" selected><?php echo esc_html__('Yes','mini-cart-for-woocommerce') ?></option>    
    <option value="no" ><?php echo esc_html__('No','mini-cart-for-woocommerce') ?></option>       
    </select>
<?php
}


    public function whmc_side_svaevlue(){         


        printf('<input type="text" value="%s" id="whmcvaluesfggg" placeholder="Save {{save_percentage}}"class="widefat"><p>Use code {{save_amount}} to show total saved amount and {{save_percentage}} to show total saved percentage.</p>', esc_html__('Save {{save_amount}}','mini-cart-for-woocommerce'));


    }

    public function whmc_side_img_brious()
    {

        $options = get_option('whmc_sidepanel');
        $whmc_side_img_brious = isset($options['whmc_side_img_brious']) ? $options['whmc_side_img_brious'] : '10';
        printf('<input type="range" name="whmc_sidepanel[whmc_side_img_brious]" min="1" max="50" value="%s" oninput="outrups.value = this.value" id="whmc_side_img_brious"><output id="outrups">%s<output>',esc_attr($whmc_side_img_brious), esc_html($whmc_side_img_brious));


    }
    public function wmhc_rewardunlockmessage()
    {

        $options = get_option('whmc_sidepanel');


        $wmhc_rewardunlockmessage = isset($options['wmhc_rewardunlockmessage']) ? $options['wmhc_rewardunlockmessage'] : "Wohoo! Unlocked all achievements."; 


        printf('<ul class="rewarvlsss"><li><label>'.esc_html__('Message','mini-cart-for-woocommerce').'</label><input type="text" name="whmc_sidepanel[wmhc_rewardunlockmessage]"  id="wmhc_rewardunlockmessage" value="%s" class="widefat"><p style="color:#858585">'.esc_html__('After unlocking the amount, enter the message.','mini-cart-for-woocommerce').'</p></li></ul>',esc_attr($wmhc_rewardunlockmessage));

    }    
    public function enablerewardbar(){

        $sidepanels = get_option('whmc_sidepanel');

        printf('<input type="checkbox" name="whmc_sidepanel[enablerewardbar]" class="whmc_apple-switch" id="enablerewardbar"  value="enablerewardbar" checked><p class="whmc_description">'.esc_html__("Click to Enable Reward bar", "mini-cart-for-woocommerce").'</p>');

    } 
    public function wmhc_cart_stock()
    {

       echo '<input type="text" id="stockmessage" value="{{display_stock}} in Stock" class="widefat"><p style="color:#858585">Use code {{display_stock}} for Stock Qty</p>';

    }
    public function wmhc_stock_color()
    {

        echo '<input type="text"  id="stockcolor" value="#009688" class="widefat">';

    }

    public function wmhc_sidebar_rewarddiscount()
    {

        $options = get_option('whmc_sidepanel');
        $whmc_reward_dis = isset($options['whmc_reward_dis']) ? $options['whmc_reward_dis'] : "Discount";
        $whmc_reward_distype = isset($options['whmc_reward_distype']) ? $options['whmc_reward_distype'] : "";
        $whmc_reward_disval = isset($options['whmc_reward_disval']) ? $options['whmc_reward_disval'] : "";
        $whmc_reward_disachve = isset($options['whmc_reward_disachve']) ? $options['whmc_reward_disachve'] : "";
        $disuntamo = '10%';
        $whmc_reward_distitoncart = isset($options['whmc_reward_distitoncart']) ? $options['whmc_reward_distitoncart'] : $disuntamo ." Discount";
        $whmc_reward_dismesga = isset($options['whmc_reward_dismesga']) ? $options['whmc_reward_dismesga'] : "You're {{discount_amount}} away from Discount";

        $whmc_reward_iocn = isset($options['whmc_reward_iocn']) ? $options['whmc_reward_iocn'] : "gg-gift";
        ?>
    <p style="color:#4a8702;background: #e6f7d2;margin-bottom: 20px;padding: 6px 5px;">This bar is only active when the Discount Value* and Target Cart Amount* fields are not empty <a href="https://woominicart.sharabindu.com/docs/sidebar-setting/#2-toc-title" target="_blank" style="color: #488303;">Docs</a></p>

    <ul class="rewarvlsss"><li><label><?php echo esc_html__('Discount Type','mini-cart-for-woocommerce') ?></label>
        <select id="whmc_reward_distype" name="whmc_sidepanel[whmc_reward_distype]">
    
    <option value="percentage" <?php
        echo esc_attr($whmc_reward_distype) == "percentage" ? 'selected' : '';?>><?php echo esc_html__('Percentage','mini-cart-for-woocommerce') ?></option>    
    <option value="fixedoff" <?php
        echo esc_attr($whmc_reward_distype) == "fixedoff" ? 'selected' : '';?>><?php echo esc_html__('Fixed Amount','mini-cart-for-woocommerce') ?></option>       
    </select> <p style="color:#858585">Percentage: Discount to customer as percentage on total cart amount</p>
<p style="color:#858585">Fixed Amount: Discount as fixed amount after target cart amount</p></li> 

<?php 
        printf('<li><label>'.esc_html__('Discount Value','mini-cart-for-woocommerce').' <span style="color:#df3030">*</span> </label><input type="text" name="whmc_sidepanel[whmc_reward_disval]" value="%s" id="whmc_reward_disval"><p style="color:#858585">Input a value to activate the discount bar, e.g. percentage/Fixed amount: 10</p></li>',esc_attr($whmc_reward_disval));

        printf('<li><label>'.esc_html__('Target Cart Amount','mini-cart-for-woocommerce').' <span style="color:#df3030">*</span> </label><input type="text" name="whmc_sidepanel[whmc_reward_disachve]" value="%s" id="whmc_reward_disachve"><p style="color:#858585">'.esc_html__('Input the target cart amount, which will be discounted on arrival','mini-cart-for-woocommerce').'</p></li>',esc_attr($whmc_reward_disachve));

        printf('<li><label>'.esc_html__('Title in the Reward Bar','mini-cart-for-woocommerce').'</label><input type="text" name="whmc_sidepanel[whmc_reward_dis]" value="%s" id="whmc_reward_dis"></li>',esc_attr($whmc_reward_dis)); ?>
    <li><strong><label><?php echo esc_html('Add Icon','mini-cart-for-woocommerce') ?><sup class="whmcnews">New</sup></label></strong>

    <select id="whmc_reward_iocn"  class="default">
    <option value="gg-gift" <?php
        echo esc_attr($whmc_reward_iocn) == "gg-gift" ? 'selected' : '';?>>Gift icon -1</option>    
     <option value="gg-crown" <?php
        echo esc_attr($whmc_reward_iocn) == "gg-crown" ? 'selected' : '';?>>Gift icon -2</option>       
     <option value="gg-coffee" <?php
        echo esc_attr($whmc_reward_iocn) == "gg-coffee " ? 'selected' : '';?>>Gift icon -3</option>      

        <option value="gg-bulb" <?php
        echo esc_attr($whmc_reward_iocn) == "gg-bulb" ? 'selected' : '';?>>Gift icon -5</option>


        <option value="gg-bolt" <?php
        echo esc_attr($whmc_reward_iocn) == "gg-bolt" ? 'selected' : '';?>>Gift icon -5</option>

        
        <option value="gg-awards" <?php
        echo esc_attr($whmc_reward_iocn) == "gg-awards" ? 'selected' : '';?>>Gift icon -5</option>

        
        <option value="gg-trophy" <?php
        echo esc_attr($whmc_reward_iocn) == "gg-trophy" ? 'selected' : '';?>>Gift icon -6</option>

        
        <option value="gg-check-r" <?php
        echo esc_attr($whmc_reward_iocn) == "gg-check-r" ? 'selected' : '';?>>Gift icon -4</option>                   
       
     <option value="icon_d-2" <?php
        echo esc_attr($whmc_reward_iocn) == "icon_d-2" ? 'selected' : '';?>>icon_d-2</option>    
    <option value="icon_d-4" <?php
        echo esc_attr($whmc_reward_iocn) == "icon_d-4" ? 'selected' : '';?>>icon_d-4</option>         
    <option value="icon_d-3" <?php
        echo esc_attr($whmc_reward_iocn) == "icon_d-3" ? 'selected' : '';?>>icon_d-3</option>         
    <option value="icon_d-5" <?php
        echo esc_attr($whmc_reward_iocn) == "icon_d-5" ? 'selected' : '';?>>icon_d-5</option>                
    <option value="icon_d-7" <?php
        echo esc_attr($whmc_reward_iocn) == "icon_d-7" ? 'selected' : '';?>>icon_d-7</option>         
    <option value="icon_d-8" <?php
        echo esc_attr($whmc_reward_iocn) == "icon_d-8" ? 'selected' : '';?>>icon_d-8</option>                  
    <option value="icon_d-10" <?php
        echo esc_attr($whmc_reward_iocn) == "icon_d-10" ? 'selected' : '';?>>icon_d-10</option>         
    <option value="icon_d-11" <?php
        echo esc_attr($whmc_reward_iocn) == "icon_d-11" ? 'selected' : '';?>>icon_d-11</option>
   
    <option id="defaulrts" value="whmcNone" <?php
        echo esc_attr($whmc_reward_iocn) == "whmcNone" ? 'selected' : '';?>>None</option>  

    </select></li>
       <?php printf('<li><label>'.esc_html__('Message','mini-cart-for-woocommerce').'</label><input type="text" name="whmc_sidepanel[whmc_reward_dismesga]"  id="whmc_reward_dismesga" value="%s" class="widefat"><p style="color:#858585">Use code {{discount_amount}} for remaining value</p></li>',esc_attr($whmc_reward_dismesga));

        printf('<li><label>'.esc_html__('Title on Cart','mini-cart-for-woocommerce').'</label><input type="text" name="whmc_sidepanel[whmc_reward_distitoncart]" value="%s" id="whmc_reward_distitoncart" placeholder="%s Discount"><p style="color:#858585">Title on cart and checkout page</p></li></ul>',esc_attr($whmc_reward_distitoncart), esc_attr($disuntamo));


    }

public function wmhc_rewardstyling()
    {

        $sidepanels = get_option('whmc_sidepanel');


        $whmc_progress_type = isset($sidepanels['whmc_progress_type']) ? $sidepanels['whmc_progress_type'] : "srtipe"; 
        $whmc_progbarcolor = isset($sidepanels['whmc_progbarcolor']) ? $sidepanels['whmc_progbarcolor'] : "#e9e9e9"; 
        $whmc_progress_color = isset($sidepanels['whmc_progress_color']) ? $sidepanels['whmc_progress_color'] : "#5ba9d1"; 
        $whmc_progress_pos = isset($sidepanels['whmc_progress_pos']) ? $sidepanels['whmc_progress_pos'] : "header"; 
        $whmc_prgbgclr = isset($sidepanels['whmc_prgbgclr']) ? $sidepanels['whmc_prgbgclr'] : "#fff"; 
        $whmc_prgbgfnt = isset($sidepanels['whmc_prgbgfnt']) ? $sidepanels['whmc_prgbgfnt'] : "17"; 


        ?>
    <ul class="rewarvlsss">
    <li><label>Reward bar value as</label>
        <select>
    
    <option value="subtotal"><?php echo esc_html__('Cart Subtotal','mini-cart-for-woocommerce') ?></option>    
    <option value="subtotal_tax"><?php echo esc_html__('Cart Subtotal including Tax','mini-cart-for-woocommerce') ?></option>    
   
    </select> <p><em>The value to be used to fill the rewrad bar</em></p></li> 


    <li><label>Reward Bar Position</label>
        <select id="whmc_progress_pos" name="whmc_sidepanel[whmc_progress_pos]">
    
    <option value="header" <?php echo esc_attr($whmc_progress_pos) == "header" ? 'selected' : '';?>><?php echo esc_html__('Header','mini-cart-for-woocommerce') ?></option>    
    <option value="bfproduct" <?php echo esc_attr($whmc_progress_pos) == "bfproduct" ? 'selected' : '';?>><?php echo esc_html__('Before Products','mini-cart-for-woocommerce') ?></option>     
    <option value="afproduct" <?php echo esc_attr($whmc_progress_pos) == "afproduct" ? 'selected' : '';?>><?php echo esc_html__('After Products','mini-cart-for-woocommerce') ?></option>     
    <option value="bottomstart" <?php echo esc_attr($whmc_progress_pos) == "bottomstart" ? 'selected' : '';?>><?php echo esc_html__('Bottom Start','mini-cart-for-woocommerce') ?>     
    <option value="bottomend" <?php echo esc_attr($whmc_progress_pos) == "bottomend" ? 'selected' : '';?>><?php echo esc_html__('Bottom End','mini-cart-for-woocommerce') ?></option>       
    </select> </li> 


    <li><label>Reward Bar Type</label>
        <select id="whmc_progress_type" name="whmc_sidepanel[whmc_progress_type]">
    
    <option value="srtipe" <?php
        echo esc_attr($whmc_progress_type) == "srtipe" ? 'selected' : '';?>><?php echo esc_html__('Striped','mini-cart-for-woocommerce') ?></option>    
    <option value="solid" <?php
        echo esc_attr($whmc_progress_type) == "solid" ? 'selected' : '';?>><?php echo esc_html__('Solid','mini-cart-for-woocommerce') ?></option>       
    </select> </li>     

    <?php 

        printf('<li><label>'.esc_html__('Reward Bar color','mini-cart-for-woocommerce').'</label><input type="text" name="whmc_sidepanel[whmc_progress_color]"  id="whmc_progress_color" value="%s" class="widefat"></li>',esc_attr($whmc_progress_color));
        printf('<li><label>'.esc_html__('Bar color','mini-cart-for-woocommerce').'</label><input type="text" name="whmc_sidepanel[whmc_progbarcolor]"  id="whmc_progbarcolor" value="%s" class="widefat"></li>',esc_attr($whmc_progbarcolor));

        printf('<li><label>'.esc_html__('Wrapper Background','mini-cart-for-woocommerce').'</label><input type="text" name="whmc_sidepanel[whmc_prgbgclr]"  id="whmc_prgbgclr" value="%s" class="widefat"></li>',esc_attr($whmc_prgbgclr));
        printf('<li><label>'.esc_html__('Font Size (Message)','mini-cart-for-woocommerce').'</label><input type="number" min="10" max="20" name="whmc_sidepanel[whmc_prgbgfnt]" id="whmc_prgbgfnt" value="%s"></li></ul>',esc_attr($whmc_prgbgfnt));

    }



    public function wmhc_sidebar_freeship()
    {

        $options = get_option('whmc_sidepanel');
        $whmc_reward_ship = isset($options['whmc_reward_ship']) ? $options['whmc_reward_ship'] : "Free Shipping";

        $whmc_reward_shipmesga = isset($options['whmc_reward_shipmesga']) ? $options['whmc_reward_shipmesga'] : "You're {{free_shipping}} away from Free Shipping"; 
        $whmc_rewrcship = isset($options['whmc_rewrcship']) ? $options['whmc_rewrcship'] : "icon_ship";
           ?>      

        <p style="color:#4a8702;background: #e6f7d2;margin-bottom: 20px;padding: 6px 5px;">This bar will only be active if your site has WooCommerce Free Shipping enabled. <a href="https://woominicart.sharabindu.com/docs/sidebar-setting/#18-toc-title" target="_blank" style="color: #488303;"> How to Set Up WooCommerce Shipping</a></p>


        <?php
        printf('<ul class="rewarvlsss"><li><label>'.esc_html__('Title in the Reward Bar','mini-cart-for-woocommerce').'</label><input type="text" name="whmc_sidepanel[whmc_reward_ship]" value="%s" id="whmc_reward_ship"></li>',esc_attr($whmc_reward_ship));

        printf('<li><label>Message</label><input type="text" name="whmc_sidepanel[whmc_reward_shipmesga]"  id="whmc_reward_shipmesga" value="%s" class="widefat"><p style="color:#858585">Use code {{free_shipping}} for remaining value</p></li>',esc_attr($whmc_reward_shipmesga)); ?>

    <li><strong><label><?php echo esc_html('Add Icon','mini-cart-for-woocommerce') ?><sup class="whmcnews">New</sup></label></strong>

    <select id="whmc_rewrcship"  class="default">
     
     <option value="icon_pen" <?php
        echo esc_attr($whmc_rewrcship) == "icon_pen" ? 'selected' : '';?>>icon_pen</option>       
     <option value="icon_local_shipping" <?php
        echo esc_attr($whmc_rewrcship) == "icon_local_shipping" ? 'selected' : '';?>>icon_local_shipping</option>    

    <option value="icon_t-10" <?php
        echo esc_attr($whmc_rewrcship) == "icon_t-10" ? 'selected' : '';?>>icon_t-10</option>         
    <option value="icon_t-9" <?php
        echo esc_attr($whmc_rewrcship) == "icon_t-9" ? 'selected' : '';?>>icon_t-9</option>         
    <option value="icon_ship" <?php
        echo esc_attr($whmc_rewrcship) == "icon_ship" ? 'selected' : '';?>>icon_ship</option>              
    <option value="icon_rocket" <?php echo esc_attr($whmc_rewrcship) == "icon_rocket" ? 'selected' : '';?>>icon_rocket</option> 

  <option value="gg-gift" <?php
        echo esc_attr($whmc_rewrcship) == "gg-gift" ? 'selected' : '';?>>Gift icon -1</option>    
     <option value="gg-crown" <?php
        echo esc_attr($whmc_rewrcship) == "gg-crown" ? 'selected' : '';?>>Gift icon -2</option>       
     <option value="gg-coffee" <?php
        echo esc_attr($whmc_rewrcship) == "gg-coffee" ? 'selected' : '';?>>Gift icon -3</option>      

        <option value="gg-bulb" <?php
        echo esc_attr($whmc_rewrcship) == "gg-bulb" ? 'selected' : '';?>>Gift icon -5</option>


        <option value="gg-bolt" <?php
        echo esc_attr($whmc_rewrcship) == "gg-bolt" ? 'selected' : '';?>>Gift icon -5</option>

        
        <option value="gg-awards" <?php
        echo esc_attr($whmc_rewrcship) == "gg-awards" ? 'selected' : '';?>>Gift icon -5</option>

        
        <option value="gg-trophy" <?php
        echo esc_attr($whmc_rewrcship) == "gg-trophy" ? 'selected' : '';?>>Gift icon -6</option>

        
        <option value="gg-check-r" <?php
        echo esc_attr($whmc_rewrcship) == "gg-check-r" ? 'selected' : '';?>>Gift icon -4</option>


     <option value="whmcNone" <?php
        echo esc_attr($whmc_rewrcship) == "whmcNone" ? 'selected' : '';?>>whmcNone</option>

    </select>
    </li></ul>
    <?php
    }
    public function  wmhc_sidebar_relatedproduct()
    {

        $options = get_option('whmc_sidepanel');

        $whmc_suggest_products = isset($options['whmc_suggest_products']) ? $options['whmc_suggest_products'] : "5";

        $whmc_suggest_title = isset($options['whmc_suggest_title']) ? $options['whmc_suggest_title'] : "Products you may like";



    printf('<ul class="rewarvlsss"><li><label>'.esc_html__("Disable", "mini-cart-for-woocommerce").':</label><p style="margin:0"><input type="checkbox" class="whmc_apple-switch"   %s id="wmhc_cart_suggestpro" style="margin:0"></p><p style="color:#858585">Click to disable display of recommended products.</p></li>', (isset($options['wmhc_cart_suggestpro']) && $options['wmhc_cart_suggestpro'] == 'wmhc_cart_suggestpro') ? 'checked' : '');

    printf('<li><label>'.esc_html__("Enable on mobile devices", "mini-cart-for-woocommerce").': <sup class="whmcnews">New</sup></label><p style="margin:0"><input type="checkbox" class="whmc_apple-switch"  %s id="wmhc_suggestpro_mob"  style="margin:0"></p><p style="color:#858585">Show suggested products on mobile.</p></li>', (isset($options['wmhc_suggestpro_mob']) && $options['wmhc_suggestpro_mob'] == 'wmhc_suggestpro_mob') ? 'checked' : '');


        ?>


    <li><label><?php echo esc_html__('Type','mini-cart-for-woocommerce') ?></label>
        <select id="wmhc_suggestpro_type">
    
    <option value="cross_sells"><?php echo esc_html__('Cross-Sells','mini-cart-for-woocommerce') ?></option>    
    <option value="up_sells"><?php echo esc_html__('Up-Sells','mini-cart-for-woocommerce') ?></option>   
    <option value="related" selected><?php echo esc_html__('Related','mini-cart-for-woocommerce') ?></option>       
    </select> </li> 

    <li><label><?php echo esc_html__('Location','mini-cart-for-woocommerce') ?></label>
        <select id="wmhc_suggestpro_location" >
    
    <option value="cart-items"><?php echo esc_html__('After Cart Items','mini-cart-for-woocommerce') ?></option>    
    <option value="footer"><?php echo esc_html__('Footer','mini-cart-for-woocommerce') ?></option>   
    <option value="drawer"selected><?php echo esc_html__('Drawer','mini-cart-for-woocommerce') ?></option>       
    </select> </li> 
    <li id="wmhc_suggestpro_loca_mob" ><label><?php echo esc_html__('Location (Mobile)','mini-cart-for-woocommerce') ?> <sup class="whmcnews">New</sup></label>
        <select>
    
    <option value="cart-items" selected><?php echo esc_html__('After Cart Items','mini-cart-for-woocommerce') ?></option>    
    <option value="footer"><?php echo esc_html__('Footer','mini-cart-for-woocommerce') ?></option>          
    </select> 
    <p style="color:#858585"><em>The slider is optimized for and visible on mobile devices</em></p>   
</li> 


<?php 

    printf('<li><label>'.esc_html__("RTL Support for Slider", "mini-cart-for-woocommerce").':</label><p style="margin:0"><input type="checkbox" class="whmc_apple-switch"  value="wmhc_suggesttrl" %s id="wmhc_suggesttrl"  style="margin:0"></p><p style="color:#858585">Turn on the switcher for slider RTL support.</p></li>', (isset($options['wmhc_suggesttrl']) && $options['wmhc_suggesttrl'] == 'wmhc_suggesttrl') ? 'checked' : '');



        echo '<li><label>'.esc_html__('Number of Products','mini-cart-for-woocommerce').'</label><input type="text"  value="5" id="whmc_suggest_products"><p style="color:#858585">Display the number of recommended products, -1 for all displays</p></li>';

        echo '<li><label>'.esc_html__('Title','mini-cart-for-woocommerce').'</label><input type="text" value="Products you may like" id="whmc_suggest_title"></li></ul>';


    }
       public function wmhc_cart_viewcart(){

        $sidepanels = get_option('whmc_sidepanel');

        $wmhc_cart_viewcart = isset($sidepanels['wmhc_cart_viewcart']) ? $sidepanels['wmhc_cart_viewcart'] : 'View Cart';    
 
        $whmccartlocation = isset($sidepanels['whmccartlocation']) ? $sidepanels['whmccartlocation'] : 'checkoutbtn'; 

        $whmccartpostion = isset($sidepanels['whmccartpostion']) ? $sidepanels['whmccartpostion'] : 'row';    
        $wmhc_viewcart_link = isset($sidepanels['wmhc_viewcart_link']) ? $sidepanels['wmhc_viewcart_link'] : wc_get_cart_url();   
        printf('<ul class="whmc_ptc_wrape_tb" ><li><strong class="whmc_ptc_tb"><label>'.esc_html__("Remove this", "mini-cart-for-woocommerce").'</label></strong><input type="checkbox" name="whmc_sidepanel[wmhc_cart_hidecart]" class="whmc_apple-switch" id="wmhc_cart_hidecart" value="wmhc_cart_hidecart" %s></li>', (isset($sidepanels['wmhc_cart_hidecart']) && $sidepanels['wmhc_cart_hidecart'] == 'wmhc_cart_hidecart') ? 'checked' : '');
        printf('<li><strong class="whmc_ptc_tb"><label >'.esc_html__("Button Label", "mini-cart-for-woocommerce").'</label></strong><input type="text" name="whmc_sidepanel[wmhc_cart_viewcart]" value="%s"  placeholder="View Cart" id="wmhc_cart_viewcart"></li>', esc_attr($wmhc_cart_viewcart));

        printf('<li><strong class="whmc_ptc_tb"><label >'.esc_html__("Page Link", "mini-cart-for-woocommerce").'</label></strong><input type="text" name="whmc_sidepanel[wmhc_viewcart_link]" value="%s"  id="wmhc_viewcart_link" class="widefat"></li>', esc_attr($wmhc_viewcart_link));

        ?><li><strong class="whmc_ptc_tb"><label ><?php echo esc_html__("Location", "mini-cart-for-woocommerce")?></label></strong>
<select id="whmccartlocation" name="whmc_sidepanel[whmccartlocation]">
    <option value="checkoutbtn" <?php echo esc_attr($whmccartlocation) == "checkoutbtn" ? 'selected' : ''; ?>>
        <?php echo esc_html__('Beside Checkout Button','mini-cart-for-woocommerce'); ?>
    </option>    
    <option value="shipbtn" <?php echo esc_attr($whmccartlocation) == "shipbtn" ? 'selected' : ''; ?>>
        <?php echo esc_html__('Beside Shipping Button','mini-cart-for-woocommerce'); ?>
    </option>    
</select>

</li>
<p style="margin-bottom: 20px;font-size: 13px;"><em>Note: The View Cart button is placed beside the Shipping button. Make sure the Keep Shopping button remains enabled.</em></p>
    <li><strong class="whmc_ptc_tb"><label ><?php echo esc_html__("Position", "mini-cart-for-woocommerce")?></label></strong>
    <select id="whmccartpostion" name="whmc_sidepanel[whmccartpostion]" >
    <option value="row" <?php
    echo esc_attr($whmccartpostion) == "row" ? 'selected' : '';?>><?php echo esc_html__('Row','mini-cart-for-woocommerce') ?></option>       
    <option value="row-reverse" <?php
    echo esc_attr($whmccartpostion) == "row-reverse " ? 'selected' : '';?>><?php echo esc_html__('Row Reverse','mini-cart-for-woocommerce') ?></option>    
    <option value="column" <?php
        echo esc_attr($whmccartpostion) == "column" ? 'selected' : '';?>><?php echo esc_html__('Column','mini-cart-for-woocommerce') ?></option>    
    <option value="column-reverse" <?php
        echo esc_attr($whmccartpostion) == "column-reverse" ? 'selected' : '';?>><?php echo esc_html__('Column Reverse','mini-cart-for-woocommerce') ?></option>      

    </select></li></ul>
    <?php }

}

if(class_exists('WHMC_Admin_Sidebar')){

    new WHMC_Admin_Sidebar();
}

