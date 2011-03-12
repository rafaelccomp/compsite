<div id="sf_admin_content" class="rounded" style="background:#EFEFEF; padding: 20px">
 <?php use_helper('jQuery','I18N'); ?>

  <script type="text/javascript">
  //tinyMCE.execCommand('mceAddControl', false, 'pagina_content');
  teste = function(form){
    //return false;
    //tinyMCE.triggerSave(false,false);
    tinyMCE.execCommand('mceRemoveControl', false, 'pagina_content');
    return false;
  }
  </script>
 <?php echo jq_form_remote_tag(array('url'=>'cms/novaPagina','update'=>'theContent','before'=>"teste(this)",'loading'=>"\$('#loading').fadeIn()",'complete'=>"\$('#loading').fadeOut()")); ?>
<ul>
    <?php echo $formContent->renderUsing('list'); ?>
    <li>
      <input type="submit" value="Submit" />
    </li>
    
  </ul>
</form>
</div>