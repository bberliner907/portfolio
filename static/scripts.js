
function toggle(to) {
  if ($('#' + to).css("display") == "none") {
    $('.entry, .category, #footer').hide();
    $('.page:visible').fadeOut(250);
    $('#' + to).fadeIn(250);
    $('.page-link.selected').removeClass('selected');
    $('#' + to + 'Link').addClass('selected');
  }
}

function display(show) {
  $('.entry, .category').hide();
  $(".filter").removeClass("selected");
  $('.page').fadeOut(250, function() {
    for (var s = 0; s < show.length; s++) {
      $(show[s]).fadeIn(250);
    }
    $("#footer").show();
    $(document).scrollTop(0);
  });
  $("#nav > span").removeClass('selected');
  if (show[0].indexOf(".") == 0) {
    var filter = '.filter-' + show[0].substr(1, show[0].length);
    $(filter).addClass("selected");
  }
}

function swap(id, to) {
  var chosen = "images/" + to;
  $(".entry img[name=" + id + "]").attr("src", chosen).parent().attr("href", chosen);
}

var pos = 0;

function expand(to) {
  var chosen = $(".entry img[name=" + to + "]").attr("src");
  //if (navigator.userAgent.match(/(iPod|iPhone|iPad|Android)/)) pos = $(".entry#" + to).offset().top;
  //else 
  pos = $(document).scrollTop();
  $("#zoom").children("img").attr("src", "").attr("src", chosen).parent().fadeIn(250);
  $("body").css("overflow", "hidden");
  $("#leader, #results").hide();
}

function collapse() {
  $('#zoom, #leader, #results').toggle();
  $('body').css('overflow', 'auto');
  //if (navigator.userAgent.match(/(iPod|iPhone|iPad|Android)/)) window.scrollTo(0, pos);
  //else 
  $(document).scrollTop(pos);
}
