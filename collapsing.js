jQuery(function() {
  var expand_up_to = 1.5;

  jQuery(".dseomn-is-collapsed:checked").each(function() {
    var content = jQuery(this).next(".entry").find(".entry-content").get(0);
    if (content === undefined) {
      return;
    }

    if (content.scrollHeight < expand_up_to * content.clientHeight) {
      this.checked = false;
    }
  });
});
