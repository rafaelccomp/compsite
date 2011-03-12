<?php

/**
 * Disciplina form base class.
 *
 * @method Disciplina getObject() Returns the current form's model object
 *
 * @package    site
 * @subpackage form
 * @author     Rafael Lima de Carvalho
 */
abstract class BaseDisciplinaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'description' => new sfWidgetFormInputText(),
      'ch'          => new sfWidgetFormInputText(),
      'content_id'  => new sfWidgetFormPropelChoice(array('model' => 'Content', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'description' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'ch'          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'content_id'  => new sfValidatorPropelChoice(array('model' => 'Content', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('disciplina[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Disciplina';
  }


}
