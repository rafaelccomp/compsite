<?php

/**
 * Researchlineprofessor filter form base class.
 *
 * @package    site
 * @subpackage filter
 * @author     Rafael Lima de Carvalho
 */
abstract class BaseResearchlineprofessorFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'professor_id'    => new sfWidgetFormPropelChoice(array('model' => 'Professor', 'add_empty' => true)),
      'researchline_id' => new sfWidgetFormPropelChoice(array('model' => 'Researchline', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'professor_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Professor', 'column' => 'id')),
      'researchline_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Researchline', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('researchlineprofessor_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Researchlineprofessor';
  }

  public function getFields()
  {
    return array(
      'professor_id'    => 'ForeignKey',
      'researchline_id' => 'ForeignKey',
      'id'              => 'Number',
    );
  }
}
