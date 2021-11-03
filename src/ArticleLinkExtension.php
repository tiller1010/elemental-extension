<?php

namespace Tbone\ElementalExtension;

use Silverstripe\Core\Extension;

class ArticleLinkExtension extends Extension {

  private static $allowed_actions = [
    'EditorArticleLink'
  ];

  public function EditorArticleLink(){
    // Show link text field if requested
    $showLinkText = $this->owner->controller->getRequest()->getVar('requireLinkText');
    $factory = EditorArticleLinkFormFactory::singleton();
    return $factory->getForm(
      $this->owner->controller,
      "{$this->owner->name}/EditorArticleLink",
      [ 'RequireLinkText' => isset($showLinkText) ]
    );
  }
}
