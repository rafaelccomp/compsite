<?php use_helper('jQuery'); ?>

<style type="text/css">
#ListConteudosWrapper{
 padding: 20px;

}
#left{
    float:left;
}
#right{
    padding-left: 200px;
}
</style>
<div id="ListConteudosWrapper">
    <div id="left">
        <p><?php echo $contentGroup->getUrl()?>/</p>
        <div id="menu_content_group">
        <p> Menu </p>
        <ul>
        <?php foreach($menu as $m): ?>
        <li> <a href="<?php echo $m->getLink() ?>" ><?php echo $m->getCaption() ?></a> </li>
        <?php endforeach; ?>
            <li> <a href="add" >Adicionar item de menu</a> </li>
        </ul>
    </div>
    <div id="menu_pages_wrapper">

        <p> <a href="javascript:updateMenuPages()">Páginas disponíveis </a>
          <br/>
        <span id="menu_pages_loading" style="background:red; color: white; display:none">Loading <?php echo image_tag('ajax-loader_2.gif');?></span>   </p>

        <?php echo jq_link_to_remote('Criar nova página',array('method'=> 'GET', 'url'=>'cms/novaPagina','loading'=>"\$('loading').show('slow')",'update'=>'theContent')); ?>
        <div id="menu_pages">
        <?php include_partial('cms/menuPages',array('pages'=>$pages)); ?>
        </div>
    </div>
</div> <!-- end of left div -->
<div id="right">
    <div id="loading" style="display:none; border: 1px black outset;"><?php echo image_tag('ajax-loader.gif') ?> Abrindo conteúdo</div>
    <div id="theContent">
    Utilize um dos menus ao lado.
    </div>

 </div> <!-- end of right div -->
</div>
