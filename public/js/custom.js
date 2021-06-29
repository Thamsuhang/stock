$(document).ready(function () {

    if ($('#isModal').length > 0) {
        modal = $('.bd-example-modal-lg');
        modal.modal('show');
    }
    $('.datepicker').datepicker({
        changeYear: true,
        dateFormat: 'yy-mm-dd',
        showButtonPanel: true,
        onClose: function (dateText, inst) {
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();

            $(this).datepicker('setDate', new Date(year, 5, 1));
        }
    });
    $('.data-table').DataTable();
    $('.select2').select2();
    $(function () {
        $('#stockIn-table').DataTable({
            "order": [],
            'footerCallback': function (row, data, start, end, display) {
                var api = this.api(), data;
                // Remove the formatting to get integer data for summation
                var intVal = function (i) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '') * 1 :
                        typeof i === 'number' ?
                            i : 0;
                };

                // Total over all pages
                total = api
                    .column(2)
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Total over this page
                pageTotal = api
                    .column(2, {page: 'current'})
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Update footer
                $(api.column(2).footer()).html(
                    pageTotal + ' ( ' + total + ' total)'
                );
            },
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    title: $('.table-header').text(),
                    text: '<i class="fa fa-download"></i> Excel',
                    titleAttr: 'Export Excel',
                    "oSelectorOpts": {filter: 'applied', order: 'current'},
                    exportOptions: {
                        modifier: {
                            page: 'all'
                        },
                        format: {
                            header: function ( data, columnIdx ) {
                                if(columnIdx===1){
                                    return 'column_1_header';
                                }
                                else{
                                    return data;
                                }
                            }
                        }
                    },
                    className: 'btn btn-success',
                    footer: true
                    },
                {
                    extend: 'pdf',
                    title: $('.table-header').text(),
                    text: '<i class="fa fa-download"></i> PDF',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    },
                    className: 'btn btn-success',
                    footer: true
                },
                {
                    extend: 'print',
                    title: $('.table-header').text(),
                    text: '<i class="fa fa-print"></i> Print',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    },
                    className: 'btn btn-success',
                    footer: true
                }
            ]
        });
        $('.s-out').on('click',function (){
            console.log($(this).data('is-init'))
            if($(this).data('is-init') === false) {
                console.log($(this).data('is-init'))
                $('#stockOut-table').DataTable({
                    "order": [],
                    'footerCallback': function (row, data, start, end, display) {
                        var api = this.api(), data;
                        // Remove the formatting to get integer data for summation
                        var intVal = function (i) {
                            return typeof i === 'string' ?
                                i.replace(/[\$,]/g, '') * 1 :
                                typeof i === 'number' ?
                                    i : 0;
                        };

                        // Total over all pages
                        total = api
                            .column(2)
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);

                        // Total over this page
                        pageTotal = api
                            .column(2, {page: 'current'})
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);

                        // Update footer
                        $(api.column(2).footer()).html(
                            pageTotal + ' ( ' + total + ' total)'
                        );
                    },
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'excelHtml5',
                            title: $('.table-header').text(),
                            text: '<i class="fa fa-download"></i> Excel',
                            titleAttr: 'Export Excel',
                            "oSelectorOpts": {filter: 'applied', order: 'current'},
                            exportOptions: {
                                modifier: {
                                    page: 'all'
                                },
                                format: {
                                    header: function (data, columnIdx) {
                                        if (columnIdx === 1) {
                                            return 'column_1_header';
                                        } else {
                                            return data;
                                        }
                                    }
                                }
                            },
                            className: 'btn btn-success',
                            footer: true
                        },
                        {
                            extend: 'pdf',
                            title: $('.table-header').text(),
                            text: '<i class="fa fa-download"></i> PDF',
                            exportOptions: {
                                columns: "thead th:not(.noExport)"
                            },
                            className: 'btn btn-success',
                            footer: true
                        },
                        {
                            extend: 'print',
                            title: $('.table-header').text(),
                            text: '<i class="fa fa-print"></i> Print',
                            exportOptions: {
                                columns: "thead th:not(.noExport)"
                            },
                            className: 'btn btn-success',
                            footer: true
                        }
                    ]
                });
                $(this).data('is-init',true);
            }
        });
    });
    $(function () {
        labelText=[];
        valueNumber=[];
        function getLabels(data)
        {
            $.each(data, function (i, value) {
                // var a = new Date(i);
                labelText.push(value);
                // valueNumber.push(value);
            });
            console.log(labelText);
            return labelText;
        }
        function getData(data) {
            $.each(data, function (i, value) {
                valueNumber.push(value);
            });
            console.log(valueNumber);
            return valueNumber;
        }
        var ctx = document.getElementById('myChart');
        if (typeof ctx !== "undefined" && !($.isEmptyObject(ctx))) {
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: getLabels(stocksStartInDay),
                    datasets: [{
                        label: 'No of stock quantities',
                        data: getData(quantityStart),
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
        })
        }
        var ctx1 = document.getElementById('myChart1');
        if (typeof ctx1 !== "undefined" && !($.isEmptyObject(ctx1))) {
            var myChart1 = new Chart(ctx1, {
                type: 'pie',
                data: {
                    labels: getLabels(stocksEndInDay),
                    datasets: [{
                        label: 'No of stock quantities',
                        data: getData(quantityEnd),
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            })
        }
    });

    $('.btnPrint').on('click', function(event) {
        event.preventDefault();
        html2canvas($('#capture'), {
            background :'#FFFFFF',
            onrendered: function(canvas) {
                var imgData = canvas.toDataURL('image/jpeg');
                console.log(imgData);
                var windowContent = '<!DOCTYPE html>';
                windowContent += '<html>'
                windowContent += '<head><title>Print canvas</title></head>';
                windowContent += '<body>'
                windowContent += '<img src="' + imgData + '">';
                windowContent += '</body>';
                windowContent += '</html>';
                var printWin = window.open('', '', 'width=1920,height=1000');
                printWin.document.open();
                printWin.document.write(windowContent);
                printWin.document.close();
                printWin.focus();
                printWin.print();

                return false;
            }
        });
        html2canvas.Util.isTransparent = function(backgroundColor) {
            return (backgroundColor === "transparent" || backgroundColor === "rgba(0, 0, 0, 0)" || backgroundColor === undefined);
        };
    });
    $('.create-report').on('click',function(){

       var model = $('.bd-example-modal-lg') ;
       var parent=$(this).parent();
       var quantity= $(parent).siblings('.product-quantity').text()
        var price=$(parent).siblings('.product-price').text()
        var total=price*quantity;
       var withVat= (13*total)/100;
       var netAmount= total+withVat;
       model.find('.page-header').text($(parent).siblings('.formatted-date').text())
       model.find('.p-product-name').text($(parent).siblings('.product-title').text())
       model.find('.p-batch-id').text($(parent).siblings('.batch-id').text())
       model.find('.p-product-price').text(price)
       model.find('.p-product-quantity').text(quantity)
        model.find('.p-total-amount').text(total);
        model.find('.p-gross-amount').text(total);
        model.find('.p-vat').text(withVat);
        model.find('.p-net-amount').text(netAmount);
    });
    $('.print-invoice').on('click', function(){
        $('#p-wrapper').window.print();
    });
});

