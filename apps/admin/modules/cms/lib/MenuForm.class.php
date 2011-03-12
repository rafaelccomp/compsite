<?php

/**
 * Content form.
 *
 * @package    site
 * @subpackage form
 * @author     Your name here
 */
class PageContentForm extends sfForm
{
  private $cmspageobj;
  public function setCmspageobj(Cmspage $p){
    $this->cmspageobj = $p;
  }
  public function getCmspageobj(){
    return $this->cmspageobj;
  }
  public function  __construct(Cmspage $p) {
    $this->setCmspageobj($p);
    parent::__construct();
  }
  public function save(){
    $values = $this->getValues();
    /*if($this->isNew())
    {
      $this->cmspageobj = new Cmspage();
      $this->cmspageobj->setContent(new Content());
    }
    else
    {
      $c = new Criteria();
      $c->add(CmspagePeer::ID, intval($values['idPage']));
      $this->cmspageobj = CmspagePeer::doSelectOne($c);
      if($this->cmspageobj==null)
         throw new Exception("Esta página não existe ou o id é inválido.");
    } */
      
    
    try{
      $contentObj = $this->cmspageobj->getContent();
      $contentObj->setContent($values['content']);
      //$contentObj->save();
      $this->cmspageobj->setUrl($values['url']);
      $this->cmspageobj->setContent($contentObj);
      $this->cmspageobj->save();
    }catch(Exception $e){
      throw $e;//new Exception("Não pude salvar o objeto conteúdo.");
    }
  }
  /**
   * Check if the submitted form is a new Page or a old one.
   * @return Boolean
   */
  private function isNew(){
    return $this->cmspageobj->getId()==null;
  }
  public function configure()
  {
    parent::configure();
    $this->getWidgetSchema()->setNameFormat('pagina[%s]');
    /*unset(
       $this['created_at'], $this['updated_at']//,$this["user_id"]
    ); */
    //enabling rich editor with extraform
  	//$this->setWidget('content', new sfWidgetFormTextarea(array(), array('rows' => '40', 'cols' => '90', 'rich'=> 'true')));
    $this->widgetSchema['url'] =  new sfWidgetFormInputText(array('default'=> $this->cmspageobj->getUrl()));
    $this->setWidget('_csrf_token', new sfWidgetFormInputHidden(array('default'=> '355868214ea56c1caf6c2f2c776aef19cd6917f5')));
    $this->setWidget('idPage', new sfWidgetFormInputHidden(array('default'=> $this->cmspageobj->getId())));
    $this->setWidget('groupContentId', new sfWidgetFormInputHidden(array('default'=> $this->cmspageobj->getCmsgroupcontentId())));
    /*$this->widgetSchema['content'] =  new sfWidgetFormTextarea(array('default'=>
                                                        ($this->cmspageobj->getContent()!=null)?$this->cmspageobj->getContent()->getContent():"Insert html content here!")
            );

     * 
     */
    $this->setWidget('content', new sfWidgetFormTextareaTinyMCE(array(
    'width'  => 550,
    'height' => 350,
    'config' => 'theme_advanced_disable: "cleanup,help",
    file_browser_callback:"sfAssetsLibrary.fileBrowserCallBack",
    plugins : "safari,spellchecker,pagebreak,style,layer,table,advhr,advimage,advlist,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,wordcount",
    theme_advanced_buttons5_add : "pastetext,pasteword,selectall",
    theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
    theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
    theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
    theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,restoredraft,|,insertfile,insertimage",
    theme_advanced_buttons6_add : "media"',
    //'default' => ($this->cmspageobj->getContent()!=null)?$this->cmspageobj->getContent()->getContent():"",
    )));

     
    
    $this->validatorSchema['url'] = new sfValidatorString(array('required' => true, 'min_length' => 3, 'max_length' => 128));
    $this->validatorSchema['content'] = new sfValidatorString(array('required' => true));
    $this->validatorSchema['idPage'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['groupContentId'] = new sfValidatorInteger(array('required' => false));
    
    $this->validatorSchema->setPostValidator(new sfValidatorPropelUnique(array('model'=>'CMSPage', 'column'=>'url','primary_key'=>'id')));
  }
}
