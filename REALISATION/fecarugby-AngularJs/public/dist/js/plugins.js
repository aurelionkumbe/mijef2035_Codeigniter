$(document).ready(function () {

});


function enblableDatatables(selector_id, enable) {
    if (enabled) {
        $(selector_id).DataTable();
    }
}
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
    })
}

function enable_printme(selector, target) {
    $(selector).click(function () {
        $(target).printMe({
            "path": ["bootstrap.min.css"],
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
        $('body [data-toggle="select2"]').select2({
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
        format: 'hh:mm:ss',
    });
}

function datepicker(selector) {
    'use strict';
    $(selector).datetimepicker({
        format: 'YYYY-MM-DD',
    });
}
function enable_jConfirm() {
    $('body').on('click', '[data-toggle="jconfirm"]', function (e) {
        e.preventDefault();
        $(this).jConfirm({
            message: 'Supprimer vraiment?',
            confirm: 'OUI',
            cancel: 'NON!',
            openNow: this,
            callback: function (elem) {
                console.log('confirm callback in action');
                document.location.href = $(elem).attr('href');
            }
        });
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
