<?php

/**
 * Disciplina filter form base class.
 *
 * @package    site
 * @subpackage filter
 * @author     Rafael Lima de Carvalho
 */
abstract class BaseDisciplinaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'description' => new sfWidgetFormFilterInput(),
      'ch'          => new sfWidgetFormFilterInput(),
      'content_id'  => new sfWidgetFormPropelChoice(array('model' => 'Content', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'description' => new sfValidatorPass(array('required' => false)),
      'ch'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'content_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Content', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('disciplina_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Disciplina';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'description' => 'Text',
      'ch'          => 'Number',
      'content_id'  => 'ForeignKey',
    );
  }
}
