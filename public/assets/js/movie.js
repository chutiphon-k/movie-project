$('#chat-form').submit(function() {
	var review_message = $('#chat-message').val();
	if(review_message){
		var baseUrl = document.location.origin;
        var dataReview = {};
        dataReview.movie_id = $('#movie_id').val();
        dataReview.user_id = $('#user_id').val();
        dataReview.info = review_message;

        $.ajax({
        	url: baseUrl+'/storeReview',
        	type: "post",
        	data: {'dataReview': dataReview},
   		})
   		.done(function(result){
			var person = {
			    a: baseUrl + '/profile/'+dataReview.user_id,
			    b: $('#user_avatar').val(),
			    e: $('#user_name').val(),
			    c: review_message,
			    d: result
			};
			var template = '<li class="message message--me">'+
		        			'<a href={{a}}><img src={{b}} style="width:40px;height:40px;"></a>'+
		        			'<b style="color:#2491F9;">{{e}}</b> : {{c}}'+
		        			'<b style="float: right;font-size:70%;color:white;">{{d}}</b>'+
			        		'</li>';
			var html = Mustache.to_html(template, person);
			$('#chat-history').prepend(html);

		})
		.fail(function() {
		    alert( "error" );
		});
		$('#chat-history').scrollTop(0);
      }
      $(this)[0].reset();
      return false;
  });