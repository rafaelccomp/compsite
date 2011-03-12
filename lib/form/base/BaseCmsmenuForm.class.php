<?php

/**
 * Cmsmenu form base class.
 *
 * @method Cmsmenu getObject() Returns the current form's model object
 *
 * @package    site
 * @subpackage form
 * @author     Rafael Lima de Carvalho
 */
abstract class BaseCmsmenuForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'ordem'              => new sfWidgetFormInputText(),
      'CMSGroupContent_id' => new sfWidgetFormPropelChoice(array('model' => 'Cmsgroupcontent', 'add_empty' => true)),
      'parent'             => new sfWidgetFormPropelChoice(array('model' => 'Cmsmenu', 'add_empty' => true)),
      'caption'            => new sfWidgetFormInputText(),
      'link'               => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'ordem'              => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'CMSGroupContent_id' => new sfValidatorPropelChoice(array('model' => 'Cmsgroupcontent', 'column' => 'id', 'required' => false)),
      'parent'             => new sfValidatorPropelChoice(array('model' => 'Cmsmenu', 'column' => 'id', 'required' => false)),
      'caption'            => new sfValidatorString(array('max_length' => 255)),
      'link'               => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('cmsmenu[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cmsmenu';
  }


}
