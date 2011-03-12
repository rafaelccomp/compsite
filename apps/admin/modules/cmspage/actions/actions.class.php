<?php

require_once dirname(__FILE__).'/../lib/cmspageGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/cmspageGeneratorHelper.class.php';

/**
 * cmspage actions.
 *
 * @package    site
 * @subpackage cmspage
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class cmspageActions extends autoCmspageActions
{
    public function executeNovaPagina(sfWebRequest $request){
      
      if ($request->isXmlHttpRequest()||true) { //apenas por ajax
          $this->contentForm = new PageContentForm();
          $this->setLayout(false);
          sfConfig::set('sf_web_debug', false);
          parent::executeNew($request);
	  sfProjectConfiguration::getActive()->loadHelpers(array('I18N', 'Date'));
	  return $this->renderPartial('cmspage/form_form', array('form' => $this->contentForm ));
      }
    }
}
