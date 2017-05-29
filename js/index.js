// jQuery to open and close side navigation

$(function(){
  var nav = $('.nav'),
      navBut = $('.navBut');

  navBut.click(function(){
    if(nav.width() === 0){
      nav.stop().animate({ width: '15%', opacity: '1.0' }, 300);
    } else {
      nav.stop().animate({ width: '0', opacity: '0.0' }, 300);
    }
  });
})
