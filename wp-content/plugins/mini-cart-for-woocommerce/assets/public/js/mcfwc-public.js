(function ($) {
   jQuery(document).ready(function () {
	   	  console.log(whmc_frontend_js_obj.enablenotify);
	  console.log(whmc_frontend_js_obj.nofidesign);
      function block_cart() {
         $('.whmc-body').addClass('whmc-loader')
      }

      function unblock_cart() {
         $('.whmc-body').removeClass('whmc-loader')
      }
      var ajaxUrl = whmc_frontend_js_obj.ajax_url;
      $(document.body).on('wc_fragments_refreshed wc_fragments_loaded updated_checkout', function () {
         unblock_cart()
      });

      function updateFragments(response) {
         if (response.fragments) {
            $.each(response.fragments, function (key, value) {
               $(key).replaceWith(value)
            });
            if (typeof wc_cart_fragments_params !== 'undefined' && ('sessionStorage' in window && window.sessionStorage !== null)) {
               sessionStorage.setItem(wc_cart_fragments_params.fragment_name, JSON.stringify(response.fragments));
               localStorage.setItem(wc_cart_fragments_params.cart_hash_key, response.cart_hash);
               sessionStorage.setItem(wc_cart_fragments_params.cart_hash_key, response.cart_hash);
               if (response.cart_hash) {
                  sessionStorage.setItem('wc_cart_created', (new Date()).getTime())
               }
            }
            $(document.body).trigger('wc_fragments_refreshed')
         }
      };
      $.ajax({
         url: ajaxUrl,
         type: 'POST',
         data: {
            action: 'get_refresh_fragments',
         },
         success: function (response) {
            if (response.fragments) {
               $.each(response.fragments, function (key, value) {
                  $(key).replaceWith(value)
               });
               if (('sessionStorage' in window && window.sessionStorage !== null)) {
                  sessionStorage.setItem(wc_cart_fragments_params.fragment_name, JSON.stringify(response.fragments));
                  sessionStorage.setItem(wc_cart_fragments_params.cart_hash_key, response.cart_hash);
                  localStorage.setItem(wc_cart_fragments_params.cart_hash_key, response.cart_hash);
                  if (response.cart_hash) {
                     sessionStorage.setItem('wc_cart_created', (new Date()).getTime())
                  }
               }
               $(document.body).trigger('wc_fragments_refreshed')
            }
         }
      });
      $(document).on('click', '.whmc-remove', function (e) {
         e.preventDefault();
         $('.whmc-body').addClass('whmc-loader');
         var cart_item_key = $(this).attr("data-cart_item_key");
         $.ajax({
            url: ajaxUrl,
            type: 'POST',
            data: {
               action: "remove_item",
               cart_item_key: cart_item_key,
            },
            success: function (response) {
               updateFragments(response);
               $('.whmc-body').removeClass('whmc-loader')
            }
         })
      });
	  
	  
$(document.body).on('added_to_cart', function (e, response, hash, $button) {
      var prod_id = $button.data('product_id');
      var prod_name = $button.data('product_name');
      var prod_namess = $button.val();
      var prod_img = $button.data('product_image');
      if (prod_name && prod_img) {
         var prod_imgs = '<img src="' + prod_img + '" alt="' + prod_name + '">';
         var prod_names = prod_name;
         var prod_imgg = prod_img
      } else if (prod_namess) {
         var prod_imgs = '';
         var prod_names = $('.product_title').text();
         var prod_imgg = $('.woocommerce-product-gallery__image').attr('data-thumb')
      } else {
         var prod_names = '';
         var prod_imgs = '';
         var prod_imgg = ''
      }
      updateFragments({
         fragments: response
      });
	  

      if ( (!$('.single-product').length) || ($button.closest('.related, .upsells, .cross-sells,.add_to_cart_button').length) ) {
         if (whmc_frontend_js_obj.enablenotify == 'no') {
            $(".whmc_btm_notification").append('<span class="whmc-confetti-container"><i class="gg-check-o"></i><img src="' + prod_img + '" alt="' + prod_name + '">' + prod_name + ' ' + whmc_frontend_js_obj.addedText + '</span>')
         }
      }
      $('#pm_menu').addClass(whmc_frontend_js_obj.whmcpmopen);
      $('.shopping-cart,.whmc_btm_notification').addClass('active');
      $('.pm_overlay').addClass(whmc_frontend_js_obj.whmcpmshoe);
      $('body').addClass(whmc_frontend_js_obj.whmcfixed);
      $('.pm_overlay').removeClass(whmc_frontend_js_obj.whmcpmhide);
      setTimeout(function () {
         $('.whmc_btm_notification,.shopping-cart').removeClass('active');
         $(".whmc-sgeested-drawer").addClass("whmc-sgeested-drawer-active").delay(1000);
         $(".whmc_btm_notification").empty()
      }, 5000);

   });


   $(document.body).on('submit', 'form.cart', function (e) {
	   if(whmc_frontend_js_obj.ajaxenable === 'checked'){return;}
      var $form = $(e.currentTarget);
      if ($form.closest('.product').hasClass('product-type-external')) return;
      e.preventDefault();
      var $button = $form.find('button[type="submit"]'),
         productData = $form.serializeArray(),
         hasProductId = !1;
      $.each(productData, function (key, form_item) {
         if (form_item.name === 'productID' || form_item.name === 'add-to-cart') {
            if (form_item.value) {
               hasProductId = true;
               return !1
            }
         }
      })
      if (!hasProductId) {
         var is_url = $form.attr('action').match(/add-to-cart=([0-9]+)/),
            productID = is_url ? is_url[1] : !1
      }
      if ($button.attr('name') && $button.attr('name') == 'add-to-cart' && $button.attr('value')) {
         var productID = $button.attr('value')
      }
      if (productID) {
         productData.push({
            name: 'add-to-cart',
            value: productID
         })
      }
      productData.push({
         name: 'action',
         value: 'whmc_sal_add_to_cart'
      });
      addToCartAjax($button, productData)
   });

   function addToCartAjax($button, productData) {
      $button.addClass('loading');

      $(document.body).trigger('adding_to_cart', [$button, productData]);

      $.ajax({
         url: ajaxUrl,
         type: 'POST',
         data: $.param(productData),

         success: function (response) {
            // If fragments are returned, treat as success
            if (response.fragments) {
               // Update button state
               $button.removeClass('loading').addClass('added');

               // Trigger WooCommerce standard event
               $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $button]);
            }
         },

         complete: function () {
            // Show notice and clear it after delay
            $(".whmc-single-notice").slideDown().delay(5000).slideUp();
         },
         error: function (xhr, status, error) {
            console.log('Add to cart error:', error);
         }

      });
   }	  

   })
})(jQuery);
jQuery(document).ready(function ($) {
   !(function (s, e, t, i) {
      function o(e, t) {
         var thats = this;
         (thats.$body = s("body")), (thats.$clbtn = s(".cloasebtn")), (thats.$keepshop = s(".whmckeepshooping")), (thats.$elem = s(e)), (thats.options = s.extend({}, thats.config, t)), (thats.$toggler = thats.$body.find(thats.options.button || ".open")), thats.initialize()
      }(o.prototype.classes = {
         show: "pm_show",
         hide: "pm_hide",
         overlay: "pm_overlay",
         open: "pm_open"
      }), (o.prototype.initialize = function () {
         if ((this.initializeEvents(), this.$body.find("." + this.classes.overlay).length < 1)) {
            var e = s("<div>").addClass(this.classes.overlay + " " + this.classes.hide);
            this.$body.append(e)
         }
      }), (o.prototype.initializeEvents = function () {
         var s = this;
         this.$toggler.on("click", function () {
            s.toggleMenu("show")
         }), this.$clbtn.on("click", function () {
            s.toggleMenu("hide")
         }), this.$keepshop.on("click", function () {
            s.toggleMenu("hide")
         }), this.$body.on("click", "." + s.classes.overlay, function () {
            s.toggleMenu("hide")
         }), this.$clbtn.on("click", "." + s.classes.overlay, function () {
            s.toggleMenu("hide")
         }), this.$keepshop.on("click", "." + s.classes.overlay, function () {
            s.toggleMenu("hide")
         })
      }), (o.prototype.toggleMenu = function (s) {
         var e = "show" == s ? "addClass" : "removeClass";
         this.$elem[e](this.classes.open), this.toggleOverlay(s)
      }), (o.prototype.toggleOverlay = function (s) {
         var e = this,
            t = e.$body.find("." + e.classes.overlay);
         "show" == s ? t.addClass(e.classes.show).removeClass(e.classes.hide) : (t.removeClass(this.classes.show), setTimeout(function () {
            t.addClass(e.classes.hide)
         }, 500))
      }), (s.fn.pushmenu = function (s) {
         return this.each(function () {
            new o(this, s)
         })
      })
   })(jQuery, window, document), $("#pm_menu").pushmenu({
      button: "#open"
   }), $("#pm_menu").pushmenu({
      button: ".cart_menu_li"
   });
   jQuery(function ($) {
      $(document.body).on('wc_fragments_refreshed', function () {
         $('.shopping-cart').css('opacity', 1);
         $('.cart_menu_li').css('opacity', 1)
      })
   });
   
   
      $(document).on('click', '.cart_menu_li, .shopping-cart', function () {
      $('body').addClass('whnmfixedcart');
   });  
   
       $(document).on('click', '.pm_overlay , .cloasebtnwrap ,.whmckeepshooping', function () {
      $('body').removeClass('whnmfixedcart');
   });  
   
   
})