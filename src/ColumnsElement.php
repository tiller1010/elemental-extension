<?php

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

class ColumnsElement extends BaseElement {

	private static $singular_name = 'Columns Element';
	private static $plural_name = 'Columns Elements';
	private static $description = 'Columns Layout Content';

	private static $db = [
		'ColumnOneContent' => 'HTMLText',
		'ColumnTwoContent' => 'HTMLText',
		'ColumnThreeContent' => 'HTMLText'
	];

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		// $fields->addFieldToTab('Root.Main', HTMLEditorField::create('ColumnOneContent'));

		return $fields;
	}

	public function getType()
	{
		return 'Columns Element';
	}
}