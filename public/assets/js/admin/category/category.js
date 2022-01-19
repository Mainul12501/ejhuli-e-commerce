
$(function () {
    $('#categoryIcon').selectpicker();
});
function showAddEditCategoryModel() {
    $("#editId").val("");
    $("#category").val("");
    $("#categoryIcon").val("");
    $("#description").val("");
    hideErrorMessages();
    $("#addEditCategoryModal").modal('show');
}
var requestMethod,requestApi;
$("form#addEditCategoryForm").on("submit",function (e) {
    e.preventDefault();
    var editId = $("#editId").val();
    if (validateCategoryForm()){
        $("#addEditCategoryBtn").attr('disabled',true);
        if (editId){
            requestMethod = 'POST';
            requestApi = 'update';
        }else{
            requestMethod = 'POST';
            requestApi = 'create';
        }
        $.ajax({
            type: requestMethod,
            url:BASE_URL+'admin/categories/'+requestApi,
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                if (response.status == "success"){
                    Swal.fire('Success!', response.message, 'success');
                    $("form#addEditCategoryForm").each(function () {
                        this.reset();
                    });
                    $("#addEditCategoryModal").modal('hide');
                }
            },
            error:function (errorResponse) {
                printErrorMessage(errorResponse);
            },
            complete: function () {
                enableSubmitButton('addEditCategoryBtn');
                categoryList.draw();
            }
        });
   }
});

function validateCategoryForm() {
    var isValidated = true;
    var category = $("#category").val();
    var categoryIcon = $("#categoryIcon").val();
    var description = $("#description").val();
    var navigation = $("#navigation").val();
    hideErrorMessages();
    if (category == ""){
        $("#categoryError").html("Please enter category name");
        isValidated = false;
    }if (categoryIcon == ""){
        $("#categoryIconError").html("Please enter category icon");
        isValidated = false;
    }if (description == ""){
        $("#descriptionError").html("Please enter description name");
        isValidated = false;
    }if (navigation == ""){
        $("#navigationError").html("Please enter description name");
        isValidated = false;
    }

    return isValidated;
}


