var TableData = function() {
    //function to initiate DataTable
    //DataTable is a highly flexible tool, based upon the foundations of progressive enhancement, 
    //which will add advanced interaction controls to any HTML table
    //For more information, please visit https://datatables.net/
    var runDataTable = function() {
        var oTable = $('#sample_1').dataTable({
            "aoColumnDefs": [{
                    "aTargets": [0]
                }],
            "oLanguage": {
                "sLengthMenu": "Show _MENU_ Rows",
                "sSearch": "",
                "oPaginate": {
                    "sPrevious": "",
                    "sNext": ""
                }
            },
            "aaSorting": [
                [0, 'asc']
            ],
            "aLengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "iDisplayLength": 10,
        });
        $('#sample_1_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "Search");
        // modify table search input
        $('#sample_1_wrapper .dataTables_length select').addClass("m-wrap small");
        // modify table per page dropdown
        $('#sample_1_wrapper .dataTables_length select').select2();
        // initialzie select2 dropdown
        $('#sample_1_column_toggler input[type="checkbox"]').change(function() {
            /* Get the DataTables object again - this is not a recreation, just a get of the object */
            var iCol = parseInt($(this).attr("data-column"));
            var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
            oTable.fnSetColumnVis(iCol, (bVis ? false : true));
        });

        $('.user_delete').click(function() {
            var id = $(this).attr('data-val');
            var name = $(this).attr('name');
            var conf = confirm('Continue delete?');
            if (conf)
                $(this).parents('tr').fadeOut(function() {
                    $.post(siteURL + "/user/delete", {
                        id: id
                    })
                            .done(function(data) {
                                if (data === 'success') {
                                    $(function() {
                                        setTimeout(function() {
                                            $.bootstrapGrowl("Data berhasil dihapus");
                                        });
                                    });
                                    $(this).remove();
                                } else {
                                    $(function() {
                                        setTimeout(function() {
                                            $.bootstrapGrowl("Data gagal dihapus");
                                        });
                                    });
                                }
                            });
                    // do some other stuff here
                });
            return false;
        });

        $('.category_delete').click(function() {
            var id = $(this).attr('data-val');
            var conf = confirm('Continue delete?');
            if (conf)
                $(this).parents('tr').fadeOut(function() {
                    $.post(siteURL + "/category/delete", {
                        id: id
                    })
                            .done(function(data) {
                                if (data === 'success') {
                                    $(function() {
                                        setTimeout(function() {
                                            $.bootstrapGrowl("Data berhasil dihapus");
                                        });
                                    });
                                    $(this).remove();
                                } else {
                                    $(function() {
                                        setTimeout(function() {
                                            $.bootstrapGrowl("Data gagal dihapus");
                                        });
                                    });
                                }
                            });
                    // do some other stuff here
                });
            return false;
        });

        $('.user_isActive').change(function() {
            var val = $(this).val();
            var id = $(this).attr('data-val');
            var conf = confirm('Are you sure??');
            if (conf)
                $.post(siteURL + "/user/activate_user", {
                    id: id,
                    val: val
                })
                        .done(function(data) {
                            if (data === 'success') {
                                $(function() {
                                    setTimeout(function() {
                                        $.bootstrapGrowl("Your input is already updated");
                                    });
                                });
                            } else {
                                $(function() {
                                    setTimeout(function() {
                                        $.bootstrapGrowl("Your input is already exist");
                                    });
                                });
                            }
                        })
                        .fail(function(data) {
                            alert(JSON.stringify(data));
                        });
            // do some other stuff here
            return false;
        });

        $('.user_banned').change(function() {
            var val = $(this).val();
            var id = $(this).attr('data-val');
            var conf = confirm('Are you sure??');
            if (conf)
                if (val > 0) {
                    $('#banned_reason').modal('show');
                    $('<input>').attr({
                        type: 'hidden',
                        id: 'user_id',
                        name: 'user_id',
                        value: id
                    }).appendTo('form#banned_form');
                } else {
                    $.post(siteURL + "/user/unbanned_user", {
                        id: id,
                        val: val
                    })
                            .done(function(data) {
                                if (data === 'success') {
                                    $(function() {
                                        setTimeout(function() {
                                            $.bootstrapGrowl("Your input is already updated");
                                        });
                                    });
                                } else {
                                    $(function() {
                                        setTimeout(function() {
                                            $.bootstrapGrowl("Your input is already exist");
                                        });
                                    });
                                }
                            })
                            .fail(function(data) {
                                alert(JSON.stringify(data));
                            });
                }
            // do some other stuff here
            return false;
        });
    };
    return {
        //main function to initiate template pages
        init: function() {
            runDataTable();
        }
    };
}();