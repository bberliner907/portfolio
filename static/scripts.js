
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

function item(id) {
  var entry = "#" + id;
  var section = ".category-" + $(entry).parents(".section").attr("id");
  
  var elem = $("#searchtemplate").clone(true);
  elem.removeAttr("id");
  elem.css("display", "block");
  
  var img = elem.find("img");
  var orig = $("img[name=" + id + "]");
  img.attr("src", orig.attr("src"));
  img.attr("width", Math.ceil(orig.attr("width") / 1.5));
  img.attr("height", Math.ceil(orig.attr("height") / 1.5));
  
  var link = elem.find("a");
  link.each(function() {
    $(this).attr("onclick", "display(['" + entry + "', '" + section + "']); return false;");
    if ($(this).hasClass("searchlink")) $(this).html($(entry + " .title h4").html());
  });
  
  elem.find(".searchcat").html($(entry).parents(".section").find("h2").html());
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
