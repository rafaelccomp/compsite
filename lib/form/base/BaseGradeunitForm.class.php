<?php

/**
 * Gradeunit form base class.
 *
 * @method Gradeunit getObject() Returns the current form's model object
 *
 * @package    site
 * @subpackage form
 * @author     Rafael Lima de Carvalho
 */
abstract class BaseGradeunitForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'horario_id'    => new sfWidgetFormPropelChoice(array('model' => 'Horario', 'add_empty' => true)),
      'disciplina_id' => new sfWidgetFormPropelChoice(array('model' => 'Disciplina', 'add_empty' => true)),
      'professor_id'  => new sfWidgetFormPropelChoice(array('model' => 'Professor', 'add_empty' => true)),
      'periodo_id'    => new sfWidgetFormPropelChoice(array('model' => 'Periodo', 'add_empty' => true)),
      'local_id'      => new sfWidgetFormPropelChoice(array('model' => 'Local', 'add_empty' => true)),
      'weekDay_id'    => new sfWidgetFormPropelChoice(array('model' => 'Week', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'horario_id'    => new sfValidatorPropelChoice(array('model' => 'Horario', 'column' => 'id', 'required' => false)),
      'disciplina_id' => new sfValidatorPropelChoice(array('model' => 'Disciplina', 'column' => 'id', 'required' => false)),
      'professor_id'  => new sfValidatorPropelChoice(array('model' => 'Professor', 'column' => 'id', 'required' => false)),
      'periodo_id'    => new sfValidatorPropelChoice(array('model' => 'Periodo', 'column' => 'id', 'required' => false)),
      'local_id'      => new sfValidatorPropelChoice(array('model' => 'Local', 'column' => 'id', 'required' => false)),
      'weekDay_id'    => new sfValidatorPropelChoice(array('model' => 'Week', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('gradeunit[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Gradeunit';
  }


}
