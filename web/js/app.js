$('#postArt').click(function(){
	if($('#titre').val().length > 50 || $('#contenu').val().length > 500){
		alert('Erreur !')
	};
})