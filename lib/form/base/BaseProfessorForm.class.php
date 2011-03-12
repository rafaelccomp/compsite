<?php

/**
 * Professor form base class.
 *
 * @method Professor getObject() Returns the current form's model object
 *
 * @package    site
 * @subpackage form
 * @author     Rafael Lima de Carvalho
 */
abstract class BaseProfessorForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'name'             => new sfWidgetFormInputText(),
      'resumo'           => new sfWidgetFormTextarea(),
      'linkPersonalPage' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'name'             => new sfValidatorString(array('max_length' => 256, 'required' => false)),
      'resumo'           => new sfValidatorString(array('required' => false)),
      'linkPersonalPage' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('professor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Professor';
  }


}
