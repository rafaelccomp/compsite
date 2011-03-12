<?php

/**
 * Local form base class.
 *
 * @method Local getObject() Returns the current form's model object
 *
 * @package    site
 * @subpackage form
 * @author     Rafael Lima de Carvalho
 */
abstract class BaseLocalForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'description' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'description' => new sfValidatorString(array('max_length' => 256, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('local[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Local';
  }


}
