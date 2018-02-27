$(document).ready(function() {
    $('body').on('click', '.finish-btn', function(e) {
        $(".selectpackage").closest(".form-group").find(".error-message").hide();
        $(".selectpackage").closest(".form-group").removeClass("has-error");
        if(!$(".selectpackage input[type='checkbox']:checked").length){
            $(".selectpackage").closest(".form-group").find(".error-message").show();
            $(".selectpackage").closest(".form-group").addClass("has-error");
        }
        else{
            $(this).closest("form").submit();
        }
    });
    var navListItems = $('div.setup-panel div .navButton'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn');
    allPrevBtn = $('.prevBtn');
    allWells.hide();
    navListItems.click(function(e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this);
        if (!$item.hasClass('disabled')) {
            navListItems.closest(".stepwizard-step").removeClass('btn-primary');
            $item.closest(".stepwizard-step").addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });
    allNextBtn.click(function() {
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a.navButton[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url'],input[type='number'],input[type='email'],input[type='checkbox']"),
            isValid = true;
        $(".form-group").removeClass("has-error");
        var chkCheck = true;
        for (var i = 0; i < curInputs.length; i++) {
        	chkCheck = true;
        	if($(curInputs[i]).attr("type") == "checkbox") {
                var chkName = $(curInputs[i]).attr("name");
                $("input[name='"+chkName+"']").closest(".form-group").find(".error-message").hide();
                $("input[name='"+chkName+"']").closest(".form-group").removeClass("has-error");
                if(!$("input[name='"+chkName+"']:checked").length && chkCheck){
	                chkCheck = false;
	                isValid = false;
	                $("input[name='"+chkName+"']").closest(".form-group").find(".error-message").show();
	                $("input[name='"+chkName+"']").closest(".form-group").addClass("has-error");
                }
        	}
            if (!curInputs[i].validity.valid) {
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }
        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });
    allPrevBtn.click(function() {
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            prevStepWizard = $('div.setup-panel div a.navButton[href="#' + curStepBtn + '"]').parent().prev().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url'],input[type='number'],input[type='email']"),
            isValid = true;
        prevStepWizard.removeAttr('disabled').trigger('click');
    });
    $('div.setup-panel div .navButton.first').trigger('click');

    $("#phone").mask("(999) 999-9999");

    //Upload Sample Logo Image
    var storedFiles = [];
    var namess = $('#uploadfiles_name').val();
    var file_name_store = [];
    var sample_file_total = [];
    $('body').on('change', '.user_picked_files', function() {
        var files = this.files;
        var i = 0;
        $(".cvf_uploaded_files").html('');
        for (i = 0; i < files.length; i++) {
            var readImg = new FileReader();
            var file = files[i];
            if (file.type.match('image.*')) {
                storedFiles.push(file);
                readImg.onload = (function(file) {
                    return function(e) {
                        $('.cvf_uploaded_files').append(
                            "<li file = '" + file.name + "'>" +
                            "<img class = 'img-thumb' src = '" + e.target.result + "' height = '20px' width = '50px' />" +
                            "<a href = '#' class = 'cvf_delete_image' title = 'Cancel'>Delete</a>" +
                            "</li>"
                        );
                    };
                })(file);
                readImg.readAsDataURL(file);
            } else {
                alert('the file ' + file.name + ' is not an image<br/>');
            }
            sample_file_total.push(file.name);
            document.getElementById('sample_file_total').value = sample_file_total.join();
        }
    });

    function remove(array, element) {
        return array.filter(e => e !== element);
    }
    $('body').on('click', 'a.cvf_delete_image', function(e) {
        e.preventDefault();
        $(this).parent().remove('');
        var file = $(this).parent().attr('file');
        file_name_store.push(file);
        document.getElementById('uploadfiles_name').value = file_name_store.join();
    });

    /*End Sample Logo Images*/

    //Document and Image Upload
    var storedFiles2 = [];
    var namess2 = $('#uploadfiles_name').val();
    var file_name_store2 = [];
    var sample_file_total2 = [];
    $('body').on('change', '.user_help_files', function() {
        var files = this.files;
        var i = 0;
        $(".cvf_uploaded_help_files").html('');
        for (i = 0; i < files.length; i++) {
            var readImg = new FileReader();
            var file = files[i];
            if (file.type.match('image.*')) {
                storedFiles2.push(file);
                readImg.onload = (function(file) {
                    return function(e) {
                        $('.cvf_uploaded_help_files').append(
                            "<li file = '" + file.name + "'>" +
                            "<img class = 'img-thumb' src = '" + e.target.result + "' height = '20px' width = '50px' />" +
                            "<a href = '#' class = 'cvf_delete_help_image' title = 'Cancel'>Delete</a>" +
                            "</li>"
                        );
                    };
                })(file);
                readImg.readAsDataURL(file);
            } else {
                alert('the file ' + file.name + ' is not an image<br/>');
            }
            sample_file_total2.push(file.name);
            document.getElementById('deigner_help_file_total').value = sample_file_total2.join();
        }
    });

    function remove(array, element) {
        return array.filter(e => e !== element);
    }
    $('body').on('click', 'a.cvf_delete_help_image', function(e) {
        e.preventDefault();
        $(this).parent().remove('');
        var file = $(this).parent().attr('file');
        file_name_store2.push(file);
        document.getElementById('deigner_help_files_name').value = file_name_store2.join();
    });

    /*End Document and Image*/

    //Select Package 
    $(document).on("click", ".selectpackage", function (e) {    
//        e.preventDefault();
        var package_name = $(this).attr("name");
        var package_amount = $(this).attr("amount");
        document.getElementById('package_name').value = package_name;
        document.getElementById('package_amount').value = package_amount;
    });
    /* End Select Package */

    //Select Addon 
        $('body').on('click', 'a.add_adon', function(e) {
        e.preventDefault();
        var addon_name = $(this).attr("title");
        var addon_amount = $(this).attr("amount");
        document.getElementById('addon_name').value = addon_name;
        document.getElementById('addon_amount').value = addon_amount;
    });
    /* End Addon */
});