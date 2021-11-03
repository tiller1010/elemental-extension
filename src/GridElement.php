<?php

namespace Tbone\ElementalExtension;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\LiteralField;

class GridElement extends BaseElement {

	private static $table_name = 'GridElement';

	private static $singular_name = 'Grid Element';
	private static $plural_name = 'Grid Elements';
	private static $description = 'Grid Layout Content';

	private static $has_many = [
		'GridSections' => GridSection::class
	];

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		$fields->addFieldToTab(
			'Root.Main',
			LiteralField::create(
				'editForm',
				'<a class="btn btn-info font-icon-pencil" href="' . $this->CMSEditLink(true) . '">Edit Sections</a>'
			)
		);

		return $fields;
	}

	public function getType()
	{
		return 'Grid Element';
	}
}