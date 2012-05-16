var HTML5 = HTML5 || {};

HTML5.Online = {
	_status: null,
	_online: true,
	_offline: false,
	
	setUp: function() {
		var that = this;
		$(window).bind('online offline', function() {
			HTML5.Online.atualizar();
		});
	},
	
	atualizar: function() {
		HTML5.Online._status = (navigator.onLine) ? 'online' : 'offline';
		HTML5.Online._online = (navigator.onLine) ? true : false;
		HTML5.Online._offline = !this._online;
	}
};