$(document).ready(function(){
	// Check Admin Password is correct or not
	$("#currentPassword").keyup(function(){
		var currentPassword = $("#currentPassword").val();
		/*alert(currentPassword);*/
		$.ajax({
			headers: {
        		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    		},
			type:'post',
			url:'/admin/check-admin-password',
			data:{currentPassword:currentPassword},
			success:function(resp){
                console.log(resp)
				// if(resp=="false"){
				// 	$("#check_password").html("<font color='red'>Current Password is Incorrect!</font>");
				// }else if(resp=="true"){
				// 	$("#check_password").html("<font color='green'>Current Password is Correct!</font>");
				// }
			},error:function(){
				console.log("error")
			}

		});
	})
});
