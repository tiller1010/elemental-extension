import React from 'react';
import Injector from 'lib/Injector';
import Slider from 'rc-slider';
import './entwine/WidthSliderField.entwine.jsx';
import './boot/registerComponents.jsx';

const characterCounterStyles = {
	order: 99,
	width: '100%',
	margin: '10px 0'
}

const CharacterCounter = (TextField) => (props) => {

	return (
		<React.Fragment>
			<TextField {...props} />
			<small style={characterCounterStyles}>Character count: {props.value.length}</small>
		</React.Fragment>
	);
}

const PowerButton = (ElementInlineEditForm) => (props) => {
	let [power, setPower] = React.useState(0);

	return (
		<React.Fragment>
			<ElementInlineEditForm {...props} />
			<button className="btn btn-primary font-icon-plus" onClick={() => setPower(power + 1)}>Power up {power}</button>
		</React.Fragment>
	);
}

const widthSliderStyles = {
	maxWidth: '860px'
}

const WidthSlider = (WidthField) => (props) => {

	let [value, setValue] = React.useState(props.value);
	if(props.value || props.value == 0){
		value = props.value;
	}

	return (
		<React.Fragment>
			<WidthField
				{ ...{...props, value }}
				onChange={(e) => {
					setValue(e.target.value);
					props.onChange(e, { id: props.id, value: e.target.value });
				}}
				min={0}
				max={100}
			/>
			<Slider
				style={widthSliderStyles}
				value={value}
				onChange={(newValue) => {
					setValue(newValue);
					props.onChange(newValue, { id: props.id, value: newValue });
				}}
				marks={{
					25: '25%',
					33: '33%',
					50: '50%',
					66: '66%',
					75: '75%',
					100: '100%'
				}}
			/>
		</React.Fragment>
	);
}

Injector.transform('elemental-transform', (updater) => {
  updater.component('TextField.element', CharacterCounter);
  updater.component('ElementActions', PowerButton);
  updater.component(`WidthSliderField`, WidthSlider);
});
