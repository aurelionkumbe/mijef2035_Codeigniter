$(document).ready(function () {

    // validation de formulaire

    //message d'erreur
    var error_on_field = "<small class=\"text-warning\"><span class=\"mif-warning\"></span> veillez corrigé ce champ</small>";

    // appel de validation et soumission
    var validate = $("addAuthorForm").validate({submitHandler: function (a) {
            a.submit()
        }, rules: {nom: {required: true, minlength: 1, maxlentgh: 50}, prenom: {required: true, minlength: 1, maxlentgh: 50}}, messages: {nom: error_on_field, prenom: error_on_field}});
    $("#add-edition-form ").validate({submitHandler: function (a) {
            a.submit()
        }, rules: {nom: {required: true, minlength: 1, maxlentgh: 50}, pays: {required: true, minlength: 1, maxlentgh: 50}}, messages: {nom: error_on_field, pays: error_on_field}});
    $("#add-categorie-form ").validate({submitHandler: function (a) {
            a.submit()
        }, rules: {nom: {required: true, minlength: 1, maxlentgh: 50}}, messages: {nom: error_on_field}});
    $("#add-catalogue-form ").validate({submitHandler: function (a) {
            a.submit()
        }, rules: {nom: {required: true, minlength: 1, maxlentgh: 50}}, messages: {nom: error_on_field}});
    $("#addRayonForm").validate({submitHandler: function (a) {
            a.submit()
        }, rules: {nom: {required: true, minlength: 1, maxlentgh: 50}}, messages: {nom: error_on_field}});
});





function enable_confirm() {
    $('body').on('click', '[data-toggle=confirm]', function (event) {
        event.preventDefault();
        $.confirm({
            title: 'Title here',
            content: VIEWPATH + 'layouts/addLoanForm.php',
            confirmButton: false,
            cancelButton: false,
            animation: 'scale',
            onOpen: function () {
                var that = this;
                this.$content.find('button').click(function () {
                    that.$content.html('As simple as that !');
                });
            }
        });
    });
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
            $(selector).jqte({"status": jqteStatus});
        });
    }
    ;
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
        $(target).printMe();
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

function enable_select2() {
    $(function () {
        $('[data-toggle="select2"]').select2({theme: "bootstrap", placeholder: "choix multiple"})
    })
}
;

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


function datetimepicker(selector) {
    'use strict';
    $(selector).datetimepicker({
        format: 'YYYY-MM-DD'
    });
}


// verifie que le format et les regles sur les informations remplis dans le formulaire sont valides
function validation_de_formulaire(selector) {
    $(selector).validate({
        submitHandler: function (form) {
            //alert("Submitted, thanks!");
            //ajaxSubmit($(selector));
            form.submit();
        },
        rules: {
            cnom: {
                required: true,
                minlength: 1
            },
            prenom: {
                required: true,
                minlength: 1
            }
        },
        messages: {
            nom: "Donnez votre nom",
            prenom: "Donnez votre prenom"
        }
    });

}


// active le plugin jquery text editor et customise les champs de texte
function enblableTextEditor(selector, enabled) {
    if (enabled) {
        $(selector).jqte();

        // settings of status
        var jqteStatus = true;
        $(".status").click(function () {
            jqteStatus = jqteStatus ? false : true;
            $(selector).jqte({"status": jqteStatus});
        });
    }
}

function contentSwapper() {

    content = $('#admin-nav').attr('data-container');
    if (document.location.hash) {
        //console.log(document.location.hash);
        $(content).find(document.location.hash).show().siblings().hide();
        $('#admin-nav li').removeClass('active').find('button, .btn').hide();
        ;
        $('#admin-nav li a').removeClass('w3-theme-d3');
        $('a[href=' + document.location.hash + ']').addClass('w3-theme-d3').find('button, .btn').show().parent('li').addClass('active');

    }

    $('#admin-nav li').click(function (event) {
        event.preventDefault();
        $('#admin-nav').find('a').removeClass('w3-theme-d3');
        $(this).addClass('active').siblings().removeClass('active');
        target = $(this).find('a').addClass('w3-theme-d3').attr('href');
        $(content).find(target).show().siblings().hide();

        //pour afficher les boutons dans les elements de la liste
        $(this).parent().find('button, .btn').hide();
        $(this).find('button, .btn').show();
    });
}