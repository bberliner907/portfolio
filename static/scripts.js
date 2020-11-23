
var results = ['.entry', '.category'];
var qs = "?page=";
var pos = 0;

function toggle(to, pop) {
  if ($('#' + to).css("display") == "none") {
    if (!pop) {
      history.pushState(null, null, qs + to);
      ga('send', 'pageview', location.pathname + location.search);
    }
    $('.entry, .category, #footer').hide();
    $('.page:visible').fadeOut(250);
    $('#' + to).fadeIn(250);
    $('.page-link.selected').removeClass('selected');
    $('#' + to + 'Link').addClass('selected');
  }
}

function categories(tag) {
  var classes = [];
  $(tag).parent('.section').each(function() {
    classes[classes.length] = "." + $(this).children('.category').attr("class").split(' ').join('.');
  });
  return classes;
}

function display(show, pop) {
  if (show) {
    if (show.length == 1 && show[0].indexOf(".") == 0) show = show.concat(categories(show[0]));
    if (!pop) {
      history.pushState({ "show": show }, null, qs + "results");
      ga('send', 'pageview', location.pathname + location.search);
    }
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
    if (show[0].indexOf("#") == -1) {
      var filter = '.filter-' + show[0].substr(1, show[0].length);
      $(filter).addClass("selected");
    }
  }
}

$(window).on('popstate', function(e) {
  var index = location.search.lastIndexOf(qs);
  var to;
  if (index == -1) to = $('.page:first-child').attr("id");
  else to = location.search.substr(index + qs.length, location.search.length);
  if (to == "results") display((e.originalEvent.state.show || results), true);
  else toggle(to, true);
});

function item(id) {
  var entry = "#" + id;
  var section = ".category-" + $(entry).parents(".section").attr("id");
  
  var elem = $("#searchtemplate").clone(true);
  elem.removeAttr("id");
  elem.css("display", "block");
  
  var img = elem.find("img");
  var orig = $(".thumbs img[name=" + id + "]");
  img.attr("src", orig.attr("src"));
  img.attr("width", Math.ceil(orig.attr("width") / 1.5));
  img.attr("height", Math.ceil(orig.attr("height") / 1.5));
  
  var link = elem.find("a");
  link.each(function() {
    $(this).attr("onclick", "display(['" + entry + "', '" + section + "']); return false;");
    if ($(this).hasClass("searchlink")) $(this).html($(entry + " .title h4").html());
  });
  
  elem.find(".searchcat").html($(entry).find("td.owner").html());
  elem.find(".searchdate").html($(entry).find("td.date").html());
  $("#searched").append(elem);
}

function lookup(terms) {
  $("#searched").html("");
  if (terms) {
    $("#clear").show();
    terms = terms.toLowerCase().trim();
    var tagClass = terms.replace(/(\'|\"|\W)/g, "_");
    var results = [];
    $(".entry[class*=\"" + tagClass + "\"], .title h4, .desc, .owner").each(function() {
      if ($(this).hasClass("entry") && $(this).attr("class").match(tagClass)) {
        results.push($(this).attr("id"));
      } else {
        var entry = $(this).parents(".entry").attr("id");
        if (results.indexOf(entry) == -1) {
          if (!$("." + tagClass).length && $(this).html().toLowerCase().match(terms)) {
            results.push(entry);
          }
        }
      }
    });
    for (var r = 0; r < results.length; r++) {
      item(results[r]);
    }
    if (!results.length) {
      $("#searched").html("<p><em>No results found.</em><br><br></p>");
    }
  } else $("#clear").hide();
}

function swap(id, to) {
  var chosen = "images/large/" + to;
  $(".entry img[name=" + id + "]").attr("src", chosen).parent().attr("href", chosen);
}

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
