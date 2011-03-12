<?php

/**
 * Cmsmenu filter form base class.
 *
 * @package    site
 * @subpackage filter
 * @author     Rafael Lima de Carvalho
 */
abstract class BaseCmsmenuFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'ordem'              => new sfWidgetFormFilterInput(),
      'CMSGroupContent_id' => new sfWidgetFormPropelChoice(array('model' => 'Cmsgroupcontent', 'add_empty' => true)),
      'parent'             => new sfWidgetFormPropelChoice(array('model' => 'Cmsmenu', 'add_empty' => true)),
      'caption'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'link'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'ordem'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'CMSGroupContent_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Cmsgroupcontent', 'column' => 'id')),
      'parent'             => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Cmsmenu', 'column' => 'id')),
      'caption'            => new sfValidatorPass(array('required' => false)),
      'link'               => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cmsmenu_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cmsmenu';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'ordem'              => 'Number',
      'CMSGroupContent_id' => 'ForeignKey',
      'parent'             => 'ForeignKey',
      'caption'            => 'Text',
      'link'               => 'Text',
    );
  }
}
