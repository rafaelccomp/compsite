<?php

/**
 * Cmspage form base class.
 *
 * @method Cmspage getObject() Returns the current form's model object
 *
 * @package    site
 * @subpackage form
 * @author     Rafael Lima de Carvalho
 */
abstract class BaseCmspageForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'url'                => new sfWidgetFormInputText(),
      'content_id'         => new sfWidgetFormPropelChoice(array('model' => 'Content', 'add_empty' => true)),
      'CMSGroupContent_id' => new sfWidgetFormPropelChoice(array('model' => 'Cmsgroupcontent', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'url'                => new sfValidatorString(array('max_length' => 255)),
      'content_id'         => new sfValidatorPropelChoice(array('model' => 'Content', 'column' => 'id', 'required' => false)),
      'CMSGroupContent_id' => new sfValidatorPropelChoice(array('model' => 'Cmsgroupcontent', 'column' => 'id', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Cmspage', 'column' => array('url')))
    );

    $this->widgetSchema->setNameFormat('cmspage[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cmspage';
  }


}
