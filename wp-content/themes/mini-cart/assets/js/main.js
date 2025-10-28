jQuery(document).ready(function ($) {

    function displayMessage(type, text) {
        $('#newsletter-message').html('<p class="text-' + type + '">' + text + '</p>');
    }

    $('#newsletter-form').on('submit', function (e) {
        e.preventDefault();

        let email = $('#newsletter-email').val();
        if (!email || !/^\S+@\S+\.\S+$/.test(email)) {
            displayMessage('danger', 'Please enter a valid email.');
            return;
        }

        let $btn = $(this).find('button[type="submit"]');
        $btn.prop('disabled', true).text('Submitting...');
        displayMessage('info', 'Submitting...');

        // AJAX call to WordPress handler
        $.post(ms_ajax.ajax_url, {
            action: 'newsletter_signup',
            nonce: ms_ajax.nonce,
            email: email
        }, function (response) {
            if (response.success) {
                displayMessage('success', response.data.message);
                $('#newsletter-form')[0].reset();
            } else {
                displayMessage('danger', response.data.message);
            }
            $btn.prop('disabled', false).text('Subscribe');
        }).fail(function () {
            displayMessage('danger', 'Something went wrong. Please try again.');
            $btn.prop('disabled', false).text('Subscribe');
        });
    });

});




//RESET OF THE filter JS FILE BELOW
jQuery(document).ready(function ($) {
  function loadProducts() {
    let formData = {
      action: 'filter_products',
      product_cat: $('#product_cat').val(),
      sort: $('#sort').val(),
    };

    $('#product-results').fadeTo(200, 0.5); // smooth fade while loading

    $.post(ms_ajax.ajax_url, formData, function (response) {
      $('#product-results').html(response).fadeTo(200, 1);
    });
  }

  // Auto trigger when a filter changes
  $('#product_cat, #sort').on('change', function () {
    loadProducts();
  });

  // Reset filters
  $('#reset-filters').on('click', function () {
    $('#product_cat').val('');
    $('#sort').val('');
    loadProducts();
  });
});
