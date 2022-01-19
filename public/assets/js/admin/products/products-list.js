
var productList = null;

$('#productSearch').on('keyup', function () {
    productList.draw();
});

$(document).ready(function () {
    let urlPath = 'admin/products/list';
    productList =  $('#product-table').DataTable({
        "processing": true,
        "serverSide": true,
        "searching":false,
        ajax: {
            url: BASE_URL+urlPath,
            data: function (d) {
                d.productSearch = $('#productSearch').val();
            }
        },
        "columns": [
            {  data : 'DT_RowIndex', name: 'DT_RowIndex'},
            { "data": "product_name" },
            { "data": "sku" },
            {
                data: null,
                render: function (data) {
                    return `৳ ` + data.regular_price;
                }
            },
            {
                data: null,
                render: function (data) {
                    return `৳ ` + data.sale_price;
                }
            },
            { "data": "stock" },
            {
                data: null,
                render: function (data) {
                    if (data.stock > 0){
                        var stockStatus = '<span  class="badge in-stock"> In-Stock </span>';
                    }else{
                        var stockStatus = '<span  class="badge out-of-stock">Out of Stock</span>';
                    }
                    return stockStatus;
                }
            },
            { "data": "unit" },
            { "data": "average_rating" },
            {
                data: null,
                render: function (data) {
                    let productInfoUrl = BASE_URL+'admin/products/info/'+data.id
                    return `<a href="${BASE_URL}admin/products/edit/${data.id}" class="btn btn-success btn-sm"  aria-pressed="true"><i class="fa fa-pencil"></i></a>
                        <button type="button"  class="btn btn-danger btn-sm" onclick="deleteProduct('+data.id+');" aria-pressed="true"><i class="fa fa-trash"></i></button>
                        <a href="${productInfoUrl}" target="_blank" class="btn btn-warning btn-sm"  ><i class="fa fa-eye"></i></a>
                        <a href="${BASE_URL}admin/products/${data.id}/reviews" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-star"></i></a>`;
                }
            }
        ],
        'columnDefs': [ {
            'targets': [6,9],
            'orderable': false
        }],

    });
});



function deleteProduct(productId) {
    Swal.fire({
        title: "Delete ?",
        text: "Are you sure to delete this product ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Delete",
    }).then((result) => {
        if (result.value) {
            $.ajax({
                method: 'DELETE',
                url: BASE_URL +'admin/products/delete',
                data: {
                    productId: productId,
                },
                success: function (response) {
                    if (response.status == "success") {
                        Swal.fire('Success!', response.message, 'success');
                        productList.draw();
                    }
                }
            });
        }
    });
}

/*

function getProductDetailedInfo(productId,description,additionalInfo,product_image,product_image_1,product_image_2) {
    $.ajax({
        method: 'GET',
        url: BASE_URL +'admin/products/get-product-detail-info',
        data: {
            productId: productId,
        },
        success: function (response) {
            var categoriesHtml = '';
            var subCategoriesHtml = '';
            var productImageUrl = BASE_URL+'storage/uploads/products/';
            var sr = 1;
            if (response.status == "success") {
                $.each(response.data.categories,function (key,value) {
                    categoriesHtml += '<tr><td>'+sr+'</td><td>'+value.category+'</td></tr>';
                    sr++;
                });
                $.each(response.data.subCategories,function (key2,value2) {
                    subCategoriesHtml += '<tr><td>'+sr+'</td><td>'+value2.subcategory+'</td></tr>';
                    sr++;
                });
                $("#product_info_categories").html(categoriesHtml);
                $("#product_info_sub_categories").html(subCategoriesHtml);
                if (description){
                    $("#description_content").html(description);
                }if (additionalInfo){
                    $("#other_info_content").html(additionalInfo);
                }
                $("#productImgLabel").html('<img src="'+productImageUrl+product_image+'" width="50"/>');
                if (product_image_1 && product_image_1 !="null"){
                    $("#productImg1Label").html('<img src="'+productImageUrl+product_image_1+'" width="50"/>');
                }
                if (product_image_2 && product_image_2 !="null"){
                    $("#productImg2Label").html('<img src="'+productImageUrl+product_image_2+'" width="50"/>');
                }

            }
        }
    });
    $("#productInfoModal").modal('show');
}
*/

function showUploadProductModal() {
    $("#uploadProductModal").modal('show');
}

$("form#uploadProductForm").on("submit",function (e) {
    e.preventDefault();
    if (validateBulkUpload()) {
        $.ajax({
            url: BASE_URL + 'admin/products/upload',
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                hideErrorMessages();
                $("#loader").show();
            },
            success: function (response) {
                if (response.status == 'success') {
                    Swal.fire('Success!', response.message, 'success');
                    productList.draw();
                }
            },
            error: function (errorResponse) {
                console.log(errorResponse);
                printErrorMessage(errorResponse);
            },
            complete: function () {
                $("#loader").hide();
                $("#uploadProductModal").modal('hide');
            }
        });
    }

});

/**
 * This function validates the image/logo upload
 */
function validateFileUpload() {
    if ($("#product_file").val()){
        let errorMessage = '';
        let extension = $("#product_file").val().substr( ($("#product_file").val().lastIndexOf('.') +1) );
        extension = extension.toLocaleLowerCase();
        let arrayExtensions = ["csv"];

        if (arrayExtensions.lastIndexOf(extension) == -1) {
            errorMessage = 'Only CSV files are allowed';
            $("#product_file").val('');
        }
        $("#product_fileError").text(errorMessage);
    }else{
        $("#product_fileError").text("");
    }
}

/**
 * This function prepares the form data
 * with file attributes
 * @returns {FormData}
 */
function prepareFormData(formId,fileId,productImagesId) {
    var form = $('#'+formId);
    var params = form.serializeArray();
    var files = $('#'+fileId)[0].files[0];
    var formData = new FormData();
    if (files){
        var fileName = $('#'+fileId).attr('name');
        formData.append(fileName, files);
    }
    $(params).each(function (index, element) {
        formData.append(element.name, element.value);
    });
    return formData;
}

function validateBulkUpload() {
    var isValidated = true;
    var product_file = $("#product_file").val();
    var product_images = $("#product_images").val();
    if (product_file == ""){
        $("#product_fileError").html("Please select CSV file");
        isValidated = false;
    }if (product_images == ""){
        $("#product_imagesError").html("Please select product images");
        isValidated = false;
    }
    return isValidated;
}
