var asInitVals = new Array();
var sizeError = 0;
var oTable;
$(document).ready(function () {
	/*Pages Form Validation */
	if($('#addPageForm').length) {
		var $addPageForm = $('#addPageForm');
		//Add Validations to the Form
		$addPageForm.bootstrapValidator({
			framework: 'bootstrap',
			excluded: ':disabled',
			feedbackIcons: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields: {
				page_slug: {
					selector: '#page_slug',
					validators: {
						notEmpty: {
							message: 'Page URL is required and cannot be empty.'
						}
					}
				},
				page_name: {
					selector: '#page_name',
					validators: {
						notEmpty: {
							message: 'Page name is required and cannot be empty.'
						}
					}
				}
			},
			submitHandler: function(validator, form, submitButton) {
				form.submit();
			}
		});
	}

	if($('#editPageForm').length) {
		var $editPageForm = $('#editPageForm');
		//Add Validations to the Form
		$editPageForm.bootstrapValidator({
			framework: 'bootstrap',
			excluded: ':disabled',
			feedbackIcons: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields: {
				page_slug: {
					selector: '#page_slug',
					validators: {
						notEmpty: {
							message: 'Page URL is required and cannot be empty.'
						}
					}
				},
				page_name: {
					selector: '#page_name',
					validators: {
						notEmpty: {
							message: 'Page name is required and cannot be empty.'
						}
					}
				}
			},
			submitHandler: function(validator, form, submitButton) {
				form.submit();
			}
		});
	}

	if($('#edit-home-data').length) {
		var $editHomeForm = $('#edit-home-data');
		//Add Validations to the Form
		$editHomeForm.bootstrapValidator({
			framework: 'bootstrap',
			excluded: ':disabled',
			feedbackIcons: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields: {
				page_name: {
					selector: '#page_name',
					validators: {
						notEmpty: {
							message: 'Main text title is required and cannot be empty.'
						}
					}
				}
			},
			submitHandler: function(validator, form, submitButton) {
				form.submit();
			}
		});
	}
	/*Pages Form Validation */

	/* Autofill page title */
	$('input.pagename-autofill').on('input',function(e){
		var defaultValueText = $(this).attr('default-value');
		if($(this).data("lastval")!= $(this).val()){
			$(this).data("lastval",$(this).val());
			if($(this).val() != ''){
				var textToDisplay = $(this).val().replace(/[^A-Z0-9]/ig, "");
				$(this).parent('div').siblings('div').find('span.pagename').html(textToDisplay.toLowerCase());
			}else{
				$(this).parent('div').siblings('div').find('span.pagename').html(defaultValueText);
			}
		};
	});
	/* Autofill page title */

	/* Sort Pages */
	if($("#pages_sortable_list").length){
		$("#pages_sortable_list").sortable({
			handle : 'a.drag',
			update : function () {
				var order = $('#pages_sortable_list').sortable('serialize');
				$("#infoSorting").load(relatedPage+"/ajax/change_order.php?"+order);
			}
		});
	}
	/* Sort Pages */

	/* Sort Sections */
	if($("#pages_sortable_list_2").length){
		$("#pages_sortable_list_2").sortable({
			handle : 'a.drag',
			update : function () {
				var order = $('#pages_sortable_list_2').sortable('serialize');
				$("#infoSorting_2").load(relatedFeature+"/ajax/change_order.php?"+order);
			}
		});
	}
	if($("#pages_sortable_list_3").length){
		$("#pages_sortable_list_3").sortable({
			handle : 'a.drag',
			update : function () {
				var order = $('#pages_sortable_list_3').sortable('serialize');
				$("#infoSorting_3").load(relatedFeature+"/ajax/change_order.php?"+order);
			}
		});
	}
	if($("#pages_sortable_list_4").length){
		$("#pages_sortable_list_4").sortable({
			handle : 'a.drag',
			update : function () {
				var order = $('#pages_sortable_list_4').sortable('serialize');
				$("#infoSorting_4").load(relatedFeature+"/ajax/change_order.php?"+order);
			}
		});
	}
	if($("#pages_sortable_list_5").length){
		$("#pages_sortable_list_5").sortable({
			handle : 'a.drag',
			update : function () {
				var order = $('#pages_sortable_list_5').sortable('serialize');
				$("#infoSorting_5").load(relatedFeature+"/ajax/change_order.php?"+order);
			}
		});
	}
	if($("#pages_sortable_list_6").length){
		$("#pages_sortable_list_6").sortable({
			handle : 'a.drag',
			update : function () {
				var order = $('#pages_sortable_list_6').sortable('serialize');
				$("#infoSorting_6").load(relatedFeature+"/ajax/change_order.php?"+order);
			}
		});
	}
	if($("#pages_sortable_list_7").length){
		$("#pages_sortable_list_7").sortable({
			handle : 'a.drag',
			update : function () {
				var order = $('#pages_sortable_list_7').sortable('serialize');
				$("#infoSorting_7").load(relatedFeature+"/ajax/change_order.php?"+order);
			}
		});
	}
	/* Sort Pages */

	/* Trigger a confirmation dialog if the user clicked outside the add / edit container */
	if($("#addEditSpace").length) {
		$(".sidebar a, .leftSide a").click(function(e) {
			e.preventDefault();
			if($(this).hasClass('togglemenu')){
				return true;
			}
			var confirmOutsideDialog = $('<div id="errorDialog"><P>Are you sure you want to move out of this page?</P></div>');
			var targetHref = $(this).attr('href');
			confirmOutsideDialog.dialog({
				title: "Confirmation Required",
				modal: true,
				resizable: false,
				buttons: [{
					text: "yes",
					click: function(){
						window.location.href = targetHref;
					}
				},
				{
					text: "Cancel",
					click: function(){
						$(this).dialog("close");
					}
				}]
			});
		});
	}
	/* Trigger a confirmation dialog if the user clicked outside the add / edit container */

	/* Change template confirmation */
	$('a.loadBtn').on('click',function(e){
		e.preventDefault();
		var selectedTemplateId = $('#templateId').val();
		if(selectedTemplateId != '' && tId != selectedTemplateId){
			var confirmDialog = $('<div id="errorDialog"><P>Loading a new template will erase all the new edits on this page!</P></div>');
			confirmDialog.dialog({
				title: "Confirmation Required",
				modal: true,
				resizable: false,
				buttons: [{
					text: "Yes",
					click: function(){
						window.location.href = '?Todo='+toDo+'&pId='+pId+'&tId='+selectedTemplateId;
					}
				},
				{
					text: "Cancel",
					click: function(){
						$(this).dialog("close");
						$('#templateId option').each(function () {
							if (this.defaultSelected) {
								this.selected = true;
							}
						});
					}
				}]
			});
		}
	});
	/* Change template confirmation */

	/* Help button dialog */
	$('a.helpBtn').on('click',function(e){
		e.preventDefault();
		var helpDialog = $('<div id="helpDialog"><P>A help message will be displayed here.</P></div>');
		helpDialog.dialog({
			title: "Help",
			modal: true,
			resizable: false,
			buttons: [{
				text: "Got it",
				click: function(){
					$(this).dialog("close");
				}
			}]
		});
	});
	/* Help button dialog */

	/* Page add/edit cancel button */
	$('a.cancel').on('click',function(e){
		e.preventDefault();
		var targetHref = $(this).attr('href');
		var cancelDialog = $('<div id="cancelDialog"><P>Are you sure you want to cancel all the changes?</P></div>');
		cancelDialog.dialog({
			title: "Confirmation Required",
			modal: true,
			resizable: false,
			buttons: [{
				text: "Yes",
				click: function(){
					window.location.href = targetHref;
				}
			},
			{
				text: "Cancel",
				click: function(){
					$(this).dialog("close");
				}
			}]
		});
	});
	/* Page add/edit cancel button */

	/* Logout Confirmation button */
	$('a.logOut').on('click',function(e){
		e.preventDefault();
		var logoutDialog = $('<div id="cancelDialog"><P>Are you sure you want to log out from the system?</P></div>');
		var logoutURL = $(this).attr('href')
		logoutDialog.dialog({
			title: "Confirm Logout",
			modal: true,
			resizable: false,
			buttons: [{
				text: "Yes",
				click: function(){
					window.location.href = logoutURL;
				}
			},
			{
				text: "Cancel",
				click: function(){
					$(this).dialog("close");
				}
			}]
		});
	});
	/* Logout Confirmation button */

	/* delete Image confirmation button */
	$('a.removeImage').on('click',function(e){
		e.preventDefault();
		var $this = $(this);
		var removeImageDialog = $('<div id="cancelDialog"><P>Are you sure you want to delete this image?</P></div>');
		removeImageDialog.dialog({
			title: "Confirm Image Deletion",
			modal: true,
			resizable: false,
			buttons: [{
				text: "Yes",
				click: function(){
					$(this).dialog("close");
					var params = {};
					params.imageId  = $this.attr('data-id');
					$.ajax({
						dataType: "json",
						url: relatedPage+"/ajax/delete.php",
						data: params,
						cache: false,
						success: function(result){
							if(result.status == 1){
								$this.hide();
								$this.siblings('h4').find('span').html('N/A');
								$this.siblings('a.modalImg').hide();
								$this.siblings('input:hidden').val('');
							}
						},
						error: function(){
							alert("Error Occurred! Please try again...");
						},
						complete: function(){}
					});
				}
			},
			{
				text: "Cancel",
				click: function(){
					$(this).dialog("close");
				}
			}]
		});
	});
	/* delete Image confirmation button */

	/* Add/edit pages image validation */
	$("#addPageForm, #editPageForm, #addFeatureForm, #editFeatureForm").find("input[type=file]").change(function(){
		var $this = $(this);
		var _URL = window.URL || window.webkitURL;

		var configWidth = parseInt($this.attr('data-width'));
		var configHeight = parseInt($this.attr('data-height'));
		var configWeight = parseInt($this.attr('data-weight'));
		var configFormats = $this.attr('data-formats').split(",");

		var fileName = $this.val();
		var f = $this[0].files[0];
		var img = new Image();
		/* Check File Extension */
		if($this.siblings('div.fakeDivBtn').find('span').length){
			$this.siblings('div.fakeDivBtn').find('span').html('N/A');
		}else{
			$this.parent('label').parent('div').siblings('h4').find('span').html('N/A');
		}

		var arrayFile = $this.val().split('.');
		var lastsegmentFile = arrayFile[arrayFile.length-1];

		var extensionError = 0;
		for(i=0; i<=configFormats.length;i++){
			if(lastsegmentFile.toLowerCase() == configFormats[i]){
				extensionError++;
			}
		}

		if(extensionError == 0){
			$this.val('').clone(true);
			var errorDialog = $('<div id="errorDialog"><P>Please make sure the uploaded image is in the right format:'+$this.attr('data-formats')+'</P></div>');
			errorDialog.dialog({
				title: "Upload error",
				modal: true,
				resizable: false,
				buttons: [{
					text: "OK",
					click: function(){
						$(this).dialog("close");
					}
				}]
			});
			return false;
		}

		/* Check File Weight */
		if (f.size > configWeight || f.fileSize > configWeight){
			$this.val('').clone(true);
			var errorDialog = $('<div id="errorDialog"><P>Please make sure the weight of the uploaded image is: < '+$this.attr('data-weight-formatted')+'.</P></div>');
			errorDialog.dialog({
				title: "Upload error",
				modal: true,
				resizable: false,
				buttons: [{
					text: "OK",
					click: function(){
						$(this).dialog("close");
					}
				}]
			});
			return false;
		}

		/* Check File Dimenssions */
		img.onload = function() {
			if (this.width != configWidth || this.height != configHeight){
				$this.val('').clone(true);
				var errorDialog = $('<div id="errorDialog"><P>Please make sure the uploaded image has the following dimensions: '+$this.attr('data-width')+'x'+$this.attr('data-height')+' pixels.</P></div>');
				errorDialog.dialog({
					title: "Upload error",
					modal: true,
					resizable: false,
					buttons: [{
						text: "OK",
						click: function(){
							$(this).dialog("close");
						}
					}]
				});
				return false;
			}else{
				var array = fileName.split('\\');
				var lastsegment = array[array.length-1];
				if($this.siblings('div.fakeDivBtn').find('span').length){
					$this.siblings('div.fakeDivBtn').find('span').html(lastsegment);
				}else{
					$this.parent('label').parent('div').siblings('h4').find('span').html(lastsegment);
				}
			}
		};
		img.src = _URL.createObjectURL(f);
	});
	/* Add/edit pages image validation */

	$('.nav-tabs a').click(function(){
		$(this).tab('show');
	})
	$( ".togglemenu" ).click(function() {
		$( ".sidebar" ).toggleClass( "sidebarhidden" );
		$('.right-sec > footer').css('width',$('.right-sec').width());
	});
	/* Summernote Init Functions */
	if($(".page_description").length){
		addSummerNoteOnTheFly($('.page_description'), 300);
	}
	if($(".feature_description").length){
		$('.feature_description').each(function(){
			var $thisEditor = $(this);
			addSummerNoteOnTheFly($thisEditor, 150);
		});
	}
	function addSummerNoteOnTheFly(element,elementHeight){
		$(element).summernote({
			height: elementHeight,
			minHeight: null,
			maxHeight: null,
			placeholder: element.attr('placeholder'),
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
			['insert', ['link', 'picture', 'video']],
			],
			fontNames: ['Open Sans'],
			fontNamesIgnoreCheck: ['Open Sans'],
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
	/* Summernote Init Functions */
	$(document).on('click', '.addBtn.addMore', function(e){
		e.preventDefault();
		var controlForm = $('.event-date-holder-more'),
		currentEntry = $('.event-date-holder-main .event-date-holder'),
		newEntry = $(currentEntry.clone()).appendTo(controlForm);
		newEntry.find('input,textarea').val('');
		defaultFormValue++;
		newEntry.find('input').each(function(){
			var oldName = $(this).attr("name");
			var newName = oldName.replace('date[0]','date['+defaultFormValue+']');
			$(this).attr("name",newName);
			$(this).removeAttr('required');
		});
		newEntry.find('a.deleteEventDate').removeClass('hidden').removeAttr('rel');
		newEntry.find("#datepikerFrom0").removeClass('hasDatepicker').attr('id','datepikerFrom'+defaultFormValue).datepicker({
			onSelect: function (date) {
				var dt1 = $('#datepikerFrom'+defaultFormValue).datepicker('getDate');
				var dt2 = $('#datepikerTo'+defaultFormValue).datepicker('getDate');
				if (dt1 > dt2) {
					$('#datepikerTo'+defaultFormValue).datepicker('setDate', dt1);
				}
				$('#datepikerTo'+defaultFormValue).datepicker('option', 'minDate', dt1);
			}
		});
		newEntry.find("#datepikerTo0").removeClass('hasDatepicker').attr('id','datepikerTo'+defaultFormValue).datepicker({
			minDate: $('#datepikerFrom'+defaultFormValue).datepicker('getDate'),
			onClose: function () {
				var dt1 = $('#datepikerFrom'+defaultFormValue).datepicker('getDate');
				var dt2 = $('#datepikerTo'+defaultFormValue).datepicker('getDate');
				if (dt2 <= dt1) {
					var minDate = $('#datepikerTo'+defaultFormValue).datepicker('option', 'minDate');
					$('#datepikerTo'+defaultFormValue).datepicker('setDate', minDate);
				}
			}
		});
		newEntry.find('textarea').each(function(){
			var oldName = $(this).attr("name");
			var newName = oldName.replace('date[0]','date['+defaultFormValue+']');
			$(this).attr("name",newName);
			$(this).removeAttr('required');
		});
		return false;
	});
	$(document).on("click", ".deleteEventDate", function(e){
		e.preventDefault();
		$this = $(this);
		var confirmEventDeletion = $('<div id="confirmEventDeletion"><P>Are you sure you want to remove this event?</P></div>');
		confirmEventDeletion.dialog({
			title: "Confirm Event Deletion",
			modal: true,
			resizable: false,
			buttons: [{
				text: "Yes",
				click: function(){
					$(this).dialog("close");
					$this.parents('.event-date-holder').remove();
					removeItemFromDB($this);
				}
			},
			{
				text: "Cancel",
				click: function(){
					$(this).dialog("close");
				}
			}]
		});
	});
	$(document).on("click", ".actionBtn.delete", function(e){
		e.preventDefault();
		$this = $(this);
		var confirmEventDeletion = $('<div id="confirmEventDeletion"><P>Are you sure you want to remove this event?</P></div>');
		confirmEventDeletion.dialog({
			title: "Confirm Event Deletion",
			modal: true,
			resizable: false,
			buttons: [{
				text: "Yes",
				click: function(){
					$(this).dialog("close");
					$this.parents('tr').remove();
					removeItemFromDB($this,false);
				}
			},
			{
				text: "Cancel",
				click: function(){
					$(this).dialog("close");
				}
			}]
		});
	});
	var datePikerOnPage = $(".event-date-holder").length;
	for(var pickerPos = 0; pickerPos<datePikerOnPage;pickerPos++){
		makeDatePicker(pickerPos);
	}
	function makeDatePicker(pickerPos){
		$("#datepikerFrom"+pickerPos).datepicker({
			onSelect: function (date) {
				var dt1 = $('#datepikerFrom'+pickerPos).datepicker('getDate');
				var dt2 = $('#datepikerTo'+pickerPos).datepicker('getDate');
				if (dt1 > dt2) {
					$('#datepikerTo'+pickerPos).datepicker('setDate', dt1);
				}
				$('#datepikerTo'+pickerPos).datepicker('option', 'minDate', dt1);
			}
		});
		$( "#datepikerTo"+pickerPos ).datepicker({
			minDate: $('#datepikerFrom'+pickerPos).datepicker('getDate'),
			onClose: function () {
				var dtt1 = $('#datepikerFrom'+pickerPos).datepicker('getDate');
				var dtt2 = $('#datepikerTo'+pickerPos).datepicker('getDate');
				if (dtt2 <= dtt1) {
					var minDate = $('#datepikerTo'+pickerPos).datepicker('option', 'minDate');
					$('#datepikerTo'+pickerPos).datepicker('setDate', minDate);
				}
			}
		});
	}
	$("a.modalImg").fancybox({
		fitToView	    : false,
		width		    : '560px',
		height		    : '450px',
		autoSize	    : false,
		autoResize      : false,
		maxWidth		: '98%',
		closeClick	    : false,
		openEffect	    : 'none',
		closeEffect	    : 'none',
		padding         : 4,
		beforeShow : function() {
			$(".fancybox-skin").css("background-color","#ffffff");
		},
		helpers : {
			overlay: {
				locked: false,
				css: { 'background': 'rgba(255, 255, 255, 0.7)' }
			}
		}
	});
	$("a.modalVideo").bind("click",function(e){
		e.preventDefault();
		var videoURL =  $(this).attr('rel');
		var modalHeight =  $(this).attr('modal-height');
		$.fancybox({
			href            : videoURL,
			fitToView	    : false,
			width		    : '980px',
			height		    : modalHeight,
			autoSize	    : false,
			autoResize      : false,
			closeClick	    : false,
			openEffect	    : 'none',
			closeEffect	    : 'none',
			padding         : 10,
			type		    : 'iframe',
			scrolling       : 'no',
			beforeShow : function() {
				$(".fancybox-skin").css("background-color","#ffffff");
			},
			helpers : {
				overlay: {
					locked: false,
					css: { 'background': 'rgba(255, 255, 255, 0.7)' }
				}
			}
		});
	});
	var $applyForm = $("#edit-data");
	$applyForm.find("input[type=file]").change(function(){
		var $this = $(this);
		var _URL = window.URL || window.webkitURL;

		var configWeight = parseInt(1048576);
		var configFormats = "jpg,gif,png".split(",");

		var fileName = $this.val();
		var f = $this[0].files[0];
		var img = new Image();

		$("#message-file").fadeOut('slow');
		$('#fakeDivBtn span').html('No file chosen.');
		var arrayFile = $("#real").val().split('.');
		var lastsegmentFile = arrayFile[arrayFile.length-1];

		var extensionError = 0;
		for(i=0; i<=configFormats.length;i++){
			if(lastsegmentFile.toLowerCase() == configFormats[i]){
				extensionError++;
			}
		}


		if(extensionError == 0){
			$this.val('').clone(true);
			var errorDialog = $('<div id="errorDialog"><P>Please make sure the uploaded image is in the right format: JPG, GIF or PNG</P></div>');
			errorDialog.dialog({
				title: "Upload error",
				modal: true,
				resizable: false,
				buttons: [{
					text: "OK",
					click: function(){
						$(this).dialog("close");
					}
				}]
			});
			return false;
		}
		/* Check File Weight */
		if (f.size > configWeight || f.fileSize > configWeight){
			$this.val('').clone(true);
			var errorDialog = $('<div id="errorDialog"><P>Please make sure the weight of the uploaded image is: < 1 MB.</P></div>');
			errorDialog.dialog({
				title: "Upload error",
				modal: true,
				resizable: false,
				buttons: [{
					text: "OK",
					click: function(){
						$(this).dialog("close");
					}
				}]
			});
			return false;
		}
		var array = fileName.split('\\');
		var lastsegment = array[array.length-1];
		$('#fakeDivBtn span').html(lastsegment);
	});
	$applyForm.validate({
		rules: {
			password: {
				required: false
			} ,
			confirm_password: {
				equalTo: "#inputPassword"
			}
		},
		messages: {
			confirm_password: {
				equalTo: "Please confirm your password."
			}
		}
	});

	/* Homepage image validation */
	$("#edit-home-data").find("input[type=file]").change(function(){
		var $this = $(this);
		var _URL = window.URL || window.webkitURL;

		var configWeight = parseInt(1048576);
		var configFormats = "jpg,gif,png".split(",");

		var fileName = $this.val();
		var f = $this[0].files[0];
		var img = new Image();

		$this.siblings('.fakeDivBtn').find('span').html('No file chosen.');
		var arrayFile = $this.val().split('.');
		var lastsegmentFile = arrayFile[arrayFile.length-1];

		var extensionError = 0;
		for(i=0; i<=configFormats.length;i++){
			if(lastsegmentFile.toLowerCase() == configFormats[i]){
				extensionError++;
			}
		}


		if(extensionError == 0){
			$this.val('').clone(true);
			var errorDialog = $('<div id="errorDialog"><P>Please make sure the uploaded image is in the right format: JPG, GIF or PNG</P></div>');
			errorDialog.dialog({
				title: "Upload error",
				modal: true,
				resizable: false,
				buttons: [{
					text: "OK",
					click: function(){
						$(this).dialog("close");
					}
				}]
			});
			return false;
		}
		/* Check File Weight */
		if (f.size > configWeight || f.fileSize > configWeight){
			$this.val('').clone(true);
			var errorDialog = $('<div id="errorDialog"><P>Please make sure the weight of the uploaded image is: < 1 MB.</P></div>');
			errorDialog.dialog({
				title: "Upload error",
				modal: true,
				resizable: false,
				buttons: [{
					text: "OK",
					click: function(){
						$(this).dialog("close");
					}
				}]
			});
			return false;
		}
		var array = fileName.split('\\');
		var lastsegment = array[array.length-1];
		$this.siblings('.fakeDivBtn').find('span').html(lastsegment);
	});
	/* General Homepage image validation */

	/* Testimonials add/delete */
	$(document).on('click', '.addBtn.addMoreTestimonials', function(e){
		e.preventDefault();
		var controlForm = $('.testimonial-holder-more'),
		currentEntry = $('.testimonial-holder-main .testimonial-holder'),
		newEntry = $(currentEntry.clone()).appendTo(controlForm);
		newEntry.find('input,textarea').val('');
		defaultFormValue++;
		newEntry.find('input').each(function(){
			var oldName = $(this).attr("name");
			var newName = oldName.replace('testimonial[0]','testimonial['+defaultFormValue+']');
			$(this).attr("name",newName);
			$(this).removeAttr('required');
		});
		newEntry.find('a.deleteTestimonial').removeClass('hidden').removeAttr('rel');

		newEntry.find('textarea').each(function(){
			var oldName = $(this).attr("name");
			var newName = oldName.replace('testimonial[0]','testimonial['+defaultFormValue+']');
			$(this).attr("name",newName);
			$(this).removeAttr('required');
		});
		$('.deleteTestimonial').on('click', function(e){
			e.preventDefault();
			$this = $(this);
			var removeTestimonialDialog = $('<div id="cancelDialog"><P>Are you sure you want to delete this advertorial?</P></div>');
			removeTestimonialDialog.dialog({
				title: "Confirm Advertorial Deletion",
				modal: true,
				resizable: false,
				buttons: [{
					text: "Yes",
					click: function(){
						$(this).dialog("close");
						$this.parents('.testimonial-holder').remove();
						removeTestimonialFromDB($this);
					}
				},
				{
					text: "Cancel",
					click: function(){
						$(this).dialog("close");
					}
				}]
			});
		});
		return false;
	});
	$('.deleteTestimonial').on('click', function(e){
		e.preventDefault();
		$this = $(this);
		var removeTestimonialDialog = $('<div id="cancelDialog"><P>Are you sure you want to delete this advertorial?</P></div>');
		removeTestimonialDialog.dialog({
			title: "Confirm Advertorial Deletion",
			modal: true,
			resizable: false,
			buttons: [{
				text: "Yes",
				click: function(){
					$(this).dialog("close");
					$this.parents('.testimonial-holder').remove();
					removeTestimonialFromDB($this);
				}
			},
			{
				text: "Cancel",
				click: function(){
					$(this).dialog("close");
				}
			}]
		});
	});
	/* Testimonials add/delete */
	if($("#datepikerArticle").length){
		$("#datepikerArticle").datepicker();
	}

	/* Career Areas Mapping Manipulation */
	$(document).on('click', '.add_field_button', function(e){
		e.preventDefault();
		var mappingDefaultField = $('.input_fields_wrap .form-group');
		var newMappingEntry = $(mappingDefaultField.clone()).appendTo($(".mapping"));
		newMappingEntry.find('input').val('');
		newMappingEntry.find('label.control-label.col-xs-3').html('&nbsp;');
		newMappingEntry.find('a').removeClass('helpBtn').addClass('removeMappingBtn').html('<i class="fa fa-times" aria-hidden="true"></i>');
	});
	$(document).on("click",".removeMappingBtn", function(e){
		e.preventDefault();
		$(this).parent('div').parent('div').remove();
	});
	/* Career Areas Mapping Manipulation */

	// <editor-fold desc="Users">
	if($('#listing-table-users').length) {
		$('#listing-table-users').DataTable({
			autoWidth: false,
			pageLength: 20,
			order: [[ 0, "desc" ]],
			ajax: {
			"url": "./users/ajax/getUsers.php",
			"type": "GET",
			"data": {},
			"dataSrc": ""
			},
			"deferRender": true,
			columns: [
			{"data": "User"},
			{"data": "Title"},
			{"data": "Email"},
			{"data": "Last Login"},
			{"data": "IP"},
			{"data": "Active"},
			{"data": "Actions", "orderable": false}
			],
			dom: 'ftip',
			initComplete: function () {
				//Add tooltip to the action buttons
				$('[data-toggle="tooltip"]').tooltip()
			}
		});
	}

	if($('#addEditUserForm').length) {
		var $addEditUserForm = $('#addEditUserForm');
		//Add Validations to the Form
		$addEditUserForm.bootstrapValidator({
			framework: 'bootstrap',
			excluded: ':disabled',
			feedbackIcons: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields: {
				first_name: {
					validators: {
						notEmpty: {
							message: 'First Name is required and cannot be empty'
						}
					}
				},
				last_name: {
					validators: {
						notEmpty: {
							message: 'Last Name is required and cannot be empty'
						}
					}
				},
				email: {
					validators: {
						notEmpty: {
							message: 'Email Address is required and cannot be empty'
						},
						email:{
							message: "Please Enter a Valid Email Address"
						},
						remote: {
							url:  './users/ajax/validateEmail.php',
							data: function(validator, $field, value) {
								return {
									id: $('#userId').val()
								};
							},
							message: 'The email address is already in use',
							type: 'POST'
						}
					}
				},
				password: {
					validators: {
						callback: {
							callback: function(value, validator,$field) {
								var userId = $('#userId').val();
								if(userId == "" &&  $field.val()==""){
									return {
										valid: false,
										message: 'The password is required and cannot be empty'
									}
								}
								return {
									valid: true,
									message: ''
								}
							}
						},
						identical: {
							field: 'confirm_password',
							message: 'Passwords do not match.'
						}
					}
				},
				confirm_password: {
					validators: {
						identical: {
							field: 'password',
							message: 'Passwords do not match.'
						}
					}
				}
			},
			submitHandler: function(validator, form, submitButton) {
				form.submit();
			}
		});

		//Validate Upload Image
		$addEditUserForm.find("input[type=file]").change(function(){
			var $this = $(this);
			var _URL = window.URL || window.webkitURL;

			var configWeight = parseInt(1048576);
			var configFormats = "jpg,gif,png".split(",");

			var fileName = $this.val();
			var f = $this[0].files[0];
			var img = new Image();

			$("#message-file").fadeOut('slow');
			$('#fakeDivBtn span').html('No file chosen.');
			var arrayFile = $("#real").val().split('.');
			var lastsegmentFile = arrayFile[arrayFile.length-1];

			var extensionError = 0;
			for(i=0; i<=configFormats.length;i++){
				if(lastsegmentFile.toLowerCase() == configFormats[i]){
					extensionError++;
				}
			}

			if(extensionError == 0){
				var errorDialog = $('<div id="errorDialog"><P>Please make sure the uploaded image is in the right format: JPG, GIF or PNG</P></div>');
				errorDialog.dialog({
					title: "Upload error",
					modal: true,
					resizable: false,
					buttons: [{
						text: "OK",
						click: function(){
							$(this).dialog("close");
						}
					}]
				});
				return false;
			}
			/* Check File Weight */
			if (f.size > configWeight || f.fileSize > configWeight){
				var errorDialog = $('<div id="errorDialog"><P>Please make sure the weight of the uploaded image is: < 1 MB.</P></div>');
				errorDialog.dialog({
					title: "Upload error",
					modal: true,
					resizable: false,
					buttons: [{
						text: "OK",
						click: function(){
							$(this).dialog("close");
						}
					}]
				});
				return false;
			}
			var array = fileName.split('\\');
			var lastsegment = array[array.length-1];
			$('#fakeDivBtn span').html(lastsegment);
		});
	}
	// </editor-fold>
});
/* Color Picker Init */
$(function() {
	if($("#site_color").length){
		$(".site_color").colorpicker();
	}
});
/* Color Picker Init */
$(window).ready(function(){
	var width = $(window).width()
	if ((width <= 1024)) {
		$( ".sidebar" ).addClass( "sidebarhidden" );
	} else {
		$( ".sidebar" ).removeClass( "sidebarhidden" );
	}

	//Set the width of the sticky footer
	$('.right-sec > footer').css('width',$('.right-sec').width());

	// Sticking Footer to The Bottom of The Page
	var heightToExclude = $('footer').outerHeight() + $('header').outerHeight() + 62;
	var contentSectionHeight = $(window).height() - heightToExclude;
	$(".float-row").css('minHeight',contentSectionHeight);
});

$( window ).resize(function() {
	var width = $(window).width()
	if ((width <= 1024)) {
		$( ".sidebar" ).addClass( "sidebarhidden" );
	} else {
		$( ".sidebar" ).removeClass( "sidebarhidden" );
	}

	$('.right-sec > footer').css('width',$('.right-sec').width());

	// Sticking Footer to The Bottom of The Page
	var heightToExclude = $('footer').outerHeight() + $('header').outerHeight() + 62;
	var contentSectionHeight = $(window).height() - heightToExclude;
	$(".float-row").css('minHeight',contentSectionHeight);
});
removeItemFromDB = function(elem,action){
	var attr = elem.attr('rel');
	if (typeof attr !== typeof undefined && attr !== false) {
		var id = elem.attr('rel').split("!*!");
		var params = {};
		params.eventDateId  = id[0];
		params.eventId  = id[1];
		$.ajax({
			dataType: "json",
			url: relatedPage+"/ajax/delete.php",
			data: params,
			cache: false,
			success: function(result){
				if(result.status == 2 && action){
					window.location.href = 'main.php?Todo=listEvents';
				}
			},
			error: function(){
				alert("Error Occurred! Please try again...");
			},
			complete: function(){}
		});
	}else{
		return;
	}
}
removeTestimonialFromDB = function(elem,action){
	var id = elem.attr('rel');
	if (typeof id !== typeof undefined && id !== false) {
		var params = {};
		params.testimonialId  = id;
		$.ajax({
			dataType: "json",
			url: relatedPage+"/ajax/deleteTestimonial.php",
			data: params,
			cache: false,
			success: function(result){},
			error: function(){
				alert("Error Occurred! Please try again...");
			},
			complete: function(){}
		});
	}else{
		return;
	}
}
removeLocationFromDB = function(elem,action){
	var id = elem.attr('rel');
	if (typeof id !== typeof undefined && id !== false) {
		var params = {};
		params.locationId  = id;
		$.ajax({
			dataType: "json",
			url: relatedPage+"/ajax/delete.php",
			data: params,
			cache: false,
			success: function(result){},
			error: function(){
				alert("Error Occurred! Please try again...");
			},
			complete: function(){}
		});
	}else{
		return;
	}
}