<?php

/**
 * Gradeunit filter form base class.
 *
 * @package    site
 * @subpackage filter
 * @author     Rafael Lima de Carvalho
 */
abstract class BaseGradeunitFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'horario_id'    => new sfWidgetFormPropelChoice(array('model' => 'Horario', 'add_empty' => true)),
      'disciplina_id' => new sfWidgetFormPropelChoice(array('model' => 'Disciplina', 'add_empty' => true)),
      'professor_id'  => new sfWidgetFormPropelChoice(array('model' => 'Professor', 'add_empty' => true)),
      'periodo_id'    => new sfWidgetFormPropelChoice(array('model' => 'Periodo', 'add_empty' => true)),
      'local_id'      => new sfWidgetFormPropelChoice(array('model' => 'Local', 'add_empty' => true)),
      'weekDay_id'    => new sfWidgetFormPropelChoice(array('model' => 'Week', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'horario_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Horario', 'column' => 'id')),
      'disciplina_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Disciplina', 'column' => 'id')),
      'professor_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Professor', 'column' => 'id')),
      'periodo_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Periodo', 'column' => 'id')),
      'local_id'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Local', 'column' => 'id')),
      'weekDay_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Week', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('gradeunit_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Gradeunit';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'horario_id'    => 'ForeignKey',
      'disciplina_id' => 'ForeignKey',
      'professor_id'  => 'ForeignKey',
      'periodo_id'    => 'ForeignKey',
      'local_id'      => 'ForeignKey',
      'weekDay_id'    => 'ForeignKey',
    );
  }
}
