$(document).ready(function () {
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
});
