<?php

namespace Tbone\ElementalExtension;

use SilverStripe\Forms\NumericField;
use SilverStripe\Forms\FormField;

class WidthSliderField extends NumericField {
	/**/
	protected $schemaComponent = 'WidthSliderField';
	/**/
	protected $schemaDataType = FormField::SCHEMA_DATA_TYPE_INTEGER;
	/**/
	protected $template = 'WidthSliderField';
	/**/
	public function __construct($name, $title = null, $value = null)
	{
		$this->addExtraClass('width-slider-field');
		parent::__construct($name, $title, $value);
	}
}