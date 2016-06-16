$("[id=aaa]").click(function(){
		var x = this;
		$.ajax({
			url: '/movie/delete',
			data: {'id':x.value},
			type: 'get'
		})
		.done(function(result){
			$(x).closest('div').fadeOut().promise().done(function(){
				this.remove();
			});
		})
		.fail(function(){
			alert("error");
		});
	});
	// function deleteMovie(x,id){
	// 		$.ajax({
	// 			url: '{{url("/movie/delete")}}',
	// 			data: {'id':id},
	// 			type: 'get'
	// 		})
	// 		.done(function(result){
	// 			// console.log($(x).parents('div'));
	// 			$(x).closest('div').remove();
	// 			// console.log(result);
	// 		})
	// 		.fail(function(){
	// 			alert("error");
	// 		});
	// }