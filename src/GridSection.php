<?php

namespace Tbone\ElementalExtension;

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataObject;

class GridSection extends DataObject {

	private static $table_name = 'GridSection';

	private static $db = [
		'Title' => 'Text',
		'Content' => 'HTMLText',
		'DesktopWidth' => 'Int',
		'PhoneWidth' => 'Int'
	];

	private static $has_one = [
		'GridElement' => GridElement::class
	];

	private static $summary_fields = [
		'Title'
	];

	public function getCMSFields()
	{
		return FieldList::create(
			TextField::create('Title'),
			WidthSliderField::create('DesktopWidth'),
			WidthSliderField::create('PhoneWidth'),
			HTMLEditorField::create('Content')
		);
	}

}