<?php

/**
 * Week filter form base class.
 *
 * @package    site
 * @subpackage filter
 * @author     Rafael Lima de Carvalho
 */
abstract class BaseWeekFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'description' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'description' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('week_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Week';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'description' => 'Text',
    );
  }
}
