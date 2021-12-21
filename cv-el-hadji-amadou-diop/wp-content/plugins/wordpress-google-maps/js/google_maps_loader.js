/**
 * Asynchrounously load Google Maps API. 
 */


/**
 * Global API loaded flag.
 */
var _agmMapIsLoaded = false;


/**
 * Callback - triggers loaded flag setting. 
 */
function agmInitialize () {
	_agmMapIsLoaded = true;
}

/**
 * Handles the actual loading of Google Maps API.
 */
function loadGoogleMaps () {
	var script = document.createElement("script");
	script.type = "text/javascript";
	script.src = "http://maps.google.com/maps/api/js?v=3&libraries=panoramio&sensor=false&callback=agmInitialize";
	document.body.appendChild(script);
}

window.onload = loadGoogleMaps;