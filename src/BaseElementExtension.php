<?php

use SilverStripe\Forms\FieldGroup;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use Silverstripe\ORM\DataExtension;

class BaseElementExtension extends DataExtension {

	private static $db = [
		'DesktopWidth' => 'Int',
		'PhoneWidth' => 'Int'
	];

	public function updateCMSFields(FieldList $fields)
	{
		$fields->removeByName('DesktopWidth');
		$fields->insertBefore(WidthSliderField::create('DesktopWidth'), 'PhoneWidth');
	}
}