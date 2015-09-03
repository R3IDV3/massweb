jQuery.fn.extend({
	/**
	 * A set of methods for getting various properties returned by getBoundingClientRect()
	 *
	 */
	top: function() {
		return this[0].getBoundingClientRect().top;
	},
	right: function() {
		return this[0].getBoundingClientRect().right;
	},
	bottom: function() {
		return this[0].getBoundingClientRect().bottom;
	},
	left: function() {
		return this[0].getBoundingClientRect().left;
	}
});