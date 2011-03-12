<?php

/**
 * Cmsgroupcontent filter form base class.
 *
 * @package    site
 * @subpackage filter
 * @author     Rafael Lima de Carvalho
 */
abstract class BaseCmsgroupcontentFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'url'   => new sfWidgetFormFilterInput(),
      'title' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'url'   => new sfValidatorPass(array('required' => false)),
      'title' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cmsgroupcontent_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cmsgroupcontent';
  }

  public function getFields()
  {
    return array(
      'id'    => 'Number',
      'url'   => 'Text',
      'title' => 'Text',
    );
  }
}
