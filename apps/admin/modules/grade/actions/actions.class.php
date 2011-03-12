<?php

require_once dirname(__FILE__).'/../lib/gradeGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/gradeGeneratorHelper.class.php';

/**
 * grade actions.
 *
 * @package    site
 * @subpackage grade
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class gradeActions extends autoGradeActions
{
  public function executeListHorarios(sfWebRequest $request){
    $this->grade = $this->getRoute()->getObject();

    $c = new Criteria();
    //$c->addJoin(ParasitoseContentGroupPeer::CONTENT_GROUP_ID, ContentGroupPeer::ID);
    $c->add(PeriodoPeer::GRADE_ID, $this->grade->getId(), Criteria::EQUAL);
    //$c->addDescendingOrderByColumn(ContentVersionPeer::UPDATED_AT);
    $this->periodos = PeriodoPeer::doSelect($c);
  }
  private function updateGradeItem($id, $horarioId, $disciplinaId, $professorId, $localId, $weekDay_id){
     
  }
  public function executeChangeGradeItem(sfWebRequest $request){
      if($request->isXmlHttpRequest()){
      if($request->getParameter('idgradeunit')!=''){
        try{
            updateGradeImte(
              $request->getParameter('idgradeunit'),
              $request->getParameter('idhorario'),
              $request->getParameter('iddisciplina'),
              $request->getParameter('idprofessor'),
              $request->getParameter('idlocal'),
              $request->getParameter('idweekday')
            );
        }catch(Exception $e){
            
        }
          $c = new Criteria();
        $c->add(GradeunitPeer::ID, intval($request->getParameter('idgradeunit')));
        $this->content = ContentPeer::doSelectOne($c);
        if($this->content)
           $this->user = sfGuardUserPeer::retrieveByPK($this->content->getUserId());
        return $this->content ? sfView::SUCCESS: sfView::ERROR;
      }
    }
    $this->forward404();
  }

}
