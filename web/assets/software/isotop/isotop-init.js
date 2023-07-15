var $grid = $('.grid').isotope({
	itemSelector: '.element-item'})
//Search
	  // quick search regex
	var qsRegex;
	console.log(qsRegex)
	// init Isotope
	 $grid.isotope({
	  itemSelector: '.element-item',
	  layoutMode: 'fitRows',
	  filter: function() {
		
			return qsRegex ? $(this).text().match( qsRegex ) : true;
	  }
	});
	
	// use value of search field to filter
	var $quicksearch = $('.search-menu-item').keyup( debounce( function() {
		$grid.isotope({
			itemSelector: '.element-item',
			layoutMode: 'fitRows',
			filter: function() {
			
				return qsRegex ? $(this).text().match( qsRegex ) : true;
			}
		});
		qsRegex = new RegExp( $quicksearch.val(), 'gi' );
		console.log(qsRegex )
	  $grid.isotope();
	}, 200 ) );
	// debounce so filtering doesn't happen every millisecond
	function debounce( fn, threshold ) {
	  var timeout;
	  threshold = threshold || 100;
	  return function debounced() {
		clearTimeout( timeout );
		var args = arguments;
		var _this = this;
		function delayed() {
		  fn.apply( _this, args );
		}
		timeout = setTimeout( delayed, threshold );
	  };
	}
//Search





	
	// filter items on button click
$(document).on( 'click', 'a.filter-btn', function() {

	var filterValue = $(this).attr('data-filter');
	console.log(filterValue)
	$grid.isotope({ 
		itemSelector: '.element-item',
		layoutMode: 'fitRows',
		filter: filterValue 
	});


});