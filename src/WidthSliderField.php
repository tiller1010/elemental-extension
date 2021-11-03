<?php

namespace Tbone\ElementalExtension;

use SilverStripe\Forms\NumericField;

class WidthSliderField extends NumericField {
	/**/
	protected $schemaComponent = 'WidthSliderField';
	/**/
	protected $template = 'WidthSliderField';
	/**/
	public function __construct($name, $title = null, $value = null)
	{
		$this->addExtraClass('width-slider-field');
		parent::__construct($name, $title, $value);
	}
}