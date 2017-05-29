$(function(){
  $(".menu i").hide();
  $("#showmenu").on('click',function(){
    if($(".side-menu").width() > "60"){
      $(".side-menu").animate({width: '-=205px'});
      $(".main-section").animate({'margin-left': '-=205px'});
      $(".logo").html(" <a href='./index.php'> <img class='iconlogo' src='img/logo2.png'> </a>" );
      $("span.text").hide();
      $(".menu i").show();

    }
    else {
        $(".side-menu").animate({width: '+=205px'});
        $(".main-section").animate({'margin-left': '+=205px'});
        $(".logo").html(" <a href='./index.php'> <p style='width: 230px; margin-top: 0px;'> Flovei <img class='iconlogo' src='img/logo2.png'></p>  </a>" );
        $("span.text").show("slow");
        $(".menu i").hide();
    }

  });

});

$(function() {

    var menu_ul = $('.menu > li > ul'),
           menu_a  = $('.menu > li > a');

    menu_ul.hide();

    menu_a.click(function(e) {
        e.preventDefault();
        if(!$(this).hasClass('active')) {
            menu_a.removeClass('active');
            menu_ul.filter(':visible').slideUp('normal');
            $(this).addClass('active').next().stop(true,true).slideDown('normal');
        } else {
            $(this).removeClass('active');
            $(this).next().stop(true,true).slideUp('normal');
        }
    });

});

$(document).ready(function() {
  $.ajax({
  url: "todosDatos.php",
  type: "POST",
  dataType: "html",
  cache: false,
  contentType: false,
  processData: false,
  }).done(function(echo){
      $("#resultadoBusqueda").html(echo);
  });
});

function buscar() {
var textoBusqueda = $("input#busqueda").val();

 if (textoBusqueda != "") {
    $.post("buscar.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
        $("#resultadoBusqueda").html(mensaje);
});
 } else {
   $.ajax({
     url: "todosDatos.php",
     type: "POST",
     dataType: "html",
     cache: false,
     contentType: false,
     processData: false,
 }).done(function(echo){
     $("#resultadoBusqueda").html(echo);
 });
    };
};
