<?php use_helper('jQuery','I18N'); ?>
<ul>
      <?php foreach($pages as $p): ?>
        <li class="unhighlighted" id="menu_page_item_<?php echo $p->getId(); ?>">
         <?php echo jq_link_to_remote($p->getUrl(), array('update'=>'theContent','method'=>'GET','url'=>'@cms_page_view?idPage='.$p->getId(),'404error'=>"alert('Nao pude carregar!')",'after'=>"\$('#loading').fadeOut()", 'before'=>"highlightme('#menu_page_item_".$p->getId()."');\$('#loading').fadeIn()")) ?>
         </li>
        <?php endforeach; ?>

</ul>
