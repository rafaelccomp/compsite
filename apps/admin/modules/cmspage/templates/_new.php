<?php use_helper('I18N', 'Date') ?>
<?php include_partial('cmspage/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('New Cmspage', array(), 'messages') ?></h1>

  <?php include_partial('cmspage/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('cmspage/form_header', array('CMSPage' => $CMSPage, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('cmspage/form', array('CMSPage' => $CMSPage, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('cmspage/form_footer', array('CMSPage' => $CMSPage, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>