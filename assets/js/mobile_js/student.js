$(document).on('click', '#editInfo', function () {

    // alert("Edit");
    // return
    $.post({
    url: base_url + 'mobile/service/Mobile_service/edit_student_info',
    // selector: '.form-control',
    data: {
            ID    : $('#userID').val(),
            fname : $('#fName').val(),
            mname : $('#mName').val(),
            lname : $('#lName').val(),
            cnum  : $('#cNum').val(),
            email : $('#email').val()
        },
    success:function(e)
        {
            var e = JSON.parse(e);
            if(e.has_error == false){
                // $('#modal-default').modal('hide');
                toastr.success(e.message);
                // $('#save').css('display','none');
                // $('#bill').css('display','inline');
                // $('#proceed_payment').css('display','block');
                // $('.form-control').attr('disabled','disabled');
                // $('.btn_add_item').attr('disabled','disabled');
                
                // $('#proceed_payment').click(function() {
                //     window.location.href = base_url+"point_of_sale/payment/?custid="+$('#cust_id').val()+'&oid='+e.id;
                // });
    
            } else {
            //   $('#List').attr('class', 'form-control inpt is-invalid');
            //   $('#modal-default').modal('hide');
              toastr.error(e.message); 
            }
    },
    })
    
    }); 