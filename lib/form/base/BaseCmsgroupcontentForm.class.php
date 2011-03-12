<?php

/**
 * Cmsgroupcontent form base class.
 *
 * @method Cmsgroupcontent getObject() Returns the current form's model object
 *
 * @package    site
 * @subpackage form
 * @author     Rafael Lima de Carvalho
 */
abstract class BaseCmsgroupcontentForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'    => new sfWidgetFormInputHidden(),
      'url'   => new sfWidgetFormInputText(),
      'title' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'    => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'url'   => new sfValidatorString(array('max_length' => 256, 'required' => false)),
      'title' => new sfValidatorString(array('max_length' => 256, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cmsgroupcontent[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cmsgroupcontent';
  }


}
