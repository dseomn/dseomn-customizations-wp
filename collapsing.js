jQuery(function() {
  // A post will be collapsed iff it's taller than collapse_if_above.
  var rem_to_px = jQuery("<div style=\"width: 1rem;\"></div>").width();
  var collapse_if_above = 450 * rem_to_px;

  jQuery(".dseomn-is-collapsed").prop("checked", function() {
    var content = jQuery(this).next(".entry").find(".entry-content").get(0);
    return content !== undefined && content.scrollHeight > collapse_if_above;
  });
});
