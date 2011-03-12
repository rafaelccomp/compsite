<?php

require_once dirname(__FILE__).'/../lib/cmsgroupcontentGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/cmsgroupcontentGeneratorHelper.class.php';

/**
 * cmsgroupcontent actions.
 *
 * @package    site
 * @subpackage cmsgroupcontent
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class cmsgroupcontentActions extends autoCmsgroupcontentActions
{
    public function executeListConteudos(sfWebRequest $request){
        $this->contentGroup = $this->getRoute()->getObject();
        $c = new Criteria();
        $this->getUser()->setAttribute('contentGroup',$this->contentGroup);
        $c->add(CmsmenuPeer::CMSGROUPCONTENT_ID, $this->contentGroup->getId() );
        $this->menu = CmsmenuPeer::doSelect($c);

        $c = new Criteria();
        $c->add(CmspagePeer::CMSGROUPCONTENT_ID, $this->contentGroup->getId() );
        $this->pages = CmspagePeer::doSelect($c);
    }
}
