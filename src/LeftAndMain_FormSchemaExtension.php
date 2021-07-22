<?php

use SilverStripe\Core\Extension;

class LeftAndMain_FormSchemaExtension extends Extension {

	public function updateClientConfig(&$clientConfig){
		$clientConfig['form']['EditorArticleLink'] = [
			'schemaUrl' => $this->owner->Link('methodSchema/Modals/EditorArticleLink')
		];
		return $clientConfig;
	}
}