import jQuery from 'jquery';
import { loadComponent } from 'lib/Injector';
import React from 'react';
import ReactDOM from 'react-dom';

jQuery.entwine('ss', ($) => {
  $('.js-injector-boot .form__field-holder .width-slider-field').entwine({
    onmatch() {
      const Component = loadComponent('WidthSliderField');
      const schemaState = this.data('state');

      schemaState.initialValue = schemaState.value;
      delete schemaState.value;

      ReactDOM.render(<Component {...schemaState} />, this[0]);
    },

    onunmatch() {
      ReactDOM.unmountComponentAtNode(this[0]);
    },
  });
});