(function ($) {
	//insert to JQ fn
	$.fn.weather = function (options)	{

		let defaults = {
			handlers: {
				
			}
		};

		defaults = $.extend(defaults, options);

		let events = {


		};

		let functions = {
			/**
			 * Init
			 */
			init: function () {
				console.log('xd');
			}
		};

		let $this = this;

		functions.init();

	};
})();