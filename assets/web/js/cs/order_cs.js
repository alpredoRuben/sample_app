'use strict'

var URL_CATEGORY_ITEM = window.site_url + 'customer/app/list/category';
var URL_GROUP_ITEM_LIST = window.site_url + 'customer/app/list/group_item';
var URL_PRODUCT_ITEM = window.site_url + 'customer/app/list/product/by/';
var URL_ADD_LIST_ORDER_ITEM = window.site_url + 'customer/app/add/order/item';
var URL_GET_CART_ORDER_ITEM = window.site_url + 'customer/app/get/cart/order/item';
var URL_PAY_ORDER_ITEM = window.site_url + 'customer/app/pay/cart/order/item';

var _list_cart = {}

/** Load Category */
function load_category_item(element) {  
    
    $.getJSON(URL_CATEGORY_ITEM, 
        function (data) {
            
            if(data.status == true && data.messages.length > 0){
                $(element).empty();
                $('<option>').val('-').text('-- Choose Category --').appendTo($(element));

                $.each(data.messages, function (i, v) { 
                    $('<option>').val(v.id_kategori).text(v.nama_kategori.toUpperCase()).appendTo( $(element));
                });

            }
            else{
                box_alert.alertError('ERROR', data.messages);
            }
        }
    );

}


/** Load Group Item List */
function set_group_item_list(element, data){
    $(element).empty();
    $('<option>').val('-').text('-- Group Item Name --').appendTo($(element));
    $.each(data, function (i, v) { 
        $('<option>').val(v.kode_item).text(v.nama_item).appendTo( $(element));
    });
}

/** Load Datatable */
function load_datatable_item(_element, _path_url) 
{
    var mytable = $(_element).DataTable({
        ajax: _path_url,
        columnDefs:[
            {
                targets:0,
                checkboxes:{
                    selectRow:true
                }
            }
        ],
        select:{
            style: 'multi'
        },
        order:[[1, 'asc']],
        searching:false
    });

    return mytable;
}

function load_datatable_order_list(_element){
    
    if( $.fn.DataTable.isDataTable(_element) ){
        $(_element).DataTable().destroy();
    }

    var _table = $(_element).DataTable({
        "searching" : false,
        "ajax": {
            "url": URL_GET_CART_ORDER_ITEM,
            "type": "GET",
            "dataSrc" : function(json){
                if(json.status == true){
                    return json.messages.record_data.data;
                }
                
            }
        },   
        "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
        ],
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
            
            // // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            var total = api.column(8).data().reduce(function (a, b) { return intVal(a) + intVal(b); }, 0);
            
            // // Total over this page
            var pageTotal = api.column( 8, { page: 'current'} ).data().reduce( function (a, b) { 
                return intVal(a) + intVal(b); 
            }, 0 );
 
            // // Update footer
            $(api.column(8).footer()).html( total );
        }    

    });

    return _table

}


$(document).ready(function () {

    var list_table;
    var order_table;

    _list_cart.id_list = [];

    $('#txtDateInvoice').val(get_now_date_format());
    load_category_item('#optItemCategory');

    order_table = load_datatable_order_list('#tblCartListOrder');


    /** Event Item Category Change */
    $('#optItemCategory').change(function (e) { 
        e.preventDefault();
        
        if($(this).val() != '-'){

            axios.post(URL_GROUP_ITEM_LIST, { id_kategori : $(this).val() }).then(function (response) {
                if(response.data.status == true){
                    set_group_item_list(
                        '#optItemGroup', response.data.messages
                    )
                }
                else{
                    box_alert.alertError('Error', response.data.messages);
                }
            }).catch(function (error) {
                console.log(error);
            });

        }
        else {
            warning_messages('Silahkan pilih kategori');
        }

    });

    $('#optItemGroup').change(function (e) { 
        e.preventDefault();
        
        if($(this).val() != '-'){

            if( $.fn.DataTable.isDataTable('#myListTable') ){
                $('#myListTable').DataTable().destroy();
            }

            list_table = load_datatable_item(
                '#myListTable', URL_PRODUCT_ITEM + $(this).val()
            );
        }
        else{
            warning_messages('Silahkan pilih nama group item');
        }

    });

    $('#btnInsertItem').click(function (e) { 
        e.preventDefault();
        var rowsel = list_table.column(0).checkboxes.selected();
        
        if(rowsel.length > 0){
            _list_cart.id_list.push(rowsel.join(','));
            
            axios.post(URL_ADD_LIST_ORDER_ITEM, { list_item : rowsel.join(',') }).then(function (response) {

                if(response.data.status == true){
                    box_alert.alertSuccess('BERHASIL', response.data.messages);
                    order_table.ajax.reload();
                }
                else{
                    box_alert.alertError('GAGAL', response.data.messages);
                }


            }).catch(function (error) {
                console.log(error);
            });



        }
        else{
            warning_messages('Silahkan pilih item yang ingin ditambahkan');
        }


    });


    $('#btnSubmitOrder').click(function (e) { 
        e.preventDefault();
        var _user_order = {
            comp_name : $('#txtCompanyName').val(),
            comp_address: $('#areaStreetAddress').val(),
            comp_email: $('#txtEmail').val(),
            comp_phone: $('#txtNumberPhone').val(),
            no_bill_account: $('#txtNoBillAccount').val(),
            invoice_date: $('#txtDateInvoice').val()
        };

        
        axios.post(URL_PAY_ORDER_ITEM, { customers : _user_order }).then(function (response) {
            if(response.data.status == true){
                box_alert.alertSuccess('BERHASIL', response.data.messages);
                $('#frmidentify')[0].reset();
                list_table.ajax.reload();
                order_table.ajax.reload()
            }
            else{
                box_alert.alertError('GAGAL', response.data.messages);
            }
        }).catch(function (error) {
            console.log(error);
        });

    });

    

   
});