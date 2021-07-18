import React from 'react';
import Injector from 'lib/Injector';

const CharacterCounter = (TextField) => (props) => {
	return (
		<div>
			<TextField {...props} />
			<small>Character count: {props.value.length}</small>
		</div>
	);
}


Injector.transform('character-count-transform', (updater) => {
  updater.component('TextField', CharacterCounter);
});