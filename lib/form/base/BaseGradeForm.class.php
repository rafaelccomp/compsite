<?php

/**
 * Grade form base class.
 *
 * @method Grade getObject() Returns the current form's model object
 *
 * @package    site
 * @subpackage form
 * @author     Rafael Lima de Carvalho
 */
abstract class BaseGradeForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'published'   => new sfWidgetFormInputCheckbox(),
      'description' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'published'   => new sfValidatorBoolean(array('required' => false)),
      'description' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('grade[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Grade';
  }


}
