# Custom Mini E-Commerce Website (WordPress + WooCommerce)

## Youtube unlisted video link - https://youtu.be/awxW8JWOMBk 

## Github repo link - https://github.com/punk-rocher/Mini-Cart.git

## Overview

This project is a custom mini e-commerce website built with WordPress and WooCommerce:

- Custom theme development from scratch using Blank Slate
- Responsive design using Bootstrap 5
- WooCommerce setup with 6 demo products
- Custom single product page with ACF fields (`product_material` and `shipping_note`)
- AJAX-enabled shop filters (Category & Price) with reset button
- Newsletter signup form connected to a mock API with AJAX submission
- Performance optimization via LiteSpeed Cache
- Security enhanced with Wordfence, HTTPS, and secure AJAX calls
- Fully responsive, modern design with header, footer, homepage, and My Account page

---

# Features

## Theme

- Custom lightweight theme
- Bootstrap 5 based responsive layout
- Modern header and footer styling
- Homepage with Hero section and Featured Products section

## WooCommerce

- Shop page with AJAX category & price filters
- Single product page override with ACF fields
- My Account page styled with Bootstrap
- Cart, Checkout, and Account pages excluded from caching

### API Integration

- Newsletter form in footer
- AJAX submission with nonce verification
- Mock API endpoint: `https://jsonplaceholder.typicode.com/posts`
- Dynamic success/error messages

### Performance & Security

- LiteSpeed Cache for page/object caching, CSS/JS minification, lazy load
- CSS/JS enqueued with `filemtime` for cache-busting
- Wordfence plugin installed for firewall and malware protection
- Secure AJAX calls, escaped outputs, sanitized inputs
- HTTPS enabled

---

## Installation

1. Clone the repository into your WordPress directory.
2. Import the database from the root folder and set up your site.
3. Log in to WordPress admin:
   - **Username:** admin
   - **Password:** admin
