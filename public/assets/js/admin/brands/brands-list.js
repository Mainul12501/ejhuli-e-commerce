
var brandList = null;
$('#brandStatus').on('change', function () {
    brandList.draw();
});

$('#brandNameSearch').on('keyup', function () {
    brandList.draw();
});

$(document).ready(function () {
    let urlPath = 'admin/brands/list';
    brandList =  $('#brand-table').DataTable({
        "processing": true,
        "serverSide": true,
        "searching":false,
        ajax: {
            url: BASE_URL+urlPath,
            data: function (d) {
                d.brandStatus = $("#brandStatus").val();
                d.brandNameSearch = $('#brandNameSearch').val();
            }
        },
        "columns": [
            {  data : 'DT_RowIndex', name: 'DT_RowIndex'},
            { "data": "id" },
            {  data: null,
                render: function (data) {
                    var brandImageUrl = BASE_URL+'storage/uploads/brands/';
                    if (data.logo && data.logo !="null"){
                        return '<img src="'+brandImageUrl+data.logo+'" width="50"/>';
                    }else{
                        return  '';
                    }
                }
            },

            { "data": "name" },
            { "data": "description" },
            {
                data: null,
                render: function (data) {
                    if (data.status == 1){
                        var statusLabels = '<span  class="badge isActive"> Active </span>';
                    }else{
                        var statusLabels = '<span  class="badge isInActive"> In-Active </span>';
                    }

                    return statusLabels;
                }
            },
            {
                data: null,
                render: function (data) {
                    var edit_button = '<button type="button" onclick="editBrand('+data.id+',\''+data.name+'\',\''+data.slug+'\',\''+data.description+'\',\''+data.logo+'\');" class="btn btn-success btn-sm" role="button" aria-pressed="true"><i class="fa fa-pencil"></i> </button>'+
                        '<button type="button" onclick="deleteBrand('+data.id+',\''+data.logo+'\');" class="btn btn-danger btn-sm" role="button" aria-pressed="true"><i class="fa fa-trash"></i></button>'+
                        '<button type="button" onclick="activateDeactivateBrand('+data.id+','+data.status+');" title="Change Status" class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i class="fa fa-refresh"></i> </button>';
                    return edit_button;
                }
            }
        ],
        'columnDefs': [ {
            'targets': [2,5,6],
            'orderable': false
        }],

    });
});


function editBrand(brandId,brandName,slug,description,logo) {
    $("#editId").val(brandId);
    $("#brandName").val(brandName);
    $("#brandSlug").val(slug);
    $("#preBrandLogo").val(logo);
    $("#description").val(description);
    hideErrorMessages();
    $("#addEditBrandModal").modal('show');
}

function deleteBrand(brandId,logo) {
    Swal.fire({
        title: "Delete ?",
        text: "Are you sure to delete this brand!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Delete",
    }).then((result) => {
        if (result.value) {
            $.ajax({
                method: 'DELETE',
                url: BASE_URL +'admin/brands/delete',
                data: {
                    brandId: brandId,
                    logo: logo
                },
                success: function (response) {
                    if (response.status == "success") {
                        Swal.fire('Success!', response.message, 'success');
                        brandList.draw();
                    }else if (response.status == "error"){
                        Swal.fire("Can't be deleted ", response.message, 'error');
                    }
                }
            });
        }
    });
}


function activateDeactivateBrand(brandId,status) {
    var message = ((status == 1?"Activate":"De-activate"));
    var updateStatus = ((status == 1?2:1));
    Swal.fire({
        title: " "+message+"?",
        text: "Do you want to "+message+" this brand ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Yes",
    }).then((result) => {
        if (result.value) {
            $.ajax({
                method: 'POST',
                url: BASE_URL +'admin/brands/change-status',
                data: {
                    brandId: brandId,
                    updateStatus: updateStatus,
                },
                success: function (response) {
                    if (response.status == "success") {
                        Swal.fire('Success!', response.message, 'success');
                        brandList.draw();
                    }
                }
            });
        }
    });
}
