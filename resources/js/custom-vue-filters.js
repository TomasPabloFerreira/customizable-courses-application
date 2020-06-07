Vue.filter('datetime', function (value) {
	if(!value) return '';
	return new Date(value).toLocaleString();
});

