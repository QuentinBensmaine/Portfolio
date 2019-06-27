$('#go').click(function (e) {
  e.preventDefault();
  $('#Acceuil').fadeOut(1000);
  $('#sidebar').delay(1000).fadeIn(1000);
  $('#droite').delay(1100).fadeIn(1000);
  $('#description').delay(1200).fadeIn(1000);
})

$('.skills').click(function (e) {
  e.preventDefault();
  $('#skills').delay(1100).fadeIn(1000);
  $('#back').delay(1000).fadeIn(1000);
  $('#select').fadeOut(1000);
  $('#description').animate({left:'500px'}, "slow");
  $('#form').delay(100).fadeOut(1000)
  jQuery(document).ready(function(){
    jQuery('.skillbar').each(function(){
      jQuery(this).find('.skillbar-bar').animate({
        width:jQuery(this).attr('data-percent')
      },4000);
    });
  });
})

$('.exp').click(function (e) {
  e.preventDefault();
  $('#back').delay(1000).fadeIn(1000);
  $('#exp').delay(1100).fadeIn(1000);
  $('#select').fadeOut(1000);
  $('#description').animate({left:'500px'}, "slow");
  $('#form').delay(100).fadeOut(1000)
})

$('.diplomes').click(function (e) {
  e.preventDefault();
  $('#back').delay(1000).fadeIn(1000);
  $('#diplomes').delay(1100).fadeIn(1000);
  $('#select').fadeOut(1000);
  $('#description').animate({left:'500px'}, "slow");
  $('#form').delay(100).fadeOut(1000)
})

$('.works').click(function (e) {
  e.preventDefault();
  $('#back').delay(1000).fadeIn(1000);
  $('#works').delay(1100).fadeIn(1000);
  $('#select').fadeOut(1000);
  $('#description').animate({left:'500px'}, "slow");
  $('#form').delay(100).fadeOut(1000)
})

$('#back').click(function (e) {
  e.preventDefault();
  $('#select').delay(1100).fadeIn(1000);
  $('#skills').fadeOut(1000);
  $('#back').delay(100).fadeOut(1000);
  $('#exp').fadeOut(1000);
  $('#works').fadeOut(1000);
  $('#diplomes').fadeOut(1000);
  $('#description').delay(1100).animate({left:'0px'}, "slow");
  $('#form').delay(1100).fadeIn(1000)
  jQuery(document).ready(function(){
    jQuery('.skillbar').each(function(){
      jQuery(this).find('.skillbar-bar').animate({
        width:0
      },1000);
    });
  });
})