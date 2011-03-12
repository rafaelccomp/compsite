<?php

/**
 * Menu filter form base class.
 *
 * @package    site
 * @subpackage filter
 * @author     Rafael Lima de Carvalho
 */
abstract class BaseMenuFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'ordem'   => new sfWidgetFormFilterInput(),
      'parent'  => new sfWidgetFormPropelChoice(array('model' => 'Menu', 'add_empty' => true)),
      'caption' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'link'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'ordem'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'parent'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Menu', 'column' => 'id')),
      'caption' => new sfValidatorPass(array('required' => false)),
      'link'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('menu_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Menu';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'ordem'   => 'Number',
      'parent'  => 'ForeignKey',
      'caption' => 'Text',
      'link'    => 'Text',
    );
  }
}
