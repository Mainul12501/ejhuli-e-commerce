
var productReviewsList = null;
$(document).ready(function () {
    productReviewsList =  $('#product-reviews-table').DataTable({
        "processing": true,
        "serverSide": true,
        "searching":false,
        ajax: {
            url: `${BASE_URL}admin/products/${productId}/list-reviews`,
            data: function (d) {}
        },
        "columns": [
            {  data : 'DT_RowIndex', name: 'DT_RowIndex'},
            {
              data: null,
              render: function (data) {
                  return data.first_name + " " + data.last_name;
              }
            },
            { "data": "rating" },
            { "data": "remark" },
            {
                data: null,
                render: function (data) {
                    if (data.status == 1){
                        var statusLabels = '<span  class="badge isActive"> Active </span>';
                    }else{
                        var statusLabels = '<span  class="badge archived"> Archive </span>';
                    }
                    return statusLabels;
                }
            },
            {
                data: null,
                render: function (data) {
                    let reviewPictures = ``;
                    if (data.review_pictures){
                        review_pictures = data.review_pictures.split(',');
                        $.each(review_pictures, function(key, picture) {
                            reviewPictures += `<img src="${BASE_URL}storage/uploads/products-reviews/${picture}" width="100" style="margin-left:10px;"/>`;
                        });
                    }
                    return reviewPictures;
                }
            },
            {
                data: null,
                render: function (data) {
                    return `<button type="button" class="btn btn-danger btn-sm" onclick="archiveReview(${data.id});" aria-pressed="true"><i class="fa fa-trash"></i></button>`;
                }
            }
        ],
        'columnDefs': [ {
            'targets': [],
            'orderable': false
        }],
    });
});

/**
 * This function archives the product review
 * @param id
 */
function archiveReview(id) {
    Swal.fire({
        title: "Archive ?",
        text: "Are you sure to archive this review ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Yes",
    }).then((result) => {
        if (result.value) {
            $.ajax({
                method: 'POST',
                url: `${BASE_URL}admin/products/archive-review`,
                data: {
                    id: id,
                    product_id:productId,
                },
                success: function (response) {
                    if (response.success) {
                        Swal.fire('Success!', response.message, 'success');
                        productReviewsList.draw();
                    }
                }
            });
        }
    });
}
