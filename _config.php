<?php

use SilverStripe\Core\Manifest\ModuleLoader;
use SilverStripe\Forms\HTMLEditor\TinyMCEConfig;
use Silverstripe\Admin\ModalController;
use SilverStripe\Admin\LeftAndMain;
use DNADesign\Elemental\Models\BaseElement;

ModalController::add_extension('ArticleLinkExtension');
LeftAndMain::add_extension('LeftAndMain_FormSchemaExtension');
$module = ModuleLoader::inst()->getManifest()->getModule('tbone/elemental-extension');
TinyMCEConfig::get('cms')->enablePlugins([
	'sslinkarticle' => $module->getResource('client/dist/js/TinyMCE_sslink-article.bundle.js'),
])->setOption('contextmenu', 'sslink inserttable | cell row column deletetable');

BaseElement::add_extension(BaseElementExtension::class);