$(document).ready(function() {		
	  //Initialize Map
	  map = new GMaps({
        el: '#map',
        lat: -23.2198817,
        lng: -45.9108294,
        zoomControl : false,
        zoomControlOpt: {
            style : 'SMALL',
            position: 'TOP_LEFT'
        },
		 markers: [
			{lat: -23.2198817, lng: -45.9108294}
			
		],
        panControl : false,
        streetViewControl : false,
        mapTypeControl: false,
        overviewMapControl: false,
		
      });
	  // Add a random mark
	  setTimeout( function(){
		  map.addMarker({
				  lat: -23.2198817,
				  lng: -45.9108294,
				  animation: google.maps.Animation.DROP,
				  draggable:true,
				  title: 'VendaJa Autos'
		  });
	  },3000);
	  //Initialize Context Menu
	    map.setContextMenu({
        control: 'map',
        options: [{
          title: 'Add marker',
          name: 'add_marker',
          action: function(e){
            console.log(e.latLng.lat());
            console.log(e.latLng.lng());
            this.addMarker({
              lat: e.latLng.lat(),
              lng: e.latLng.lng(),
			  animation: google.maps.Animation.DROP,
			  draggable:true,
              title: 'New marker'
            });
            this.hideContextMenu();
          }
        }, {
          title: 'Center here',
          name: 'center_here',
          action: function(e){
            this.setCenter(e.latLng.lat(), e.latLng.lng());
          }
        }]
      });
      map.setContextMenu({
        control: 'marker',
        options: [{
          title: 'Center here',
          name: 'center_here',
          action: function(e){
            this.setCenter(e.latLng.lat(), e.latLng.lng());
          }
        }]
      });
	        map.travelRoute({
        origin: [-23.2198817, -45.9108294],
        destination: [-23.2198817, -45.9108294],
        travelMode: 'driving',
        step: function(e){
          $('#instructions').append('<li>'+e.instructions+'</li>');
          $('#instructions li:eq('+e.step_number+')').delay(450*e.step_number).fadeIn(200, function(){
            map.drawPolyline({
              path: e.path,
              strokeColor: '#131540',
              strokeOpacity: 0.6,
              strokeWeight: 6
            });  
          });
        }
      });
	  $("#map-zoom-out").click(function() {
		 map.zoomOut(1);		  
	  });
	  
	  $("#map-zoom-in").click(function() {
		map.zoomIn(1);	  
	  });
	  
});