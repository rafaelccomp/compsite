<?php

/**
 * Cmspage filter form base class.
 *
 * @package    site
 * @subpackage filter
 * @author     Rafael Lima de Carvalho
 */
abstract class BaseCmspageFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'url'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'content_id'         => new sfWidgetFormPropelChoice(array('model' => 'Content', 'add_empty' => true)),
      'CMSGroupContent_id' => new sfWidgetFormPropelChoice(array('model' => 'Cmsgroupcontent', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'url'                => new sfValidatorPass(array('required' => false)),
      'content_id'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Content', 'column' => 'id')),
      'CMSGroupContent_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Cmsgroupcontent', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('cmspage_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cmspage';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'url'                => 'Text',
      'content_id'         => 'ForeignKey',
      'CMSGroupContent_id' => 'ForeignKey',
    );
  }
}
