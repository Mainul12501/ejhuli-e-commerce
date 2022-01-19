/**
 * This block of code is just to set the
 * placeholders for select statements
 */
$(function () {
    $("#productCategory").select2({
        placeholder: {
            text: "Select"
        }
    });
    $("#productSubCategory").select2({
        placeholder: {
            text: "Select"
        }
    });
    /*$("#productBrands").select2({
        placeholder: {
            text: "Select"
        }
    });*/
    $("#productDisplay").select2({
        placeholder: {
            text: "Select"
        }
    });
    $("#product_tags").select2({
        placeholder: {
            text: "Select"
        }
    });
});
/**
 * This block of code just show the generated
 * slug for the product
 */
$("#productName").on('change',function () {
    var productName = $("#productName").val();
    if (productName){
        $("#productSlug").val(slugify(productName));
    }
});

/**
 * This block of code finds the subcategories on
 * change of category dropdown
 */
$("#productCategory").on('change',function () {
    var categories = $("#productCategory").val();
    if (categories){
        getSubCategories(categories);
    }
});


/**
 * This block of code just put the
 * dropdown values selected in case of edit
 */
$(function () {
    if ($("#editId").val()){
        $("#loader").show();
        var categories = $("#editCategoryIds").val();
       // var brandIds = $("#brandIds").val();
        var productDisplayIds = $("#productDisplayIds").val();
        var taggedIds = $("#taggedIds").val();
         setTimeout(function () {
             if (categories){
                 $("#productCategory").val(categories.split(',')).trigger("change");
             }
           /* if (brandIds){
                $("#productBrands").val(brandIds.split(',')).trigger("change");
            }*/
            if(taggedIds){
                $("#product_tags").val(taggedIds.split(',')).trigger("change");
            }
            if (productDisplayIds){
                $("#productDisplay").val(productDisplayIds.split(',')).trigger("change");
            }
             $("#loader").hide();
        },2000);
    }
});


/**
 * This function is to get subcategories based on categoryId
 * @scope local
 * @param categories
 */
function getSubCategories(categories) {
    $.ajax({
        type: 'POST',
        url: BASE_URL + 'admin/common/get-sub-category',
        data: {
            category:categories
        },
        success: function (response) {
            var subCategoryHtml = '';
            if (response.status == "success") {
                var subCategories = response.data;
                $.each(subCategories,function (key,value) {
                    subCategoryHtml += '<option value="'+value.id+'">'+value.subcategory+'</option>';
                });
                $("#productSubCategory").html(subCategoryHtml);
                if ($("#editId").val()) {
                   $("#productSubCategory").val($("#editSubCategoryIds").val().split(','));
                   $('#productSubCategory').trigger('change');
                }
            }
        }
    });
}


/**
 * This block of code is to save products to database
 */
var requestMethod,requestApi;
$("form#addEditProductForm").on("submit",function (e) {
    e.preventDefault();
    var editId = $("#editId").val();
    if (editId){
        requestMethod = 'POST';
        requestApi = 'update';
    }else{
        requestMethod = 'POST';
        requestApi = 'create';
    }
    if (validateProductForm()){
        $("#loader").show();
        $.ajax({
            type: requestMethod,
            url: BASE_URL + 'admin/products/'+requestApi,
            processData: false,
            contentType: false,
            data: new FormData(this),
            success: function (response) {
                if (response.status == "success") {
                    Swal.fire('Success!', response.message, 'success').then(function () {
                        window.location.href = BASE_URL+'admin/products';
                    });
                }
            },
            error: function (errroResponse) {
                printErrorMessage(errroResponse);
                scrollToTop();
            },
            complete: function () {
                $("#loader").hide();
                scrollToTop();
            }
        });
    }else{
        scrollToTop();
    }

});

/**
 * This function is to validate form before final submit
 * @returns {boolean}
 */
function validateProductForm() {
    var isValidated = true;
    var productSku = $("#productSku").val();
    var productName = $("#productName").val();
    var regularPrice = $("#regularPrice").val();
    var productSlug = $("#productSlug").val();
    var stock = $("#productStock").val();
    var productUnit = $("#productUnit").val();
    var productImage = $("#productImage").val();
    var categories = $("#productCategory").val();
    var productSubCategory = $("#productSubCategory").val();
    var description = $("#productDescription").val();
    var product_tags = $("#product_tags").val();
   // var productBrands = $("#productBrands").val();
    var productDisplay = $("#productDisplay").val();
    hideErrorMessages();
    if (productSku == ""){
        $("#productSkuError").html("<i class='fa fa-info-circle'></i> Please enter product SKU");
        isValidated = false;
    }
    if (productName == ""){
        $("#productNameError").html("<i class='fa fa-info-circle'></i> Please enter product name");
        isValidated = false;
    }
    if (regularPrice == ""){
        $("#regularPriceError").html("<i class='fa fa-info-circle'></i> Please enter regular price");
        isValidated = false;
    }if (productSlug == ""){
        $("#productSlugError").html("<i class='fa fa-info-circle'></i> Please enter product slug");
        isValidated = false;
    }
    if (stock == ""){
        $("#productStockError").html("<i class='fa fa-info-circle'></i> Please enter stock");
        isValidated = false;
    }if (productUnit == ""){
        $("#productUnitError").html("<i class='fa fa-info-circle'></i> Please enter unit");
        isValidated = false;
    }
    if ($("#editId").val() == "" && productImage == ""){
        $("#productImageError").html("<i class='fa fa-info-circle'></i> Please select product image");
        isValidated = false;
    }
    if (!categories){
        $("#productCategoryError").html("<i class='fa fa-info-circle'></i> Please select categories");
        isValidated = false;
    }
    if (!productSubCategory){
        $("#productSubCategoryError").html("<i class='fa fa-info-circle'></i> Please select sub categories");
        isValidated = false;
    }/* if (!productBrands){
        $("#productBrandsError").html("<i class='fa fa-info-circle'></i> Please select brands categories");
        isValidated = false;
    }*/
    if (!product_tags){
        $("#product_tagsError").html("<i class='fa fa-info-circle'></i> Please select product tags");
        isValidated = false;
    } if (!productDisplay){
        $("#productDisplayError").html("<i class='fa fa-info-circle'></i> Please select display");
        isValidated = false;
    }
    if (description == ""){
        $("#productDescriptionError").html("<i class='fa fa-info-circle'></i> Please enter product description");
        isValidated = false;
    }
    return isValidated;
}

/**
 * This function is to clear extra form values after successfully save
 * @scope local
 */
function clearFormValues(){
    $("#addEditProductForm")[0].reset();
    $("#productCategory").val([]).trigger("change");
    $("#productSubCategory").val([]).trigger("change");
    $("#productDescription").val("");
    CKEDITOR.instances['additionalInfo'].setData("");
}

// ckeditor init for Short Description
// CKEDITOR.replace( 'productDescription' );
// CKEDITOR.add;
// ckeditor init for Additonal Information
// CKEDITOR.replace( 'additionalInfo' );
// CKEDITOR.add;
