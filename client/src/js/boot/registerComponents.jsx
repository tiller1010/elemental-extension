import Injector from 'lib/Injector';
import WidthSliderField from '../components/WidthSliderField.jsx';

export default (() => {
	Injector.component.registerMany({
		WidthSliderField
	});
})();