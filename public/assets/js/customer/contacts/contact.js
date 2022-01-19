let contactValidator = $("#contactUsForm").validate({
    rules: {
        name:{
            required: true,
        },
        email:{
            required: true,
        },
        subject:{
            required: true,
        },
        message:{
            required: true,
        },
    },
    errorClass: "input-error",
    errorElement: "span",
    submitHandler: function () {
        $.ajax({
            type: 'POST',
            url: BASE_URL + 'send-enquiry',
            data : $("#contactUsForm").serialize(),
            beforeSend:function(){
                $('.input-error').text("");
                $("#loader").show();
            },
            success: function (response) {
                toastr.success(response.message);
                $("#contactUsForm")[0].reset();
            },
            complete: function () {
                $("#loader").hide();
            },
            error: function (errorData) {
                printValidationErrorMsg(errorData,contactValidator);
            },
        });
    }
});
