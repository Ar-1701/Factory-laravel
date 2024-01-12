function check_all() {
    if ($("#check_all").prop("checked")) {
        $("input[type=checkbox]").each(function () {
            $("#" + this.id).prop("checked", true);
        });
    } else {
        $("input[type=checkbox]").each(function () {
            $("#" + this.id).prop("checked", false);
        });
    }
}

function delBtn(type, modelName) {
    var userId = [];
    $(".checkId").each(function () {
        if ($(this).prop("checked")) {
            userId.push($(this).val());
        }
    });
    $.ajax({
        url: '<?php route("delete"); ?>',
        type: "post",
        data: {
            id: userId,
            type: type,
            modelName: modelName,
            _token: "<?php echo @csrf_token(); ?>",
        },
        success: function (data) {
            window.location = '<?php echo url("trash"); ?>';
        },
    });
}
