$(document).ready(function(){

	$('.button-collapse').sideNav();
	$('select').material_select();

	$('.modal').modal();

	$('.see_comment').click(function(){
		var id = $(this).attr('id');
		$.post('admin_seeCommentJs.html', {id:id}, function(){
			$('#commentaire_'+id).hide();
		});
	});

	$('.delete_comment').click(function(){
		var id = $(this).attr('id');
		$.post('admin_deleteCommentJs.html', {id:id}, function(){
			$('#commentaire_'+id).hide();
		});
	});

});
