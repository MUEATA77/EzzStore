$(document).ready(function() {
    // Handle AJAX requests
    $("body").delegate(".sent_order","click",function(event){
		var sent = $(this).parent().parent().parent();
		var sent = sent.find(".sent_order").attr("sent_id");
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{sentOrder:1,sid:sent},
			success	:	function(data){
				window.location.reload();
			}
		})
	})
    

  });