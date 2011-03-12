<?php

/**
 * Periodo filter form base class.
 *
 * @package    site
 * @subpackage filter
 * @author     Rafael Lima de Carvalho
 */
abstract class BasePeriodoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'description' => new sfWidgetFormFilterInput(),
      'grade_id'    => new sfWidgetFormPropelChoice(array('model' => 'Grade', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'description' => new sfValidatorPass(array('required' => false)),
      'grade_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Grade', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('periodo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Periodo';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'description' => 'Text',
      'grade_id'    => 'ForeignKey',
    );
  }
}
