<?php

/**
 * cms actions.
 *
 * @package    site
 * @subpackage cms
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class cmsActions extends sfActions
{
  
 /* public function executeTeste(sfWebRequest $request){
    $teste = new Content();
    $teste->setContent("Rafael lima de carvalho");
    $teste->save();
    $novoteste = new Cmspage();
    $novoteste->setUrl("temp");
    $novoteste->setContent($teste);
    $novoteste->setCmsgroupcontentId(1);
    $novoteste->save();
  }*/

  public function executeNovaPagina(sfWebRequest $request){
    if ($request->isXmlHttpRequest() || true) { //apenas por ajax
      sfConfig::set('sf_web_debug', false);
      sfProjectConfiguration::getActive()->loadHelpers(array('I18N', 'Date'));
      $cmspage = new Cmspage();
      $content = new Content();
      $content->setId(null);
      $cmspage->setContent($content);
      $cmspage->setId(null);
      $cmsGroupcontent = $this->getUser()->getAttribute('contentGroup');
      $this->forward404Unless($cmsGroupcontent);
      $cmspage->setCmsgroupcontent($cmsGroupcontent);
      
      $this->formContent = new PageContentForm($cmspage);
      
       
       if ($request->isMethod('post'))
        {
            //return $this->renderPartial('cms/debug',array('values'=>$request->getParameter('pagina')));
            $this->formContent->bind($request->getParameter('pagina'));
            if($this->formContent->isValid()){
                $this->logMessage('O formContent foi válido. cms/actions: '.__FILE__.__LINE__);
                try{
                  
                  $this->formContent->save();
                  return $this->renderPartial("cms/viewPage",array('page'=>$this->formContent->getCmspageobj(),'isNew'=>true,'values'=>$this->formContent->getValues()));
                }
                catch(Exception $e){
                  //TODO: We should to handle the error and render it.
                  throw $e;
                }

                //return $this->renderPartial("cms/viewPage",array('page'));
            }
        }
      //parent::executeNew($request);
      return $this->renderPartial('cms/content_form', array('formContent' => $this->formContent ));
    }
  }
  public function executeUpdateMenuPages(sfWebRequest $request){
    sfConfig::set('sf_web_debug', false);
    $contentGroup = $this->getUser()->getAttribute('contentGroup');
    $this->forward404Unless($contentGroup);
    $c = new Criteria();
    $c->add(CMSPagePeer::CMSGROUPCONTENT_ID, $contentGroup->getId());
    $pages = CMSPagePeer::doSelect($c);
    return $this->renderPartial('cms/menuPages', array('pages'=>$pages));
  }
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executePageView(sfWebRequest $request)
  {
    $cmspageid = intval($request->getParameter('idPage'));
    $this->forward404Unless($cmspageid);
    $c = new Criteria();
    $c->add(CmspagePeer::ID, $cmspageid);
    $this->cmspage = CmspagePeer::doSelectOne($c);
    $this->forward404Unless($this->cmspage);
    return $this->renderPartial('cms/viewPage',array('page'=>$this->cmspage));
  }
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    //$this->forward('default', 'module');
  }
}
