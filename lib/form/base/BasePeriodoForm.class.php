<?php

/**
 * Periodo form base class.
 *
 * @method Periodo getObject() Returns the current form's model object
 *
 * @package    site
 * @subpackage form
 * @author     Rafael Lima de Carvalho
 */
abstract class BasePeriodoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'description' => new sfWidgetFormInputText(),
      'grade_id'    => new sfWidgetFormPropelChoice(array('model' => 'Grade', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'description' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'grade_id'    => new sfValidatorPropelChoice(array('model' => 'Grade', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('periodo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Periodo';
  }


}
