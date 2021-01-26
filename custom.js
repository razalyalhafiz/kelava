/* Add your JavaScript code here.

If you are using the jQuery library, then don't forget to wrap your code inside jQuery.ready() as follows:

jQuery(document).ready(function( $ ){
    // Your code in here
});

--

If you want to link a JavaScript file that resides on another server (similar to
<script src="https://example.com/your-js-file.js"></script>), then please use
the "Add HTML Code" page, as this is a HTML code that links a JavaScript file.

End of comment */

jQuery(document).ready(function ($) {
  // Auto-expand FAQ and remove click event handler
  $(".close-faq").addClass("open-faq")
  $(".hrf-content").css("display", "block")

  // Open social links in a new tab
  $(".ssi-facebook a").attr("target", "_blank")
  $(".ssi-instagram a").attr("target", "_blank")

  // Remove link to product page in cart widget
  $(".cart-wrap").hover(function () {
    $(".woocommerce-mini-cart-item a").removeAttr("href")
  })

  // Standardize input type to text in checkout page
  $("#billing_phone").attr("type", "text")

  // Change copyright text in footer
  $(".copyright-text").html(
    "Copyright © 2021 <a href='https://kelava.my/'>Kelava</a>"
  )
})
