
function showAddEditBrandModel() {
    $("#editId").val("");
    $("form#addEditBrandForm")[0].reset();
    hideErrorMessages();
    $("#addEditBrandModal").modal('show');
}

$(document).ready(function () {
    $("#brandName").on('keyup',function () {
        $("#brandSlug").val(slugify($("#brandName").val()));
    });
});

var requestMethod,requestApi;
$("form#addEditBrandForm").on("submit",function (e) {
    e.preventDefault();
    var editId = $("#editId").val();
    if (validateBrandForm()){
        $("#addEditBrandBtn").attr('disabled',true);
        if (editId){
            requestMethod = 'POST';
            requestApi = 'update';
        }else{
            requestMethod = 'POST';
            requestApi = 'create';
        }
        $.ajax({
            type: requestMethod,
            url:BASE_URL+'admin/brands/'+requestApi,
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                if (response.status == "success"){
                    Swal.fire('Success!', response.message, 'success');
                    $("form#addEditBrandForm").each(function () {
                        this.reset();
                    });
                    $("#addEditBrandModal").modal('hide');
                }
            },
            error:function (errorResponse) {
                printErrorMessage(errorResponse);
            },
            complete: function () {
                enableSubmitButton('addEditBrandBtn');
               brandList.draw();
            }
        });
    }
});

function validateBrandForm() {
    var isValidated = true;
    var brandName = $("#brandName").val();
    var description = $("#description").val();
    var brandSlug = $("#brandSlug").val();
    hideErrorMessages();
    if (brandName == ""){
        $("#brandNameError").html("Please enter brand name");
        isValidated = false;
    } if (brandSlug == ""){
        $("#brandSlugError").html("Please enter brand slug");
        isValidated = false;
    }if (description == ""){
        $("#descriptionError").html("Please enter description name");
        isValidated = false;
    }
    return isValidated;
}


