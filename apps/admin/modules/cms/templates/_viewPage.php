<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<?php if(isset($isNew)): ?>
<script type="text/javascript">
  updateMenuPages();
  highlightme(<?php echo "'#menu_page_item_".$page->getId()."'" ?>);
</script>
<?php endif; ?>
<div id="pageContent" class="rounded" style="background:yellow; border: 2px yellow solid">
  <div class="bar">
    <ul>
      <li><a href="#">(Des)publicar</a></li>
      <li><a href="#">Deletar</a></li>
      <li><a href="#">Ver outras versões</a></li>
      <li>Publicado em: </li>
      <li>Url: <?php echo $page->getUrl() ?></li>
    </ul>
  </div>
  <div class="page, rounded" style="background:white; padding: 5px; margin-bottom: 10px; margin: 5px">
    
    <?php echo ($page->getContent()!=null) ? $sf_data->get('page', ESC_RAW)->getContent()->getContent():"Nenhum conteúdo associado!"; ?>
  </div>

</div>