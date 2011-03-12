<?php

/**
 * Professor filter form base class.
 *
 * @package    site
 * @subpackage filter
 * @author     Rafael Lima de Carvalho
 */
abstract class BaseProfessorFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'             => new sfWidgetFormFilterInput(),
      'resumo'           => new sfWidgetFormFilterInput(),
      'linkPersonalPage' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'             => new sfValidatorPass(array('required' => false)),
      'resumo'           => new sfValidatorPass(array('required' => false)),
      'linkPersonalPage' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('professor_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Professor';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'name'             => 'Text',
      'resumo'           => 'Text',
      'linkPersonalPage' => 'Text',
    );
  }
}
