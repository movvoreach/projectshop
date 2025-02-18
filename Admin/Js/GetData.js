$(document).ready(function() {
    var btnedit = '<button type="button" class="btnedit"><i class="fa fa-edit"></i></button> ';
    var btndelete = '<button type="button" class="btndelete"><i class="fa fa-trash"></i></button> ';
    var totalpages = $('#tota-page');
    var Datatotal = $('#tatal-data');
    var e = $('#txt-select')
    var s = 0;
    var body = $('body');
    var popup = '<div class="popup"></div>';
    var cnt = $('.cnt');
    var menu = $('.menu');
    // var txt = $('.txt-title');
    var frm = Array('frm.slide.php', 'frm.category.php', 'Addusers.php', 'frm-change-passwords.php', 'subcategory.php', 'frm-product.php'); // Ensure the forms exist on the server
    var frmInd;
    var optmenu = 0;
    var tbldata = $('#tbl-data');
    var wait = 'Waiting <i class="fa fa-refresh fa-spin"></i>Loading'
    // var img = $('.img-box');
    var btnedit = '<button type="button" class="btnedit"><i class="fa fa-edit"></i></button> ';
    var btndelete = '<button type="button" class="btndelete"><i class="fa fa-trash"></i></button> ';
    var btnnext = $('#btn-next');
    var btnback = $('#btn-back');
    var curpage = $('#cur-page');
    var Search = $('#txt-serch-val');

    $('#txt-serch-val').on('input', function() {
        var searchValue = Search.val(); // Get the search value

        $.ajax({
            type: "POST",
            url: "Action/Search.php",
            data: {
                opt: frmInd,
                Search: searchValue
            },
            dataType: "json",
            success: function(response) {

                tbldata.empty(); // Clear previous results

                if (response.length > 0) {
                    // Append table headers
                    tbldata.append(
                        '<tr>' +
                        '<th width="50px">ID</th>' +
                        '<th>Slide Name</th>' +
                        '<th width="50px">OD</th>' +
                        '<th width="50px">Photo</th>' +
                        '<th width="50px">Status</th>' +
                        '<th width="75px">Action</th>' +
                        '</tr>'
                    );

                    // Append table rows dynamically
                    response.forEach(item => {
                        tbldata.append(
                            '<tr>' +
                            '<td>' + item.Id + '</td>' +
                            '<td>' + item.Name + '</td>' +
                            '<td>' + item.od + '</td>' +
                            '<td><img src="img/' + item.photo + '" alt="Photo" width="50"></td>' +

                            '<td>' + item.Status + '</td>' +
                            '<td>' +
                            btnedit +
                            btndelete +
                            '</td>' +
                            '</tr>'

                        );

                    });
                    // Editdata(eThis)

                } else {
                    tbldata.append('<tr><td colspan="6">No results found</td></tr>');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                tbldata.append('<tr><td colspan="6">An error occurred while fetching data</td></tr>');
            }
        });
    });
    // Toggle sub-menu visibility on click
    $('.menu ul li > a').click(function() {
        $(this).siblings('.sub-menu').slideToggle();
        $(this).parent().siblings().find('.sub-menu').slideUp();
    });

    // Toggle menu visibility on button click
    $('.btn-menu').click(function() {
        if (optmenu == 0) {
            menu.css({
                'left': '-21%'
            });
            cnt.css({
                'width': '100%',
                'left': '0'
            });
            optmenu = 1;
        } else {
            menu.css({
                'left': '0'
            });
            cnt.css({
                'width': '81%',
                'left': '19%'
            });
            optmenu = 0;
        }
    });
    // Filtter 
    $('#txt-select').change(function() {
        if (frmInd === 0) {
            GetSlideData();
        } else if (frmInd === 1) {
            GetCategorieData()
        } else if (frmInd === 2) {
            getusers();
        } else if (frmInd === 3) {
            changepassword();
        } else if (frmInd === 4) {
            getsubcategory()
        } else if (frmInd === 5) {
            getProduct()
        }
        totalpages.text(Math.ceil(Datatotal.text() / e.val()));
    });
    // Handle "Next" button click
    btnnext.click(function() {
        if (parseInt(curpage.text()) === parseInt(totalpages.text())) {
            return; // Prevent navigation beyond the last page
        }
        s += parseInt(e.val()); // Increment offset
        curpage.text(parseInt(curpage.text()) + 1); // Update current page
        if (frmInd === 0) {
            GetSlideData();
        } else if (frmInd === 1) {
            GetCategorieData()
        } else if (frmInd === 2) {
            getusers();
        } else if (frmInd === 3) {
            changepassword();
        } else if (frmInd === 4) {
            getsubcategory()
        } else if (frmInd === 5) {
            getProduct()
        }
    });

    // Handle "Back" button click
    btnback.click(function() {
        if (parseInt(curpage.text()) === 1) {
            return; // Prevent navigation before the first page
        }
        s -= parseInt(e.val()); // Decrement offset
        curpage.text(parseInt(curpage.text()) - 1); // Update current page
        if (frmInd === 0) {
            GetSlideData();
        } else if (frmInd === 1) {
            GetCategorieData()
        } else if (frmInd === 2) {
            getusers();
        } else if (frmInd === 3) {
            changepassword();
        } else if (frmInd === 4) {
            getsubcategory()
        } else if (frmInd === 5) {
            getProduct()
        }
    });
    // Set frmInd when a menu item is clicked
    $('.sub-menu').on('click', 'ul li', function() {
        var eThis = $(this);
        frmInd = eThis.data('opt');
        $('.bar-2').show()
        $('.bar-1').find('.title').text(eThis.text());
        $('.cnt').find('.txt-title').text(eThis.text());
        $('.sub-menu').find('ul li').css({
            "background-color": "#eee",
            "color": "#000"
        });
        eThis.css({
            "background-color": "red",
            "color": "#fff"
        });
        if (frmInd == 0) {
            GetSlideData()
        } else if (frmInd == 1) {
            GetCategorieData()
        } else if (frmInd == 2) {
            getusers()
        } else if (frmInd == 3) {
            changepassword()
        } else if (frmInd == 4) {
            getsubcategory()
        } else if (frmInd == 5) {
            getProduct()
        }else if (frmInd == 6) {
            OrderList();
        }
        Countdata();
    });

    function Countdata() {
        // Check if frmInd is set
        // alert(frmInd);
        $.ajax({
            type: "POST",
            url: "Get/count-silde-data.php",
            data: {
                opt: frmInd
            },
            // processData: false,
            cache: false,
            // contentType: false,
            dataType: "json",
            beform: function(response) {

            },
            success: function(response) {
                //    alert(response.total);
                Datatotal.text(response.total);
                totalpages.text(Math.ceil(response.total / e.val()));
            }

        });
    };
    // Open form when "Add New" button is clicked
    $('.btn-add').click(function() {
        // Check if frmInd is set
        body.append(popup);
        $('.popup').load('form/' + frm[frmInd], function(responseTxt, statusTxt, xhr) {
            if (statusTxt === "success") {
                getautoid();
            } else if (statusTxt === "error") {
                alert("Error: " + xhr.status + ": " + xhr.statusText);
            }
        });

    });
    // Edit button
    body.on('click', 'table tr td .btnedit', function() {
        var eThis = $(this); // Reference the clicked button
        body.append(popup); // Append the popup to the body
        $('.popup').load('form/' + frm[frmInd], function(responseTxt, statusTxt, xhr) {
            if (statusTxt === "success") {
                if (frmInd === 0) {
                    Editdata(eThis);
                } else if (frmInd === 1) {
                    editcategorie(eThis);
                } else if (frmInd === 2) {
                    editemployee(eThis);
                    $('#txt-pass').hide();
                    $('#txt-pass').hide();
                } else if (frmInd === 3) {
                    editchangepassword(eThis);
                    $('#txt-pass').hide();
                    $('#txt-pass').hide();
                } else if (frmInd === 4) {
                    edit_sub_category(eThis);
                } else if (frmInd === 5) {
                    edit_Product(eThis);
                }
                // Pass the button reference to Editdata
            } else if (statusTxt === "error") {
                alert("Error: " + xhr.status + ": " + xhr.statusText);
            }
        });
    });

    function editemployee(eThis) {
        var parent = eThis.parents('tr'); // Get the parent row of the button
        var id = parent.find('td:eq(0)').text();
        var photo = parent.find('td:eq(1) img').attr('alt');
        var name = parent.find('td:eq(2)').text();
        // var od = parent.find('td:eq(3)').text();
        var phonenumber = parent.find('td:eq(3)').text();
        var email = parent.find('td:eq(4)').text();
        var position = parent.find('td:eq(5)').text();
        // alert(name)
        //  var img = body.find('#txt-img').val();
        // alert(photo );

        // // Update the form fields with the extracted data
        body.find('.frm #txt-edit').val(id);
        body.find('.frm #txt-ID').val(id);
        body.find('.frm #txt-fullname').val(name);
        body.find('.frm #txt-ph').val(phonenumber);
        body.find('.frm #txt-email').val(email);
        body.find('.frm #txt-img').val(photo);
        body.find('.frm .img-box').css('background-image', 'url(img/' + photo + ')');
        body.find('.frm #txt-select').val(position);
    }
    //editchangepassword;
    function editchangepassword(eThis) {
        var parent = eThis.parents('tr'); // Get the parent row of the button
        var id = parent.find('td:eq(0)').text();
        var username = parent.find('td:eq(1)').text();
        var phone = parent.find('td:eq(2)').text();
        var email = parent.find('td:eq(3)').text();
        var Address = parent.find('td:eq(4)').text();
        // alert(Address)
        // Update the form fields with the extracted data
        body.find('.frm #txt-edit').val(id);
        body.find('.frm #txt-ID').val(id);
        body.find('.frm #txt-fullname').val(username);
        body.find('.frm #txt-ph').val(phone);
        body.find('.frm #txt-txt-email').val(email);
        body.find('.frm #txt-select').val(Address);

    }

    // Delete button
    // Handle delete button click
    $('body').on('click', 'table tr td .btndelete', function() {
        var eThis = $(this); // Reference the clicked delete button
        var parent = eThis.parents('tr'); // Get the parent row of the clicked button
        var id = parent.find('td:eq(0)').text(); // Get the ID from the first column of the row

        if (confirm('Are you sure you want to delete this item?')) {
            $.ajax({
                url: "Action/delete.php", // Backend endpoint for deletion
                type: "POST", // HTTP method
                data: {
                    id: id,
                    opt: frmInd // Ensure frmInd is defined before this
                },
                dataType: 'JSON', // Expect JSON response
                success: function(data) {
                    if (data.delete === true) { // Check if deletion was successful
                        alert('Item deleted successfully');
                        parent.remove(); // Remove the row from the table
                    } else {
                        alert('Error deleting item: ' + (data.error || 'Unknown error'));
                    }
                    Countdata(); // Update the total count if necessary
                },
                error: function(xhr, status, error) {
                    alert('AJAX error: ' + error); // Handle AJAX request errors
                }
            });
        }
    });



    // Close the popup when the close button is clicked
    body.on('click', '.frm .btn-close', function() {
        $('.popup').remove();
    });
    // save data 
    body.on('click', '.frm .btn-save', function(eThis) {
        var eThis = $(this);
        if (frmInd == 0) {
            saveSlider(eThis);
            $('.popup').remove();
        } else if (frmInd == 1) {
            saveCategories(eThis);
            $('.popup').remove();
        } else if (frmInd == 2) {
            saveEmployees(eThis)
            $('.popup').remove();
        } else if (frmInd == 3) {
            saveCustomer(eThis);
            $('.popup').remove();
        } else if (frmInd == 4) {
            save_sub_category(eThis)
            $('.popup').remove();
        } else if (frmInd == 5) {
            save_Product(eThis);
            $('.popup').remove();
        }
    });

    function save_sub_category(eThis) {
        //var  eThis = $(this);
        var parent = eThis.parents('.frm');
        var sub_id = parent.find('#txt-cate');
        var sub_name = parent.find('#txt-cate option:selected').text();
        var name = parent.find('#txt-Name');
        var id = parent.find('#txt-ID');
        var od = parent.find('#txt-od');
        var photo = parent.find('#txt-img');
        var status = parent.find('#txt-select');
        var frm = eThis.closest('form.upl');
        var form_data = new FormData(frm[0]);
        if (name == '') {
            alert('Please enter a name');
            name.focus();
            return;
        } else if (sub_id.val() == '0') {
            alert('Please select a category');
            sub_id.focus();
            return;
        };
        $.ajax({
            type: "POST",
            url: "Action/save_subcategory.php",
            data: form_data,
            processData: false,
            cache: false,
            contentType: false,
            dataType: "json",
            beform: function(response) {
                // eThis.html(wait);

            },
            success: function(response) {
                // alert(response.dpl);
                if (response.dpl == true) {
                    alert('Duplicate Name');
                }
                Countdata();
                getsubcategory();
                var tr = '<tr>' +
                    '<td>' + response.id + '</td>' +
                    '<td> <span>' + sub_id.val() + '</span>' + sub_name + '</td>' +
                    '<td>' + name.val() + '</td>' +
                    '<td>' + od.val() + '</td>' +
                    '<td><img src="img/' + photo.val() + '" ></td>' +
                    '<td>' + status.val() + '</td>' +
                    '<td>>' + btnedit + btndelete + '</td>' +
                    '</tr>';
                // alert(response.dpl);
                tbldata.append(tr);
                // $('.popup').remove();
                // GetSlideData();
            }
        });

    }

    function edit_sub_category(eThis) {
        var parent = eThis.parents('tr'); // Get the parent row of the button
        var id = parent.find('td:eq(0)').text();
        var cat = parent.find('td:eq(1) span').text()
        // alert(cat)
        var name = parent.find('td:eq(2)').text();
        var od = parent.find('td:eq(3)').text();
        var photo = parent.find('td:eq(4) img').attr('alt');
        var status = parent.find('td:eq(5)').text();
        // var img = body.find('#txt-img').val();
        // alert(photo );

        // Update the form fields with the extracted data
        body.find('.frm #txt-edit').val(id);
        body.find('.frm #txt-ID').val(id);
        body.find('.frm #txt-cate').val(cat);
        body.find('.frm #txt-Name').val(name);
        body.find('.frm #txt-od').val(od);
        body.find('.frm #txt-img').val(photo);
        body.find('.frm .img-box').css('background-image', 'url(img/' + photo + ')');

        body.find('.frm #txt-select').val(status);
    }

    function getsubcategory() {
        var tr = '<tr>' +
            '<th width="50px">ID</th>' +
            '<th width="75px">Category</th>' +
            '<th>Brand Name</th>' +
            '<th width="50px">OD</th>' +
            '<th width="50px">Photo</th>' +
            '<th width="50px">Status</th>' +
            '<th width="75px">Action</th>' +
            '</tr>';

        $.ajax({
            type: "POST",
            url: "Get/get_sub_categorydata.php",
            data: {
                opt: e.val(),
                s: s
            },
            cache: false,
            dataType: "json",
            beforeSend: function() {
                // You can add a loading spinner or any other pre-request logic here
            },
            success: function(response) {
                if (response.length > 0) {
                    var row = '';
                    for (i = 0; i < response.length; i++) {
                        row += '<tr>' +
                            '<td>' + response[i].id + '</td>' +
                            '<td>' + '<span>' + response[i].cate_id + '</span>' + response[i].cate_name + '</td>' +
                            '<td>' + response[i].name + '</td>' +
                            '<td>' + response[i].od + '</td>' +
                            '<td><img src="img/' + response[i].photo + '" alt="' + response[i].photo + '"></td>' +
                            '<td>' + response[i].status + '</td>' +
                            '<td>' + btnedit + btndelete + '</td>' +
                            '</tr>';
                    }
                    tbldata.html(tr + row);
                    // alert("Data loaded successfully!");
                } else {
                    alert("No data found!");
                }
            },
            error: function(xhr, status, error) {
                alert("An error occurred while loading data: " + error);
            }
        });
    }


    function save_Product(eThis) {
        var parent = eThis.parents('.frm');
        var sub_id = parent.find('#txt-cate');
        var sub_name = parent.find('#txt-cate option:selected').text();
        var name = parent.find('#txt-Name');
        var slide = parent.find('#txt-slide');
        var sub_cate = parent.find('#txt-sub');
        var price = parent.find('#txt-price');
        var discount = parent.find('#txt-dis');
        var description = parent.find('#txt-des');
        var price_after = parent.find('#txt-Price-dis');
        var id = parent.find('#txt-ID');
        var od = parent.find('#txt-od');
        var photo = parent.find('#txt-img');
        var status = parent.find('#txt-select');
        var frm = eThis.closest('form.upl');
        var form_data = new FormData(frm[0]);

        // Validation
        if (name.val() === '') {
            alert('Please enter a name');
            name.focus();
            return;
        } else if (sub_id.val() === '0') {
            alert('Please select a category');
            sub_id.focus();
            return;
        }

        // AJAX request
        $.ajax({
            type: "POST",
            url: "Action/save_product.php",
            data: form_data,
            processData: false,
            cache: false,
            contentType: false,
            dataType: "json",
            beforeSend: function() {
                // Show loading indicator if needed
            },
            success: function(response) {
                getProduct()
                Countdata();
                if (response.dpl === true) {
                    alert('Duplicate Name');
                } else {
                    // Update the table with the new data
                    var tr = '<tr>' +
                        '<td>' + response.id + '</td>' +
                        '<td><span>' + sub_id.val() + '</span>' + sub_name + '</td>' +
                        '<td>' + name.val() + '</td>' +
                        '<td>' + od.val() + '</td>' +
                        '<td><img src="img/' + photo.val() + '" alt="Product Image"></td>' +
                        '<td>' + status.val() + '</td>' +
                        '<td>' + btnedit + btndelete + '</td>' +
                        '</tr>';
                    $('#tbldata').append(tr); // Assuming `tbldata` is the ID of your table body
                }
                Countdata();
                getProduct()
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error: " + status + error);
            }
        });
    }

    function edit_Product(eThis) {
        // alert(1)
        var parent = eThis.parents('tr'); // Get the parent row
        var id = parent.find('td:eq(0)').text();
        var Photo = parent.find('td:eq(1) img').attr('alt');
        var productname = parent.find('td:eq(2)').text();
        var price = parent.find('td:eq(3)').text();
        var discount = parent.find('td:eq(4)').text();
        var Price_After_Discount = parent.find('td:eq(5)').text();
        var quantity = parent.find('td:eq(6)').text();
        var description = parent.find('td:eq(7)').text();
        var status = parent.find('td:eq(8)').text();

        var img = body.find('#txt-img').val();


        // // Update the form fields with the extracted data

        // body.find('.frm #txt-slide').val();
        body.find('.frm #txt-des').val(description);
        body.find('.frm #txt-dis').val(discount);
        body.find('.frm #txt-Price-dis').val(Price_After_Discount);
        body.find('.frm #txt-price').val(price);
        body.find('.frm #txt-Name').val(productname);
        body.find('.frm #txt-od').val(quantity);
        body.find('.frm #txt-img').val(Photo);
        body.find('.frm .img-box').css('background-image', 'url(img/' + Photo + ')');

        // body.find('.frm #txt-select').val(status);
    }

    function getProduct() {
        var tr = '<tr>' +
            '<th width="25px">ID</th>' +
            '<th width="50px">Photo</th>' +
            '<th width="100px">Product Name </th>' +
            '<th width="50px">Price</th>' +
            '<th width="50px">Discount</th>' +
            '<th width="100px">Price After Discount</th>' +
            '<th width="50px">Quantity</th>' +
            '<th width="100px">Description</th>' +
            '<th width="50px">Status</th>' +
            '<th width="75px">Action</th>' +
            '</tr>';

        $.ajax({
            type: "POST",
            url: "Get/get_Product.php",
            data: {
                opt: e.val(),
                s: s
            },
            cache: false,
            dataType: "json",
            beforeSend: function() {
                // You can add a loading spinner or any other pre-request logic here
            },
            success: function(response) {
                if (response.length > 0) {
                    var row = '';
                    for (i = 0; i < response.length; i++) {
                        '<td>' + response[i].price + '$' + '</td>' +
                            '<td>' + response[i].dis + '%' + '</td>'

                        row += '<tr>' +
                            '<td>' + response[i].Id + '</td>' +
                            '<td><img src="img/' + response[i].photo + '" alt="' + response[i].photo + '"></td>' +
                            // '<td>' + '<span>' + response[i].cate_id + '</span>' + response[i].cate_name + '</td>' +
                            '<td>' + response[i].Name + '</td>' +
                            '<td>' + response[i].price + '$' + '</td>' +
                            '<td>' + response[i].dis + '%' + '</td>' +
                            '<td>' + response[i].price_dis + '$' + '</td>' +
                            '<td>' + response[i].od + '</td>' +
                            '<td>' + response[i].des + '</td>' +
                            '<td>' + response[i].status + '</td>' +
                            '<td>' + btnedit + btndelete + '</td>' +
                            '</tr>';
                    }
                    tbldata.html(tr + row);
                    // alert("Data loaded successfully!");
                } else {
                    // alert("No data found!");
                }
            },
            error: function(xhr, status, error) {
                alert("An error occurred while loading data: " + error);
            }
        });
    }





    function saveSlider(eThis) {
        //var  eThis = $(this);
        var parent = eThis.parents('.frm');
        var name = parent.find('#txt-Name');
        var id = parent.find('#txt-Id');
        var od = parent.find('#txt-od');
        var photo = parent.find('#txt-img');
        var status = parent.find('#txt-select');
        var frm = eThis.closest('form.upl');
        var form_data = new FormData(frm[0]);
        if (name == '') {
            alert('Please enter a name');
            name.focus();
            return;
        }
        $.ajax({
            type: "POST",
            url: "Action/saveSlide.php",
            data: form_data,
            processData: false,
            cache: false,
            contentType: false,
            dataType: "json",
            beform: function(response) {
                // eThis.html(wait);

            },
            success: function(response) {
                // alert(response.dpl);
                if (response.dpl == true) {
                    alert('Duplicate Name');
                }
                Countdata();
                GetSlideData();
                var tr = '<tr>' +
                    '<td>' + response.id + '</td>' +
                    '<td>' + name.val() + '</td>' +
                    '<td>' + od.val() + '</td>' +
                    '<td><img src="img/' + photo.val() + '" ></td>' +
                    '<td>' + status.val() + '</td>' +
                    '<td>>' + btnedit + btndelete + '</td>' +
                    '</tr>';
                // alert(response.dpl);
                tbldata.append(tr);
                // $('.popup').remove();
                // GetSlideData();
            }
        });

    }
    // get sldie data
    function GetSlideData() {

        var tr = '<tr>' +
            '<th width="50px">ID</th>' +
            '<th>Slide Name</th>' +
            '<th width="50px">OD</th>' +
            '<th width="50px">Photo</th>' +
            '<th width="50px">Status</th>' +
            '<th width="75px">Action</th>'
        '</tr>';

        $.ajax({
            type: "POST",
            url: "Get/Get_Slide_data.php",
            data: {
                opt: e.val(),
                s: s
            },
            // processData: false,
            cache: false,
            // contentType: false,
            dataType: "json",
            beform: function(response) {

            },
            success: function(response) {
                // alert(response.name);
                var row = '';
                for (i = 0; i < response.length; i++) {
                    row += '<tr>' +
                        '<td>' + response[i].id + '</td>' +
                        '<td>' + response[i].name + '</td>' +
                        '<td>' + response[i].od + '</td>' +
                        '<td><img src="img/' + response[i].photo + '" alt="' + response[i].photo + '"></td>' +
                        '<td>' + response[i].status + '</td>' +
                        '<td>' + btnedit + btndelete + '</td>' +
                        // '<td>'++'</td>'+
                        '</tr>';
                    // tbldata.append(row);
                }
                tbldata.html(tr + row);
                // s = s + parseInt(e.val());
            }
        });
    }

    function Editdata(eThis) {
        var parent = eThis.parents('tr'); // Get the parent row of the button
        var id = parent.find('td:eq(0)').text();
        var name = parent.find('td:eq(1)').text();
        var od = parent.find('td:eq(2)').text();
        var photo = parent.find('td:eq(3) img').attr('alt');
        var status = parent.find('td:eq(4)').text();
        // var img = body.find('#txt-img').val();
        // alert(photo );

        // Update the form fields with the extracted data
        body.find('.frm #txt-edit').val(id);
        body.find('.frm #txt-ID').val(id);
        body.find('.frm #txt-Name').val(name);
        body.find('.frm #txt-od').val(od);
        body.find('.frm #txt-img').val(photo);
        body.find('.frm .img-box').css('background-image', 'url(img/' + photo + ')');

        body.find('.frm #txt-select').val(status);
    }

    // save Employess data
    function saveEmployees(eThis) {
        var frm = eThis.closest('form.upl');
        var form_data = new FormData(frm[0]);

        if (!form_data.get("txt-fullname")) {
            alert("Please enter a full name.");
            return;
        }

        $.ajax({
            type: "POST",
            url: "http://localhost/Project_shop/Admin/Action/saveem.php",
            data: form_data,
            processData: false,
            contentType: false,
            success: function(response) {
                getusers();
                Countdata();
                row += '<tr>' +
                    '<td><img src="img/' + response[i].photo + '" alt="' + response[i].photo + '"></td>' +
                    '<td>' + response[i].usersname + '</td>' +
                    '<td>' + response[i].phone + '</td>' +
                    '<td>' + response[i].email + '</td>' +
                    '<td>' + response[i].status + '</td>' +
                    '<td>' + response[i].create_date + '</td>' + // Adjust to match PHP response
                    '<td>' + btnedit + btndelete + '</td>' +
                    '</tr>';
                // alert(response);
                tbldata.append(row);
                // Reset the form input fields
                // name.val('');
                // od.val('');
                // photo.val('');
                // status.val('');
                // $('.popup').remove();
                // GetSlideData();
                // location.reload();
                // $('.popup').remove();
                // GetSlideData();
                location.reload();
            }
        });
    }



    function saveCategories(eThis) {
        //var  eThis = $(this);
        var parent = eThis.parents('.frm');
        var name = parent.find('#txt-Name');
        var id = parent.find('#txt-Id');
        var od = parent.find('#txt-od');
        var photo = parent.find('#txt-img');
        var status = parent.find('#txt-select');
        var frm = eThis.closest('form.upl');
        var form_data = new FormData(frm[0]);
        if (name == '') {
            alert('Please enter a name');
            name.focus();
            return;
        }
        $.ajax({
            type: "POST",
            url: "Action/savecategory.php",
            data: form_data,
            processData: false,
            cache: false,
            contentType: false,
            dataType: "json",
            beform: function(response) {
                // eThis.html(wait);

            },
            success: function(response) {
                // alert(response.dpl);
                if (response.dpl == true) {
                    alert('Duplicate Name');
                }

                GetCategorieData();
                Countdata();

                var tr = '<tr>' +
                    '<td>' + response.id + '</td>' +
                    '<td>' + name.val() + '</td>' +
                    '<td>' + od.val() + '</td>' +
                    '<td><img src="img/' + photo.val() + '" ></td>' +
                    '<td>' + status.val() + '</td>' +
                    '<td>' + btnedit + btndelete + '</td>' +
                    '</tr>';
                tbldata.append(tr);
            }
        });
    }

    function GetCategorieData() {
        var tr = '<tr>' +
            '<th width="50px">ID</th>' +
            '<th>Category Name</th>' +
            '<th width="50px">OD</th>' +
            '<th width="50px">Photo</th>' +
            '<th width="50px">Status</th>' +
            '<th width="75px">Action</th>'
        '</tr>';

        $.ajax({
            type: "POST",
            url: "Get/get_categorydata.php",
            data: {
                opt: e.val(),
                s: s
            },

            cache: false,
            dataType: "json",
            beform: function(response) {

            },
            success: function(response) {
                // alert(response.name);
                var row = '';
                for (i = 0; i < response.length; i++) {
                    row += '<tr>' +
                        '<td>' + response[i].id + '</td>' +
                        '<td>' + response[i].name + '</td>' +
                        '<td>' + response[i].od + '</td>' +
                        '<td><img src="img/' + response[i].photo + '" alt="' + response[i].photo + '"></td>' +
                        '<td>' + response[i].status + '</td>' +
                        '<td>' + btnedit + btndelete + '</td>' +
                        // '<td>'++'</td>'+
                        '</tr>';
                    // tbldata.append(row);
                }
                tbldata.html(tr + row);
                // s = s + parseInt(e.val());
            }
        });
    }

    function editcategorie(eThis) {
        var parent = eThis.parents('tr'); // Get the parent row of the button
        var id = parent.find('td:eq(0)').text();
        var name = parent.find('td:eq(1)').text();
        var od = parent.find('td:eq(2)').text();
        var photo = parent.find('td:eq(3) img').attr('alt');
        var status = parent.find('td:eq(4)').text();
        // var img = body.find('#txt-img').val();
        // alert(photo );

        // Update the form fields with the extracted data
        body.find('.frm #txt-edit').val(id);
        body.find('.frm #txt-ID').val(id);
        body.find('.frm #txt-Name').val(name);
        body.find('.frm #txt-od').val(od);
        body.find('.frm #txt-img').val(photo);
        body.find('.frm .img-box').css('background-image', 'url(img/' + photo + ')');

        body.find('.frm #txt-select').val(status);
    }


    // get Auto Id 
    function getautoid() {

        $.ajax({
            type: "POST",
            url: "Action/Get_Auto_id.php",
            data: {
                opt: frmInd
            },
            //processData: false,
            cache: false,
            //contentType:false,

            dataType: "json",
            beform: function(response) {

            },
            success: function(response) {
                var id = $('#txt-ID').val(response.id);
            }
        });
    }
    // get category data


    function getusers() {
        var tr = '<tr>' +
            '<th >NO</th>' +
            '<th width="50px" >Photo</th>' +
            '<th>usersname</th>' +
            '<th>Phone Number</th>' +
            '<th>Email</th>' +
            '<th>Position</th>' +
            '<th>Create_Date</th>' +
            '<th>Action</th>'
        '</tr>';
        $.ajax({
            type: "POST",
            url: "Get/get-users-data.php",
            data: {
                opt: e.val(),
                s: s
            },
            // processData: false,
            cache: false,
            // contentType: false,
            dataType: "json",
            beform: function(response) {

            },
            success: function(response) {
                // alert(response.name);
                var row = '';
                for (i = 0; i < response.length; i++) {
                    row += '<tr>' +
                        '<td>' + response[i].Id + '</td>' +
                        '<td><img src="img/' + response[i].photo + '" alt="' + response[i].photo + '"></td>' +
                        '<td>' + response[i].usersname + '</td>' +
                        '<td>' + response[i].phone + '</td>' +
                        '<td>' + response[i].email + '</td>' +
                        '<td>' + response[i].status + '</td>' +
                        '<td>' + response[i].create_date + '</td>' + // Adjust to match PHP response
                        '<td>' + btnedit + btndelete + '</td>' +
                        '</tr>';
                    // tbldata.append(row);
                }
                tbldata.html(tr + row);
            }
        });

        tbldata.html(tr);
    }

    function saveCustomer(eThis) {
        var frm = eThis.closest('form.upl');
        var form_data = new FormData(frm[0]);
        $.ajax({
            type: "POST",
            url: "Action/savechange.php",
            data: form_data,
            processData: false,
            cache: false,
            contentType: false,
            // dataType: "json",
            beform: function(response) {
                // eThis.html(wait);

            },
            success: function(response) {
                Countdata();
                changepassword();
                row += '<tr>' +
                    '<td>' + response[i].id + '</td>' +
                    '<td>' + response[i].usersname + '</td>' +
                    '<td>' + response[i].phone + '</td>' +
                    '<td>' + response[i].email + '</td>' +
                    '<td>' + response[i].Address + '</td>' +
                    '<td>' + response[i].Create_at + '</td>' +
                    '<td>' + btnedit + btndelete + '</td>' +
                    // '<td>'++'</td>'+
                    '</tr>';
                // // alert(response.dpl);
                tbldata.append(row);
                //  $('.popup').remove();
                // // GetSlideData();
            }
        });
    }
    // change  password
    function changepassword() {

        var tr = '<tr>' +
            '<th>ID</th>' +
            '<th>username</th>' +
            '<th>Phone</th>' +
            '<th>Email</th>' +
            '<th>Address</th>' +
            '<th>Create-Date</th>' +
            // '<th>Update-Date</th>' +
            '<th>Action</th>' +
            '</tr>';
        $.ajax({
            type: "POST",
            url: "Get/users-changepasswords.php",
            data: {
                opt: e.val(),
                s: s
            },
            // processData: false,

            // contentType: false,
            // processData: false,
            cache: false,
            // contentType: false,
            dataType: "json",
            beform: function(response) {

            },
            success: function(response) {
                // alert(response.name);
                var row = '';
                for (i = 0; i < response.length; i++) {
                    row += '<tr>' +
                        '<td>' + response[i].id + '</td>' +
                        '<td>' + response[i].usersname + '</td>' +
                        '<td>' + response[i].phone + '</td>' +
                        '<td>' + response[i].email + '</td>' +
                        '<td>' + response[i].Address + '</td>' +
                        '<td>' + response[i].Create_at + '</td>' +
                        '<td>' + btnedit + btndelete + '</td>' +
                        // '<td>'++'</td>'+
                        '</tr>';
                    // tbldata.append(row);
                }
                tbldata.html(tr + row);
            }
        });
    }

    $('body').on('change', '.frm #txt-photo', function() {
        var eThis = $(this);
        var parent = eThis.parents('.frm');
        var frm = eThis.closest('form.upl');
        var form_data = new FormData(frm[0]);
        var img = parent.find('.img-box');
        var photo = parent.find('#txt-img');

        $.ajax({
            url: 'Action/upl-img.php',
            type: 'POST',
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
            beforeSend: function(response) {

            },
            success: function(response) {
                photo.val(response.imgName);
                img.css('background-image', "url(img/" + response.imgPath + ")");

            },
        });

    })
    $('#logoutBtn').click(function() {
        $.ajax({
            type: "POST",
            url: "Action/logout.php", // This will handle the logout on the server
            success: function(response) {
                alert(response); // You can show a success message
                window.location.href = "http://localhost/Project_shop/register.php"; // Redirect to login page after logout
            },
            error: function() {
                alert("Error during logout.");
            }
        });
    });

    // function OrderList(){
    //     <h2 class="text-center">Create Order</h2>
    //     <form id="orderForm">
    //         <div class="mb-3">
    //             <label class="form-label">Customer Name</label>
    //             <input type="text" id="customerName" class="form-control" required>
    //         </div>
    //         <div class="mb-3">
    //             <label class="form-label">Product Name</label>
    //             <input type="text" id="productName" class="form-control" required>
    //         </div>
    //         <div class="mb-3">
    //             <label class="form-label">Quantity</label>
    //             <input type="number" id="quantity" class="form-control" min="1" required>
    //         </div>
    //         <div class="mb-3">
    //             <label class="form-label">Price</label>
    //             <input type="number" id="price" class="form-control" min="1" required>
    //         </div>
    //         <button type="submit" class="btn btn-primary">Create Order</button>
    //     </form>



    //     var tr = '<tr>' +
    //         '<th>Order ID</th>' +
    //         '<th>Customer Name</th>' +
    //         '<th>Product Name</th>' +
    //         '<th>Quantity</th>' +
    //         '<th>Price</th>' +
    //         '<th>Total Price</th>' +
    //         '<th>Order Date</th>' +
    //         '</tr>';
    //     tbldata.html(tr);
    // };
   // OrderList();
    // get order data
    //function getorder() {
        
        
});