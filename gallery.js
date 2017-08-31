jQuery(function() {
  // Set exact width and height on every image so that the layout is correct
  // before all the images load.
  jQuery(".gallery").each(function() {
    var max_width = jQuery(this).width();
    if (max_width <= 0) {
      return;
    }

    // From the max-height in gallery.css.
    var max_height = 180;

    jQuery(this).find("img").each(function() {
      if (this.complete) {
        // We don't need to set the dimensions if the browser already has them.
        return;
      }

      var width = parseFloat(this.getAttribute("width"));
      var height = parseFloat(this.getAttribute("height"));
      if (width === NaN || width <= 0 || height === NaN || height <= 0) {
        return;
      }

      if (width > max_width) {
        height = height * max_width / width;
        width = max_width;
      }

      if (height > max_height) {
        width = width * max_height / height;
        height = max_height;
      }

      jQuery(this).css({
        "width": Math.round(width) + "px",
        "height": Math.round(height) + "px",
        });
    });
  });
});
