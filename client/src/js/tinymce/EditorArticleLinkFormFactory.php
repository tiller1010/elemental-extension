<?php

use SilverStripe\Admin\Forms\LinkFormFactory;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\RequiredFields;
use Silverstripe\Forms\DropdownField;

class EditorArticleLinkFormFactory extends LinkFormFactory {
  protected function getFormFields($controller, $name, $context) {
    $fields = FieldList::create([
      DropdownField::create(
        'Link',
        _t(__CLASS__.'.LINKDROPDOWNLABEL', 'Article'),
        Article::get()->map('ID', 'Title'))
          ->setEmptyString(_t(__CLASS__.'.LINKDROPDOWNEMPTY', 'Select a Article')),
      TextField::create(
        'Description',
        _t(__CLASS__.'.LINKDESCR', 'Link description')
      ),
      CheckboxField::create(
        'TargetBlank',
        _t(__CLASS__.'.LINKOPENNEWWIN', 'Open in new window/tab')
      ),
    ]);
    return $fields;
  }
}