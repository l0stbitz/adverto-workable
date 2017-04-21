/**
 * Javascript Functionality for the JMP.
 */
$(document).ready(function(){

    // <editor-fold desc="JMP Dashboard">
    if($('#dashboard-table').length) {
        $('#dashboard-table').DataTable({
            autoWidth: false,
            pageLength: 20,
            order: [[ 0, "desc" ]],
            ajax: {
                "url": "./jmp/ajax/getLatestJobs.php",
                "type": "GET",
                "dataSrc": ""
            },
            "deferRender": true,
            columns: [
                {"data": "Start Date"},
                {
                    "data": "End Date",
                    // "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                    //     if(sData != null) {
                    //         var today_date = new Date();
                    //         var job_date = new Date(sData);
                    //         if (today_date.getTime() > job_date.getTime()) {
                    //             $(nTd).addClass("red");
                    //         }
                    //     }
                    // }
                },
                {"data": "Job Id"},
                {"data": "Job Title"},
                {"data": "Location"},
                {"data": "Status"},
                {"data": "Actions", "orderable": false}
            ],
            dom: 'ftip',
            initComplete: function () {
                //Add tooltip to the action buttons
                $('[data-toggle="tooltip"]').tooltip()
            }
        });
        var myTable = $('#dashboard-table').DataTable();
        yadcf.init(myTable, [
            {column_number : 0,  filter_type: "date", date_format: 'yy-mm-d', filter_default_label: ''},
            {column_number : 1,  filter_type: "date", date_format: 'yy-mm-d', filter_default_label: ''},
            {column_number : 2, filter_type: 'text', filter_default_label: ''},
            {column_number : 3},
            {column_number : 4, filter_type: 'text', filter_default_label: ''},
            {column_number : 5}
        ]);
    }
    // </editor-fold>

    // <editor-fold desc="JMP Listing">
    if($('#listing-table').length) {
        $('#listing-table').DataTable({
            autoWidth: false,
            pageLength: 20,
            order: [[ 0, "desc" ]],
            ajax: {
                "url": "./jmp/ajax/getJobs.php",
                "type": "GET",
                "data": {
                    type: $('#type').val()
                },
                "dataSrc": ""
            },
            "deferRender": true,
            columns: [
                {"data": "Start Date"},
                {"data": "End Date"},
                {"data": "Job Id"},
                {"data": "Job Title"},
                {"data": "Location"},
                {
                    "data": "Feeds",
                    "orderable": false,
                    render: function ( data, type, row ) {
                        var jobFeedsHtml = "";
                        if(data != "") { jobFeedsHtml = renderFeedsInTable(data);}
                        return jobFeedsHtml;
                    }
                },
                {"data": "Views"},
                {"data": "Applies"},
                {"data": "Actions", "orderable": false}
            ],
            dom: 'ftip',
            initComplete: function () {
                //Add tooltip to the action buttons
                $('[data-toggle="tooltip"]').tooltip()
            }
        });
        var myTable = $('#listing-table').DataTable();
        yadcf.init(myTable, [
            {column_number : 0,  filter_type: "date", date_format: 'yy-mm-d', filter_default_label: ''},
            {column_number : 1,  filter_type: "date", date_format: 'yy-mm-d', filter_default_label: ''},
            {column_number : 2, filter_type: 'text', filter_default_label: ''},
            {column_number : 3},
            {column_number : 4, filter_type: 'text', filter_default_label: ''}
        ]);
    }
    // </editor-fold>

    // <editor-fold desc="JMP Listing All Jobs">
    if($('#listing-table-all').length) {
        $('#listing-table-all').DataTable({
            autoWidth: false,
            pageLength: 20,
            order: [[ 1, "desc" ]],
            ajax: {
                "url": "./jmp/ajax/getJobs.php",
                "type": "GET",
                "data": {
                    type: $('#type').val()
                },
                "dataSrc": ""
            },
            "deferRender": true,
            columns: [
                {"data": "Recruiter"},
                {"data": "Start Date"},
                {"data": "End Date"},
                {"data": "Job Id"},
                {"data": "Job Title"},
                {"data": "Location"},
                {
                    "data": "Feeds",
                    "orderable": false,
                    render: function ( data, type, row ) {
                        var jobFeedsHtml = "";
                        if(data != "") { jobFeedsHtml = renderFeedsInTable(data);}
                        return jobFeedsHtml;
                    }
                },
                {"data": "Views"},
                {"data": "Applies"},
                {"data": "Actions", "orderable": false}
            ],
            dom: 'ftip',
            initComplete: function () {
                //Add tooltip to the action buttons
                $('[data-toggle="tooltip"]').tooltip()
            }
        });
        var myTable = $('#listing-table-all').DataTable();
        yadcf.init(myTable, [
            {column_number : 0},
            {column_number : 1,  filter_type: "date", date_format: 'yy-mm-d', filter_default_label: ''},
            {column_number : 2,  filter_type: "date", date_format: 'yy-mm-d', filter_default_label: ''},
            {column_number : 3, filter_type: 'text', filter_default_label: ''},
            {column_number : 4},
            {column_number : 5, filter_type: 'text', filter_default_label: ''}
        ]);
    }
    // </editor-fold>

    // <editor-fold desc="Post a Job">
    if($('#postJobForm').length) {
        /**
         * Add Multiselect to multiselect dropdowns
         */
        $('.multiselect').multiselect({
            buttonWidth: '100%',
            disableIfEmpty: true,
            enableFiltering: true,
            includeSelectAllOption: true,
            buttonText: function(options, select) {
                if (options.length === 0) {
                    return 'Select a career area';
                }
                else if (options.length > 3) {
                    return 'More than 3 options selected!';
                }
                else {
                    var labels = [];
                    options.each(function() {
                        if ($(this).attr('label') !== undefined) {
                            labels.push($(this).attr('label'));
                        }
                        else {
                            labels.push($(this).html());
                        }
                    });
                    return labels.join(', ') + '';
                }
            }
        });

        /**
         * Add Text Editor to Job Description
         */
        $('#inputJobDescription').summernote({
            height: 300,
            minHeight: null,
            maxHeight: null,
            placeholder: 'Enter the job description',
            dialogsInBody: true,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear', 'height']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['fontname', ['fontname']],
                ['lineheight', ['lineheight']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', 500],
                ['insert', ['link', 'picture']],
            ],
            fontNames: ['Droid Sans','Open Sans','Trebuchet MS'],
            fontNamesIgnoreCheck: ['Droid Sans','Open Sans','Trebuchet MS'],
            fontSizes: ['8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '24', '36'],
            callbacks: {
                onPaste: function (e) {
                    if(detectIE() === false) {
                        var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                        e.preventDefault();
                        setTimeout(function () {
                            document.execCommand('insertText', false, bufferText);
                        }, 10);
                    }
                }
            }
        });

        /**
         * Add Date Picker to Start Date & End Date
         */
        $("#inputJobStartDate").datepicker({
            dateFormat: "yy-mm-dd",
            minDate: new Date(),
            onSelect: function (date, object) {
                var inputJobStartDate = $('#inputJobStartDate').datepicker('getDate');
                var inputJobEndDate = $('#inputJobEndDate').datepicker('getDate');
                if (inputJobStartDate > inputJobEndDate && inputJobEndDate != null) {
                    $('#inputJobEndDate').datepicker('setDate', inputJobStartDate);
                }
                $('#inputJobEndDate').datepicker('option', 'minDate', inputJobStartDate);
                $("#inputJobStartDate").trigger('input');
            }
        });
        if($('#inputJobStartDate').val() == "") {
            $('#inputJobStartDate').datepicker('setDate', new Date());
        }
        $("#inputJobEndDate").datepicker({
            dateFormat: "yy-mm-dd",
            minDate: new Date(),
            onSelect: function (date, object) {
                $("#inputJobEndDate").trigger('input');
            }
        });

        /**
         * Add Change event for the Location, so when we choose a Location, we will get the location Info
         */
        $(document).on("change", "#job_location_id", function (e) {
            e.preventDefault();
            if (this.value != "") {
                $("#inputJobStreet,#inputJobCity,#inputJobState,#inputJobZipCode,#inputJobCountry").val("").attr("disabled","disabled");
                $("#inputJobState").data("value","");
                var location_id = this.value;
                $.ajax({
                    method: "GET",
                    url: "./jmp/ajax/getLocationInfo.php",
                    data: { location_id: location_id },
                    dataType: "json",
                    cache: false
                })
                    .done(function( result ) {
                        if (result.status) {
                            var location_info = result.location_info;
                            var locationText = "";
                            if(location_info.location_street_address.length >0){locationText += location_info.location_street_address + "<br>";}
                            locationText += location_info.location_city + ", " + location_info.location_state + " " + location_info.location_zip_code + "<br>";
                            locationText += location_info.location_country;
                            $("#location_text").html(locationText);
                            $postJobForm.bootstrapValidator('validate');
                        }
                    })
                    .error(function(msg){
                        alert("Error Occurred! Please try again...");
                    });
            }else{
                $("#inputJobStreet,#inputJobCity,#inputJobState,#inputJobZipCode,#inputJobCountry").val("").removeAttr("disabled");
                $("#inputJobState").data("value","");
                $("#location_text").html("");
                $postJobForm.bootstrapValidator('validate');
            }
        });

        /**
         * Add Change event for the Country, so when we choose a Country, we will get the list of states for the selected country
         */
        $(document).on("change", "#inputJobCountry", function (e) {
            e.preventDefault();
            if (this.value != "") {
                var country = this.value;
                $.ajax({
                    dataType: "json",
                    url: "./jmp/ajax/getStates.php",
                    data: {
                        country: country
                    },
                    cache: false,
                    success: function (result) {
                        if (result.status) {
                            var $states_ddl = $("#inputJobState");
                            $states_ddl.find("option:gt(0)").remove();
                            if (country == "CA") {
                                $states_ddl.find("option").eq(0).text("Select a province");
                                $states_ddl.trigger("change");
                                $states_ddl.attr("title", "Province is Required!");
                            } else {
                                $states_ddl.find("option").eq(0).text("Select a state");
                                $states_ddl.trigger("change");
                                $states_ddl.attr("title", "State is Required!");
                            }
                            $.each(result.states, function (index, value) {
                                $states_ddl.append($("<option />").val(index).text(value));
                            });
                            if($states_ddl.data("value") != ""){
                                $states_ddl.val($states_ddl.data("value"));
                            }
                        }
                    },
                    error: function () {
                        alert("Error Occurred! Please try again...");
                    },
                    complete: function () {
                    }
                });
            }
        });

        /**
         * Add Change event for the Job Description, so when we choose a Description, we will get the job Requirements for this description
         */
        $(document).on("change", "#job_template_list", function (e) {
            e.preventDefault();
            if (this.value == "") {
                $('#inputJobDescription').summernote('reset');
            } else {
                $.ajax({
                    dataType: "json",
                    url: "./jmp/ajax/getJobDesc.php",
                    data: {
                        job_template_id: this.value
                    },
                    cache: false,
                    success: function (result) {
                        if (result.status) {
                            $('#inputJobDescription').summernote('reset');
                            $('#inputJobDescription').summernote('code', result.jobTemplate.job_template_info);
                        }
                    },
                    error: function () {
                        alert("Error Occurred! Please try again...");
                    },
                    complete: function () {
                    }
                });
            }
        });

        var $postJobForm = $('#postJobForm');
        //Add Validations to the Requisition Form
        $postJobForm.bootstrapValidator({
            framework: 'bootstrap',
            excluded: ':disabled',
            /*
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },*/
            fields: {
                inputJobBusinessUnit: {
                    validators: {
                        notEmpty: {
                            message: 'Business Unit is required and cannot be empty'
                        }
                    }
                },
                inputJobTitle: {
                    validators: {
                        notEmpty: {
                            message: 'Job Title is required and cannot be empty'
                        },
                        stringLength: {
                            min: 4,
                            max: 100,
                            message: 'Job Title must be more than 4 and less than 100 characters long'
                        }
                    }
                },
                inputJobType: {
                    validators: {
                        notEmpty: {
                            message: 'Job Type is required and cannot be empty'
                        }
                    }
                },
                inputJobStatus: {
                    validators: {
                        notEmpty: {
                            message: 'Job Status is required and cannot be empty'
                        }
                    }
                },
                inputJobCategory: {
                    validators: {
                        notEmpty: {
                            message: 'Job Category is required and cannot be empty'
                        }
                    }
                },
                inputJobCountry: {
                    validators: {
                        notEmpty: {
                            message: 'Country is required and cannot be empty'
                        }
                    }
                },
                inputJobState: {
                    validators: {
                        notEmpty: {
                            message: 'State/Province is required and cannot be empty'
                        }
                    }
                },
                inputJobZipCode:{
                    validators: {
                        //notEmpty: {
                        //    message: 'Zip Code is required and cannot be empty'
                        //},
                        stringLength: {
                            min: 2,
                            max: 20,
                            message: 'Zip Code must be more than 2 and less than 20 characters long'
                        }
                    }
                },
                inputJobCity: {
                    validators: {
                        notEmpty: {
                            message: 'City is required and cannot be empty'
                        },
                        stringLength: {
                            min: 2,
                            max: 50,
                            message: 'City must be more than 2 and less than 50 characters long'
                        }
                    }
                },
                //inputJobSalaryFrom: {
                //    validators: {
                //        integer:{
                //            message: 'Salary From needs to be a number'
                //        },
                //        callback: {
                //            message: 'Salary From is Required!',
                //            callback: function(value, validator, $field) {
                //                return value != "" || (value == "" && $("#inputJobSalaryType").val() == "" && $("#inputJobSalaryTo").val().length == 0);
                //            }
                //        }
                //    }
                //},
                //inputJobSalaryTo: {
                //    validators: {
                //        integer:{
                //            message: 'Salary To needs to be a number'
                //        },
                //        callback: {
                //            message: 'Salary To is Required!',
                //            callback: function(value, validator, $field) {
                //                return value != "" || (value == "" && $("#inputJobSalaryType").val() == "" && $("#inputJobSalaryFrom").val().length == 0);
                //            }
                //        }
                //    }
                //},
                //inputJobSalaryType: {
                //    validators: {
                //        callback: {
                //            message: 'Salary Type is Required!',
                //            callback: function(value, validator, $field) {
                //                return value != "" || (value == "" && $("#inputJobSalaryFrom").val().length == "" && $("#inputJobSalaryFrom").val().length == 0);
                //            }
                //        }
                //    }
                //},
                "recruiterEmails[]": {
                    validators: {
                        //notEmpty: {
                        //    message: 'The Recruiter email address is required and cannot be empty'
                        //},
                        email:{
                            message: 'The Recruiter email address is not valid'
                        }
                    }
                },
                inputJobStartDate: {
                    validators:{
                        notEmpty:{
                            message: "Start Date is required and cannot be empty"
                        }
                    }
                },
                inputJobEndDate: {
                    validators:{
                        notEmpty:{
                            message: "End Date is required and cannot be empty"
                        }
                    }
                },
                inputJobTerms: {
                    validators:{
                        notEmpty:{
                            message: "Please agree to the Terms & Conditions"
                        }
                    }
                }
            },
            submitHandler: function(validator, form, submitButton) {
                // ... do your task ...
                form.submit();
            }
        })
        // Add button click handler
            .on('click', '.addButton', function() {
                var $template = $('#recruiterEmailTemplate'),
                    $clone = $template
                        .clone()
                        .removeClass('hide')
                        .removeAttr('id')
                        .insertBefore($template);
                $option = $clone.find('input');
                $option.removeAttr('disabled');
                // Add new field
                $postJobForm.bootstrapValidator('addField', $option);
            })
        // Remove button click handler
            .on('click', '.removeButton', function() {
                var $row    = $(this).parents('.form-group'),
                    $option = $row.find('input');

                // Remove element containing the option
                $row.remove();

                // Remove field
                $postJobForm.bootstrapValidator('removeField', $option);
            })
        /*
        $('#inputJobSalaryFrom')
            .on('keyup', function (e) {
                // Revalidate the Salary To & Salary Type when user change it
                $postJobForm.bootstrapValidator('revalidateField', 'inputJobSalaryTo');
                $postJobForm.bootstrapValidator('revalidateField', 'inputJobSalaryType');
            });

        $('#inputJobSalaryTo')
            .on('keyup', function (e) {
                // Revalidate the Salary From & Salary Type when user change it
                $postJobForm.bootstrapValidator('revalidateField', 'inputJobSalaryFrom');
                $postJobForm.bootstrapValidator('revalidateField', 'inputJobSalaryType');
            });

        $('#inputJobSalaryType')
            .on('change', function (e) {
                // Revalidate the Salary From & Salary To when user change it
                $postJobForm.bootstrapValidator('revalidateField', 'inputJobSalaryFrom');
                $postJobForm.bootstrapValidator('revalidateField', 'inputJobSalaryTo');
            });
        */
    }
    // </editor-fold>

    // <editor-fold desc="Close Job Event">
    $(document).on("click", ".closeBtn", function (e) {
        var buttonElement = this;
        var dataTable = $(this).parents("table.listing-dataTable").DataTable();
        var row = $(this).parent().parent()[0];
        var closeJobDialog = $('<div id="cancelDialog"><P>Are you sure you want to close this job?</P></div>');
        closeJobDialog.dialog({
            title: "Confirm Job Closing",
            modal: true,
            resizable: false,
            buttons: [{
                text: "Yes",
                click: function () {
                    $(this).dialog("close");
                    closeJob(buttonElement, function () {
                        //Get Row Data
                        var rowData = dataTable.row(row).data();
                        if(rowData["Status"] == undefined){
                            var JobId = rowData['Job Id'];
                            //We Are on The My Open Jobs Table so we remove the job from the Table
                            var $alertHtml = $("<div />", { role: "alert", class: "alert alert-success alert-dismissible fade in clear" , html: '<button type=button class=close data-dismiss=alert aria-label=Close><span aria-hidden=true>&times;</span></button>The Job with Id <strong>'+JobId+'</strong> has been removed from the below table. '});
                            $('#alert-holder').html("").append($alertHtml);
                            dataTable.row(row).remove().draw(false);
                        }else {
                            //Change Status & Actions
                            rowData["Status"] = "Closed";
                            var $actions = $("<div />", {html: rowData["Actions"]});
                            $actions.find(".duplicateBtn").siblings().remove();
                            rowData["Actions"] = $actions.html();
                            dataTable.row(row).data(rowData).draw(false);
                        }
                    });
                }
            },
                {
                    text: "Cancel",
                    click: function () {
                        $(this).dialog("close");
                    }
                }]
        });
        e.preventDefault();
    });
    // </editor-fold>

    // <editor-fold desc="JMP Admin General">
    if($('#jmp-general').length) {
        var $defaultLeadEmailForm = $('#defaultLeadEmailForm');
        //Add Validations to the Form
        $defaultLeadEmailForm.bootstrapValidator({
            framework: 'bootstrap',
            excluded: ':disabled',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                default_lead_email: {
                    validators: {
                        //notEmpty: {
                        //    message: 'The Recruiter email address is required and cannot be empty'
                        //},
                        email:{
                            message: 'The Default Lead email address is not valid'
                        }
                    }
                }
            },
            submitHandler: function(validator, form, submitButton) {
                form.submit();
            }
        })
    }
    // </editor-fold>

    // <editor-fold desc="JMP Business Units">
    if($('#business-unit-form').length) {
        var $businessUnitForm = $('#business-unit-form');
        //Add Validations to the Form
        $businessUnitForm.bootstrapValidator({
            framework: 'bootstrap',
            excluded: ':disabled',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                business_unit_slug: {
                    validators: {
                        notEmpty: {
                            message: 'Business Unit Url is required and cannot be empty'
                        }
                    }
                },
                business_unit_name: {
                    validators: {
                        notEmpty: {
                            message: 'Business Unit Name is required and cannot be empty'
                        }
                    }
                }
            },
            submitHandler: function(validator, form, submitButton) {
                form.submit();
            }
        })
    }
    // </editor-fold>

    // <editor-fold desc="JMP Locations">
    if($('#location-form').length) {
        var $jobLocationForm = $('#location-form');
        //Add Validations to the Form
        $jobLocationForm.bootstrapValidator({
            framework: 'bootstrap',
            excluded: ':disabled',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                location_name: {
                    validators: {
                        notEmpty: {
                            message: 'Location Name is required and cannot be empty'
                        }
                    }
                },
                location_city: {
                    validators: {
                        notEmpty: {
                            message: 'City is required and cannot be empty'
                        }
                    }
                },
                location_state: {
                    validators: {
                        notEmpty: {
                            message: 'State is required and cannot be empty'
                        }
                    }
                },
                location_zip_code: {
                    validators: {
                        notEmpty: {
                            message: 'Zip Code is required and cannot be empty'
                        }
                    }
                },
                location_country: {
                    validators: {
                        notEmpty: {
                            message: 'Country is required and cannot be empty'
                        }
                    }
                }
            },
            submitHandler: function(validator, form, submitButton) {
                form.submit();
            }
        });

        /**
         * Add Change event for the Country, so when we choose a Country, we will get the list of states for the selected country
         */
        $(document).on("change", "#location_country", function (e) {
            e.preventDefault();
            if (this.value != "") {
                var country = this.value;
                $.ajax({
                    dataType: "json",
                    url: "./jmp/ajax/getStates.php",
                    data: {
                        country: country
                    },
                    cache: false,
                    success: function (result) {
                        if (result.status) {
                            var $states_ddl = $("#location_state");
                            $states_ddl.find("option:gt(0)").remove();
                            if (country == "CA") {
                                $states_ddl.find("option").eq(0).text("Province");
                                $states_ddl.trigger("change");
                                $states_ddl.attr("title", "Province is Required!");
                            } else {
                                $states_ddl.find("option").eq(0).text("State");
                                $states_ddl.trigger("change");
                                $states_ddl.attr("title", "State is Required!");
                            }
                            $.each(result.states, function (index, value) {
                                $states_ddl.append($("<option />").val(index).text(value));
                            });
                        }
                    },
                    error: function () {
                        alert("Error Occurred! Please try again...");
                    },
                    complete: function () {
                    }
                });
            }
        });
    }
    // </editor-fold>

    // <editor-fold desc="JMP Categories">
    if($('#add-edit-categories').length) {
        var $addEditCategories = $('#add-edit-categories');
        //Add Validations to the Form
        $addEditCategories.bootstrapValidator({
            framework: 'bootstrap',
            excluded: ':disabled',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                category_slug: {
                    validators: {
                        notEmpty: {
                            message: 'Category Url is required and cannot be empty'
                        }
                    }
                },
                category_name: {
                    validators: {
                        notEmpty: {
                            message: 'Category Name is required and cannot be empty'
                        }
                    }
                }
            },
            submitHandler: function(validator, form, submitButton) {
                form.submit();
            }
        })
    }
    // </editor-fold>

    // <editor-fold desc="JMP Career Areas">
    if($('#add-edit-careerareas').length) {
        var $addEditCareerAreas = $('#add-edit-careerareas');
        //Add Validations to the Form
        $addEditCareerAreas.bootstrapValidator({
            framework: 'bootstrap',
            excluded: ':disabled',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                career_area_slug: {
                    validators: {
                        notEmpty: {
                            message: 'Career Area Url is required and cannot be empty'
                        }
                    }
                },
                career_area_name: {
                    validators: {
                        notEmpty: {
                            message: 'Career Area Name is required and cannot be empty'
                        }
                    }
                }
            },
            submitHandler: function(validator, form, submitButton) {
                form.submit();
            }
        })
    }
    // </editor-fold>

    // <editor-fold desc="JMP Job Types">
    if($('#job-types-form').length) {
        var $jobTypeForm = $('#job-types-form');
        //Add Validations to the Form
        $jobTypeForm.bootstrapValidator({
            framework: 'bootstrap',
            excluded: ':disabled',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                job_type_name: {
                    validators: {
                        notEmpty: {
                            message: 'Job Type is required and cannot be empty'
                        }
                    }
                }
            },
            submitHandler: function(validator, form, submitButton) {
                form.submit();
            }
        })
    }
    // </editor-fold>

    // <editor-fold desc="JMP Job Status">
    if($('#job-status-form').length) {
        var $jobStatusForm = $('#job-status-form');
        //Add Validations to the Form
        $jobStatusForm.bootstrapValidator({
            framework: 'bootstrap',
            excluded: ':disabled',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                job_status_name: {
                    validators: {
                        notEmpty: {
                            message: 'Job Status is required and cannot be empty'
                        }
                    }
                }
            },
            submitHandler: function(validator, form, submitButton) {
                form.submit();
            }
        })
    }
    // </editor-fold>

    // <editor-fold desc="JMP Job Salary Type">
    if($('#job-salary-type-form').length) {
        var $jobSalaryTypeForm = $('#job-salary-type-form');
        //Add Validations to the Form
        $jobSalaryTypeForm.bootstrapValidator({
            framework: 'bootstrap',
            excluded: ':disabled',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                job_salary_type_name: {
                    validators: {
                        notEmpty: {
                            message: 'Job Salary Type is required and cannot be empty'
                        }
                    }
                },
            },
            submitHandler: function(validator, form, submitButton) {
                form.submit();
            }
        })
    }
    // </editor-fold>

    // <editor-fold desc="JMP Job Career Level">
    if($('#job-career-level-form').length) {
        var $jobCareerLevelForm = $('#job-career-level-form');
        //Add Validations to the Form
        $jobCareerLevelForm.bootstrapValidator({
            framework: 'bootstrap',
            excluded: ':disabled',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                job_career_level_name: {
                    validators: {
                        notEmpty: {
                            message: 'Job Career Level is required and cannot be empty'
                        }
                    }
                },
            },
            submitHandler: function(validator, form, submitButton) {
                form.submit();
            }
        })
    }
    // </editor-fold>

    // <editor-fold desc="JMP Job Education Level">
    if($('#job-education-level-form').length) {
        var $jobEducationLevelForm = $('#job-education-level-form');
        //Add Validations to the Form
        $jobEducationLevelForm.bootstrapValidator({
            framework: 'bootstrap',
            excluded: ':disabled',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                job_education_level_name: {
                    validators: {
                        notEmpty: {
                            message: 'Job Education Level is required and cannot be empty'
                        }
                    }
                },
            },
            submitHandler: function(validator, form, submitButton) {
                form.submit();
            }
        })
    }
    // </editor-fold>

    // <editor-fold desc="JMP Job Years Of Experience">
    if($('#job-years-of-experience-form').length) {
        var $jobYearsOfExperienceForm = $('#job-years-of-experience-form');
        //Add Validations to the Form
        $jobYearsOfExperienceForm.bootstrapValidator({
            framework: 'bootstrap',
            excluded: ':disabled',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                job_years_of_experience_name: {
                    validators: {
                        notEmpty: {
                            message: 'Job Years Of Experience is required and cannot be empty'
                        }
                    }
                },
            },
            submitHandler: function(validator, form, submitButton) {
                form.submit();
            }
        })
    }
    // </editor-fold>

    // <editor-fold desc="JMP Job Templates">
    if($('#add-edit-jobtemplates').length) {
        var $addEditJobTemplates = $('#add-edit-jobtemplates');
        //Add Validations to the Form
        $addEditJobTemplates.bootstrapValidator({
            framework: 'bootstrap',
            excluded: ':disabled',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                job_template_name: {
                    validators: {
                        notEmpty: {
                            message: 'Job Template Name is required and cannot be empty'
                        }
                    }
                },
                job_template_info: {
                    validators: {
                        notEmpty: {
                            message: 'Job Template Info is required and cannot be empty'
                        }
                    }
                }
            },
            submitHandler: function(validator, form, submitButton) {
                form.submit();
            }
        })



        /**
         * Add Text Editor to Job Description
         */
        $('#job_template_info').summernote({
            height: 300,
            minHeight: null,
            maxHeight: null,
            placeholder: 'Enter the Job Template Info',
            dialogsInBody: true,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear', 'height']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['fontname', ['fontname']],
                ['lineheight', ['lineheight']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', 500],
                ['insert', ['link', 'picture']],
            ],
            fontNames: ['Droid Sans','Open Sans','Trebuchet MS'],
            fontNamesIgnoreCheck: ['Droid Sans','Open Sans','Trebuchet MS'],
            fontSizes: ['8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '24', '36'],
            callbacks: {
                onPaste: function (e) {
                    if(detectIE() === false) {
                        var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                        e.preventDefault();
                        setTimeout(function () {
                            document.execCommand('insertText', false, bufferText);
                        }, 10);
                    }
                }
            }
        });
    }
    // </editor-fold>

    // <editor-fold desc="JMP Job Feeds">
    if($('#feeds-form').length) {
        var $feedForm = $('#feeds-form');
        //Add Validations to the Form
        $feedForm.bootstrapValidator({
            framework: 'bootstrap',
            excluded: ':disabled',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                feed_name: {
                    validators: {
                        notEmpty: {
                            message: 'Job Feed is required and cannot be empty'
                        }
                    }
                },
                feed_url_configuration: {
                    validators: {
                        notEmpty: {
                            message: 'Url Configuration is required and cannot be empty'
                        }
                    }
                }
            },
            submitHandler: function(validator, form, submitButton) {
                form.submit();
            }
        })

        $('input#feed_name').on('input',function(e){
            var defaultValueText = $(this).attr('default-value');
            if($(this).val() != ''){
                var textToDisplay = $(this).val().replace(/[^A-Z0-9]/ig, "-");
                $('span.feedurl').html(textToDisplay.toLowerCase()+"-feed.xml");
            }else{
                $('span.feedurl').html("");
            }
        });
    }
    // </editor-fold>

    // <editor-fold desc="JMP Job Report">
    if($('#job-report-table').length) {
        $(".loading").show();
        var jobReportTable = $('#job-report-table').DataTable({
            autoWidth: false,
            pageLength: 25,
            order: [[ 0, "desc" ]],
            // dom: 'B|ltip',
            dom: '<"pull-left"i><"view_all">p<"clear">t<"pull-left"i><"view_all">p<"clear">',
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            ajax: {
                "url": "./jmp/ajax/getJobReport.php",
                "type": "GET",
                "data": {
                    type: "JobReport"
                },
                "dataSrc": ""
            },
            "deferRender": true,
            columns: [
                {"data": "User"},
                {"data": "Start Date"},
                {"data": "Job Id"},
                {"data": "Job Title"},
                {"data": "Location"},
                {"data": "Applies"},
                {"data": "Status"},
                {
                    "data": "Feeds",
                    "orderable": false,
                    render: function ( data, type, row ) {
                        var jobFeedsHtml = "";
                        if(data != "") { jobFeedsHtml = renderFeedsInTable(data);}
                        return jobFeedsHtml;
                    }
                },
                {"data" : "Feeds" , "title" : "Feeds" , "visible" : false}
            ],
            initComplete: function () {
                $(".loading").hide();
                //Add tooltip to the action buttons & feeds
                $('[data-toggle="tooltip"]').tooltip();

                /**
                 * Add Multiselect to multiselect dropdowns
                 */
                $('.multiselect-holder select').multiselect({
                    buttonWidth: '100%',
                    maxHeight: '300',
                    numberDisplayed: 2,
                    disableIfEmpty: true,
                    enableFiltering: true,
                    includeSelectAllOption: true
                });

                /**
                 * Add Text To View All
                 */
                var $viewAll = $("<a href='#'>View all jobs</a>");
                $("div.view_all")
                    .addClass("pull-left")
                    .append($viewAll);
                $("div.view_all a")
                    .on("click",function(e){
                        var jobReportTableSettings = jobReportTable.settings();
                        jobReportTableSettings[0]._iDisplayLength = jobReportTableSettings[0].fnRecordsTotal();
                        jobReportTable.draw();
                        e.preventDefault();
                    })
            }
        });
        yadcf.init(jobReportTable, [
            {
                column_number : 0,
                filter_container_id: 'user_filter',
                filter_type: 'multi_select',
                column_data_type: "text",
                html_data_type: "text",
                filter_default_label: "Filter by User",
                omit_default_label: true,
                filter_reset_button_text: false
            },
            {
                column_number : 6,
                filter_container_id: 'status_filter',
                filter_type: 'multi_select',
                column_data_type: "text",
                html_data_type: "html",
                filter_default_label: "Filter by Status",
                omit_default_label: true,
                filter_reset_button_text: false
            }
        ]);

        //Add External Keyword Search for Datatable
        $('#keyword_search').on( 'keyup click', function () {
            jobReportTable.search(
                $('#keyword_search').val()
            ).draw();
        } );

        // Configure Export Buttons
        new $.fn.dataTable.Buttons( jobReportTable, {
            buttons: [
                {
                    extend: 'csv',
                    text: 'Export To CSV',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,8]
                    },
                }
            ]
        } );
        // Add the Export buttons to the toolbox
        jobReportTable.buttons( 0, null ).container().appendTo( '#export-assets' );
    }
    // </editor-fold>

});


/**
 * Function to close a Job
 * @param elem
 * @param callback
 */
closeJob = function(elem,callback){
    var id = elem.href.split("#");
    var params = {};
    params.jobId  = id[1];
    $.ajax({
        dataType: "json",
        url: "./jmp/ajax/close-job.php",
        data: params,
        cache: false,
        success: function(result){
            if(result.status){
                if (typeof callback == "function"){
                    callback();
                }else{

                }
            }
        },
        error: function(){
            alert("Error Occurred! Please try again...");
        },
        complete: function(){}
    });
};

/**
 * Render Job Feed in Datatable
 * @param jobFeed
 * @returns {string}
 */
renderFeedsInTable = function(feedsArray){
    var jobFeedsHtml = "";
    for (var x = 0; x < feedsArray.length; x++) {
        var jobFeed = feedsArray[x];
        var jobFeedAbv = jobFeed.substring(0, 2).toUpperCase();
        jobFeedsHtml += "<a class='circleBtn feedBtn' title='" + jobFeed + "' data-toggle='tooltip' data-placement='top'>" + jobFeedAbv + "</a>";
    }
    return jobFeedsHtml
}