// $(document).on('click', '#save_items', function () {
    
//     // item ID
// var items = document.getElementsByClassName('item_id');
// var item_name = [];
// for(var i=0; i < items.length; i++){
//     var items_id = $(items[i]).data('id');
//     item_name.push(items_id);
// }

//     // item qty
// var items_qty = parseFloat(0);
// var qty = document.getElementsByClassName('item_qty');
// var item_qty = [];
// for(var i=0; i < qty.length; i++){
//     items_qty =  parseFloat(qty[i].innerHTML);
//     item_qty.push(items_qty);
// }

// // item price
// var items_subtotal = parseFloat(0);
// var items = document.getElementsByClassName('item_subtotal');
// var item_amount = [];

// for(var i=0; i < items.length; i++){
//     items_subtotal = parseFloat(items[i].innerHTML);
//     item_amount.push(items_subtotal);
// }

// $.post({
// url: base_url + 'create_order/service/Create_order_service/save_order',
// // selector: '.form-control',
// data: {
//     ID     : $('#cust_id').val(),
//     Qty     : $('#t_qty').val(),
//     Total     : $('#total_amount').html(),
//     Subtotal : $('#all_subtotal').val(),
//     Discount : $('#discount').val(),
//     B_date     : $('#b_date').val(),
//     D_date     : $('#d_date').val(),
//     D_notes: $('#d_notes').val(),
//     B_notes: $('#b_notes').val(),
//     Freebies: $('#freebies').val(),
//     Item_id : item_name,
//     Item_qty: item_qty,
//     Item_amount: item_amount,
// },
// success:function(e)
//     {
//         var e = JSON.parse(e);
//         if(e.has_error == false){
//             $('#modal-default').modal('hide');
//             toastr.success(e.message);
//             $('#save').css('display','none');
//             $('#bill').css('display','inline');
//             $('#proceed_payment').css('display','block');
//             $('.form-control').attr('disabled','disabled');
//             $('.btn_add_item').attr('disabled','disabled');
            
//             $('#proceed_payment').click(function() {
//                 window.location.href = base_url+"point_of_sale/payment/?custid="+$('#cust_id').val()+'&oid='+e.id;
//             });

//         } else {
//         //   $('#List').attr('class', 'form-control inpt is-invalid');
//           $('#modal-default').modal('hide');
//           toastr.error(e.message); 
//         }
// },
// })

// }); 
$(document).on('click', '#schedBtn', function () {

// alert("Schedule");
return
$.post({
url: base_url + 'create_order/service/Create_order_service/save_order',
// selector: '.form-control',
success:function(e)
    {
        var e = JSON.parse(e);
        if(e.has_error == false){
            // $('#modal-default').modal('hide');
            // toastr.success(e.message);
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
        //   toastr.error(e.message); 
        }
},
})

}); 
$(document).on('click', '#logoutBtn', function () {

// alert("Logout");
return
$.post({
url: base_url + 'create_order/service/Create_order_service/save_order',
// selector: '.form-control',
success:function(e)
    {
        var e = JSON.parse(e);
        if(e.has_error == false){
            // $('#modal-default').modal('hide');
            // toastr.success(e.message);
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
        //   toastr.error(e.message); 
        }
},
})

}); 
$(document).on('click', '#profBtn', function () {

// alert("Profile");
return
$.post({
url: base_url + 'mobile/Mobile/student_profile',
// selector: '.form-control',
success:function(e)
    {
        var e = JSON.parse(e);
        if(e.has_error == false){
            // $('#modal-default').modal('hide');
            // toastr.success(e.message);
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
        //   toastr.error(e.message); 
        }
},
})

}); 