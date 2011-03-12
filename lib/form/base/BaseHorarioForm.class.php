<?php

/**
 * Horario form base class.
 *
 * @method Horario getObject() Returns the current form's model object
 *
 * @package    site
 * @subpackage form
 * @author     Rafael Lima de Carvalho
 */
abstract class BaseHorarioForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'     => new sfWidgetFormInputHidden(),
      'inicio' => new sfWidgetFormTime(),
      'fim'    => new sfWidgetFormTime(),
    ));

    $this->setValidators(array(
      'id'     => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'inicio' => new sfValidatorTime(array('required' => false)),
      'fim'    => new sfValidatorTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('horario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Horario';
  }


}
