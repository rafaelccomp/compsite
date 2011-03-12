<?php

require_once '/var/www/sfprojects/lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfPropelPlugin');
    $this->enablePlugins('sfAdminDashPlugin');
    $this->enablePlugins('sfAssetsLibraryPlugin');
    $this->enablePlugins('sfFormExtraPlugin');
    $this->enablePlugins('sfThumbnailPlugin');
    $this->enablePlugins('sfGuardPlugin');
    $this->enablePlugins('brFormExtraPlugin');
    //$this->enablePlugins('sfJqueryReloadedPlugin');
    $this->enablePlugins('sfImageTransformPlugin');
    $this->enablePlugins('sfJqueryReloadedPlugin');
  }
}
