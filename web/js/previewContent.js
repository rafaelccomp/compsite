/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function previewContent(divresult, idContent){
      $(divresult).html('Loading...');
      $.post('/parasitologia/backend.php/content/preview', {
        idContent: idContent
      },
       function(response){
              $(divresult).html(response).fadeIn();
        }
      );
}
function closePreview(divresult){
  $(divresult).fadeOut();

}

