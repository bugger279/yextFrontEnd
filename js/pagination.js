$(document).ready(function() {
  var show_per_page = 6;
  var number_of_items = $(".location-wrappper").length;
  var number_of_pages = Math.ceil(number_of_items / show_per_page);

  $("#current_page").val(0);
  $("#show_per_page").val(show_per_page);

  var navigation_html = '<a class="previous_link btn btn-primary" href="javascript:previous();">Prev</a>';
  var current_link = 0;
  while (number_of_pages > current_link) {
    navigation_html += '<a class="page_link btn btn-primary" href="javascript:go_to_page(' + current_link + ')" longdesc="' + current_link + '">' + (current_link + 1) + "</a>";
    current_link++;
  }
  navigation_html += '<a class="next_link btn btn-primary" href="javascript:next();">Next</a>';
  $("#page_navigation").html(navigation_html);
  $("#page_navigation .page_link:first").addClass("active disabled");

  $(".location-wrappper")
    .css("display", "none");

  $(".location-wrappper")
    .slice(0, show_per_page)
    .css("display", "block");
});

function previous() {
  new_page = parseInt($("#current_page").val()) - 1;
  if ($(".active").prev(".page_link").length == true) {
    go_to_page(new_page);
  }
}

function next() {
  new_page = parseInt($("#current_page").val()) + 1;
  if ($(".active").next(".page_link").length == true) {
    go_to_page(new_page);
  }
}
function go_to_page(page_num) {
  var show_per_page = parseInt($("#show_per_page").val());
  start_from = page_num * show_per_page;
  end_on = start_from + show_per_page;

  $(".location-wrappper")
    .css("display", "none")
    .slice(start_from, end_on)
    .css("display", "block");

  $(".page_link[longdesc=" + page_num + "]")
    .addClass("active disabled")
    .siblings(".active")
    .removeClass("active disabled");

  $("#current_page").val(page_num);
}
