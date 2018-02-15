
$(document).ready(function() { 
		console.log("ok c'est load");

	// --------------------- page /admin
	//On cache le formulaire d'ajout de video
	$( "#formulaire-add-video" ).hide();

	// Au click du boutton on cache le formulaire add video
	$( "#btn-close-formulaire-add-video" ).click(function() {
		$( "#formulaire-add-video" ).toggle( "slow", function() {
	    // Animation complete.
	});
		$("#btn-formulaire-add-video").toggle("slow");
	});

	// Au click du boutton on affiche le formulaire add video
	$( "#btn-formulaire-add-video" ).click(function() {
		$( "#formulaire-add-video" ).toggle( "slow", function() {
	    // Animation complete.
	});
		$("#btn-formulaire-add-video").toggle("slow");
	});


	//On cache le formulaire d'ajout de musique
	$( "#formulaire-add-musique" ).hide();

	// Au click du boutton on cache le formulaire add musique
	$( "#btn-close-formulaire-add-musique" ).click(function() {
		$( "#formulaire-add-musique" ).toggle( "slow", function() {
	    // Animation complete.
	});
		$("#btn-formulaire-add-musique").toggle("slow");
	});

	// Au click du boutton on affiche le formulaire add video
	$( "#btn-formulaire-add-musique" ).click(function() {
		$( "#formulaire-add-musique" ).toggle( "slow", function() {
	    // Animation complete.
	});
		$("#btn-formulaire-add-musique").toggle("slow");
	});

	//Modale suppression image
	$("#btn-suppr-image").click(function(e) {
		e.preventDefault();
		var link = $(this).attr('data-link');
		$('.link-supp').attr('href', link);
		$("#modal-suppr").modal("show");
	})






});






