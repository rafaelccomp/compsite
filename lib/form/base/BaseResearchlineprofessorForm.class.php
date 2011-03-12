<?php

/**
 * Researchlineprofessor form base class.
 *
 * @method Researchlineprofessor getObject() Returns the current form's model object
 *
 * @package    site
 * @subpackage form
 * @author     Rafael Lima de Carvalho
 */
abstract class BaseResearchlineprofessorForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'professor_id'    => new sfWidgetFormPropelChoice(array('model' => 'Professor', 'add_empty' => true)),
      'researchline_id' => new sfWidgetFormPropelChoice(array('model' => 'Researchline', 'add_empty' => true)),
      'id'              => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'professor_id'    => new sfValidatorPropelChoice(array('model' => 'Professor', 'column' => 'id', 'required' => false)),
      'researchline_id' => new sfValidatorPropelChoice(array('model' => 'Researchline', 'column' => 'id', 'required' => false)),
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('researchlineprofessor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Researchlineprofessor';
  }


}
