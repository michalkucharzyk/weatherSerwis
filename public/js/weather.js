(function ($) {
	//insert to JQ fn
	$.fn.weather = function (options)	{

		let defaults = {
			handlers: {
				'select':null,
				'container':null
			},
			ajax:{
				'weather':null
			}
		};

		defaults = $.extend(defaults, options);

		let events = {
			selectCity:function()
			{
				let _this = $(this);
				$.ajax({
					url: defaults.ajax.weather,
					type: 'get',
					data: {
						idCity: _this.val(),
					},
					success: function (data)
					{
						$this.find(defaults.handlers.container).html(data);
					},
				})
			}
		};

		let functions = {
			/**
			 * Init
			 */
			init: function () {
				$this.find(defaults.handlers.select).off('change').on('change', events.selectCity);
			}
		};

		let $this = this;

		functions.init();

	};
})(jQuery);