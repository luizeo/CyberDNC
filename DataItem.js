(function($){

	var methods = {
	
		init: function(devicesDataItem){
			return this.each(function(){
				var $this = $(this);
				var $item = $(devicesDataItem);
				
				$('<span></span>')
					.attr('data-role', 'DataItem.Value')
					.text('')
					.appendTo($this)
				;
			
				$this.addClass('DataItem');
				var itm = $item.attr('name') || $item.attr('id')
				$this.attr('data-itemid', itm);
				$this.attr('data-role', 'DataItem');
				$this.data('DataItem', {
					probe: $item
				});
			});
		},
		
		update: function(streamsDataItem){
			return this.each(function(){
				var $this = $(this);
				var $item = $(streamsDataItem);
				var data = $this.data('DataItem');
				
				var $elem = $this.find('[data-role="DataItem.Value"]');
				switch(data.probe.attr('category')){
					case 'CONDITION':
						$elem.text($item.text()||$item.prop('tagName'));
						$this.removeClass('UNAVAILABLE NORMAL WARNING FAULT');
						$this.parent().addClass($item.prop('tagName').toUpperCase())
						;
						break;
					case 'EVENT':
					case 'SAMPLE':
					default:
						$elem.text($item.text());
						$this.parent().removeClass().addClass($item.text());
						break;
				}
			});
		}
	
	};

	$.fn.DataItem = function(method){
		if(methods[method]){
			return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
		}
		else if(typeof method === 'object' || !method){
			return methods.init.apply(this, arguments);
		}
		else{
			$.error('Method ' + method + ' does not exist on jQuery.DataItem');
		}
	}

})(jQuery);
