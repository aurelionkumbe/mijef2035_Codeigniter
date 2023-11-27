$(document).ready(function () {

    $('#cke_1_contents .cke_wysiwyg_frame .cke_editable').click(function (e) {
        e.preventDefault();
        $(this).hide();
    });
    enable_jConfirm();
    enable_bdt('#articles-table');
});

function enable_bdt(selector) {
    $(selector).bdt();
}
;

// active le plugin jquery text editor et customise les champs de texte
function enblableTextEditor(selector, enabled) {
    if (enabled) {
        $(selector).jqte();
        $('[data-toggle="jqtext"]').jqte();

        // settings of status
        var jqteStatus = true;
        $(".status").click(function () {
            jqteStatus = jqteStatus ? false : true;
            $(selector).jqte({"status": jqteStatus})
        });
    }
}

function enable_bootstrap_tooltip() {
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
}

function enable_bootstrap_popover() {
    $(function () {
        $('[data-toggle="popover"]').popover({
            delay: {"show": 500, "hide": 100}
        });
    });
}



function enable_printme(selector, target) {
    $(selector).click(function () {
        $(target).printMe({
            "path": ["bootstrap.min.css"]
        });
    });
}

function enable_jConfirm() {
    $('body').on('click', '[data-toggle="jconfirm"]', function (e) {
        e.preventDefault();
        $(this).jConfirm({
            message: 'You sure you to delete this?',
            confirm: 'YES',
            cancel: 'NO!',
            openNow: this,
            callback: function (elem) {
                console.log('confirm callback in action');
                document.location.href = $(elem).attr('href');
            }
        });
    });
}

function enable_printme_nocss(selector, target) {
    $(selector).click(function () {
        $(target).printMe();
    });
}


function enable_select2() {
    $(function () {
        $('[data-toggle="select2"]').select2({
            theme: "bootstrap",
            placeholder: "choix multiple",
            //maximumSelectionSize: 6,
        });
    });
}



// TODO interdire les dates inferieur a aujourd'hui
function timepicker(selector) {
    'use strict';
    $(selector).datetimepicker({
        format: 'hh:mm:ss'
    });
}

function datepicker(selector) {
    'use strict';
    $(selector).datetimepicker({
        format: 'YYYY-MM-DD'
    });
}



function enable_jqxcombobox(idElement, source, log) {
    var src = source;

    // Create a jqxComboBox
    $(idElement).jqxComboBox({
        source: src,
        multiSelect: true,
        width: '100%',
        height: 34,
        showArrow: true,
        autoDropDownHeight: true
    });
    //$(idElement).jqxComboBox('selectItem', 'United States');
    //$(idElement).jqxComboBox('selectItem', 'Germany');

    // trigger selection changes.
    $(idElement).on('change', function (event) {
        var items = $(idElement).jqxComboBox('getSelectedItems');
        var selectedItems = "";
        $.each(items, function (index) {
            selectedItems += this.label;
            if (items.length - 1 != index) {
                selectedItems += ";;";
            }
        });
        $(log).val(selectedItems);
    });
}



function datetimepicker(selector) {
    'use strict';
    $(selector).datetimepicker({
        format: 'YYYY-MM-DD'
    });
}

// verifie que le format et les regles sur les informations remplis dans le formulaire sont valides
function validation_de_formulaire(selector) {
    $(selector).validate({
        submitHandler: function () {
            //alert("Submitted, thanks!");
            ajaxSubmit($(selector));
        },
        rules: {
            nom: {
                required: true,
                minlength: 2
            },
            prenom: {
                required: true,
                minlength: 2
            }
        },
        messages: {
            nom: "Donnez votre nom",
            prenom: "Donnez votre prenom"
        }
    });

}

