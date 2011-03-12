/*
 * Javascript library to give support to the interface of cms module.
 * @author Rafael Lima de Carvalho
  */
/**
 * Update the menu with the pages. This can happen imediattely after a new page is stored or when the user
 * access one of pages in the left.
 */
updateMenuPages = function(){
  
  $.ajax({
   url: 'http://localhost/site/admin_dev.php/cms/updateMenuPages',
   beforeSend: function(){
     $('#menu_pages_loading').show();
   },
   complete: function(){
     $('#menu_pages_loading').hide("slow");
   },
   success: function(data){
    //alert($('menu_pages'));
    //$('#menu_pages').fadeOut();
    $('#menu_pages').html(data);
    //$('#menu_pages').fadeIn();
   },
   error: function(){alert('Deu erro!')}

  });
  }

highlightme = function (who){
  $('.highlighted').removeClass('highlighted');
  $(who).removeClass('unhighlighted');
  $(who).addClass('highlighted');
}