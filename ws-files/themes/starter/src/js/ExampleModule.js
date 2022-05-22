export default class Console {
	constructor() {
		this.init();
	}

	init() {
		window.addEventListener('DOMContentLoaded', () => {
			document.body.classList.add('dom-loaded');
		});
	}
}
