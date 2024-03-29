/* global tinymce, editorIdentifier, window */
import i18n from 'i18n';
import TinyMCEActionRegistrar from 'lib/TinyMCEActionRegistrar';
import React from 'react';
import ReactDOM from 'react-dom';
import jQuery from 'jquery';
import { createInsertLinkModal } from 'containers/InsertLinkModal/InsertLinkModal';
import { loadComponent } from 'lib/Injector';

// Link to article url
TinyMCEActionRegistrar.addAction('sslink', {
  text: i18n._t('Admin.LINKLABEL_ARTICLE', 'Link to Article'),
  // eslint-disable-next-line no-console
  onclick: (editor) => editor.execCommand('sslinkarticle'),
  priority: 52,
}, editorIdentifier);

const plugin = {
  init(editor) {
    editor.addCommand('sslinkarticle', () => {
      const field = window.jQuery(`#${editor.id}`).entwine('ss');

      field.openLinkArticleDialog();
    });
  },
};

const modalId = 'insert-link__dialog-wrapper--article';
const sectionConfigKey = 'SilverStripe\\Admin\\LeftAndMain';
const formName = 'EditorArticleLink';
const InsertArticleLinkModal = loadComponent(createInsertLinkModal(sectionConfigKey, formName));

jQuery.entwine('ss', ($) => {
  $('textarea.htmleditor').entwine({
    openLinkArticleDialog() {
      let dialog = $(`#${modalId}`);

      if (!dialog.length) {
        dialog = $(`<div id="${modalId}" />`);
        $('body').append(dialog);
      }
      dialog.addClass('insert-link__dialog-wrapper');

      dialog.setElement(this);
      dialog.open();
    },
  });

  /**
   * Assumes that $('.insert-link__dialog-wrapper').entwine({}); is defined for shared functions
   */
  $(`#${modalId}`).entwine({
    renderModal(isOpen) {
      const handleHide = () => this.close();
      const handleInsert = (...args) => this.handleInsert(...args);
      const attrs = this.getOriginalAttributes();
      const selection = tinymce.activeEditor.selection;
      const selectionContent = selection.getContent() || '';
      const tagName = selection.getNode().tagName;
      const requireLinkText = tagName !== 'A' && selectionContent.trim() === '';

      // create/update the react component
      ReactDOM.render(
        <InsertArticleLinkModal
          isOpen={isOpen}
          onInsert={handleInsert}
          onClosed={handleHide}
          title={i18n._t('Admin.LINK_ARTICLE', 'Insert article link')}
          bodyClassName="modal__dialog"
          className="insert-link__dialog-wrapper--article"
          fileAttributes={attrs}
          identifier="Admin.InsertArticleLinkModal"
          requireLinkText={requireLinkText}
        />,
        this[0]
      );
    },

    buildAttributes(data) {
      return {
        href: data.Link,
        target: data.TargetBlank ? "_blank" : "",
        title: data.Description
      }

    },
  });
});

// Adds the plugin class to the list of available TinyMCE plugins
tinymce.PluginManager.add('sslinkarticle', (editor) => plugin.init(editor));

export default plugin;