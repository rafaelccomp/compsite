<?php

/**
 * Grade filter form base class.
 *
 * @package    site
 * @subpackage filter
 * @author     Rafael Lima de Carvalho
 */
abstract class BaseGradeFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'published'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'description' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'published'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'description' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('grade_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Grade';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'published'   => 'Boolean',
      'description' => 'Text',
    );
  }
}
