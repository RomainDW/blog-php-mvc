$(document).ready(function(){

	$('.button-collapse').sideNav();
	$('select').material_select();

	$('.modal').modal();

	$('.see_comment').click(function(){
		var id = $(this).attr('id');
		$.post('?p=admin&a=see_comment', {id:id}, function(){
			$('#commentaire_'+id).hide();
		});
	});

	$('.delete_comment').click(function(){
		var id = $(this).attr('id');
		$.post('?p=admin&a=delete_comment', {id:id}, function(){
			$('#commentaire_'+id).hide();
		});
	});

});
