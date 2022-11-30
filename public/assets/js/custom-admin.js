$(document).ready(function () {

    // call Data Table class
//    $('#sections').DataTable();


    // debug to nav menu
$(".nav-item").removeClass("active");
$(".nav-link").removeClass("active");

    // Check Admin Password is correct or not
    $("#currentPassword").keyup(function () {
        var currentPassword = $("#currentPassword").val();
        /*alert(currentPassword);*/
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "post",
            url: "/admin/check-admin-password",
            data: { currentPassword: currentPassword },
            success: function (resp) {
                console.log(resp);
                // if(resp=="false"){
                // 	$("#check_password").html("<font color='red'>Current Password is Incorrect!</font>");
                // }else if(resp=="true"){
                // 	$("#check_password").html("<font color='green'>Current Password is Correct!</font>");
                // }
            },
            error: function () {
                console.log("error");
            },
        });
    });

    // update admin/vendor status
    $(document).on("click", ".updateAdminStatus", function () {
        var status = $(this).children("i").attr("status");
        var admin_id = $(this).attr("admin_id");
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "post",
            url: "/admin/update-admin-status",
            data: { status: status, admin_id: admin_id },
            success: function (resp) {
                if (resp["status"] == 0) {
                    $("#admin-" + admin_id).html(
                        '<i style="font-size:25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i>'
                    );
                } else {
                    $("#admin-" + admin_id).html(
                        '<i style="font-size:25px;" class="mdi mdi-bookmark-check" status="Active"></i>'
                    );
                }
            },
            error: function (resp) {
                alert("something went wrong");
            },
        });
    });

       // update sections status
       $(document).on("click", ".updateSectionStatus", function () {
        var status = $(this).children("i").attr("status");
        var section_id = $(this).attr("section_id");
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type:'post',
            url: '/admin/update-section-status',
            data:{status:status,section_id:section_id},
            success: function(resp) {
                console.log("success in",resp)
                if (resp["status"] == 0) {
                    $("#section-" + section_id).html(
                        '<i style="font-size:25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i>'
                    );
                } else {
                    $("#section-" + section_id).html(
                        '<i style="font-size:25px;" class="mdi mdi-bookmark-check" status="Active"></i>'
                    );
                }
            },
            error: function (resp) {
                console.log("Error", resp)
            },
        });
    });

    //delete section with sweetalert
    $(".confirm_delete").on('click', function(){
        var module = $(this).attr("module");
        var moduleid = $(this).attr("moduleid");

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
              window.location = "/admin/delete-"+module+"/"+moduleid;
            }
          })

    })

           // update category status
       $(document).on("click", ".updateCategoriestatus", function () {
        var status = $(this).children("i").attr("status");
        var category_id = $(this).attr("category_id");
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type:'post',
            url: '/admin/update-category-status',
            data:{status:status,category_id:category_id},
            success: function(resp) {
                console.log("success in",resp)
                if (resp["status"] == 0) {
                    $("#category-" + category_id).html(
                        '<i style="font-size:25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i>'
                    );
                } else {
                    $("#category-" + category_id).html(
                        '<i style="font-size:25px;" class="mdi mdi-bookmark-check" status="Active"></i>'
                    );
                }
            },
            error: function (resp) {
                console.log("Error", resp)
            },
        });
    });

    // Append Categories / sub category level from ajax
    $("#section_id").change(function(){
        var section_id = $(this).val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            type:'get',
            url: '/admin/append-get-categories-level',
            data:{section_id:section_id},
            success: function(resp){
                $("#appendCategoriesLevel").html(resp);
            }, error: function() {
                alert("Error");
            }

    })

});

// end of file
});
