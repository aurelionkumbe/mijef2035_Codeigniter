jQuery(document).ready(function ($)  //debut
{
    // TODO donnez les droit d access au dossier views pour la fonction $().load()
    $('#load').load(viewUrl + '../todo.php');

    'use strict';



    enable_confirm();
    contentSwapper();
    book_tile_detail_reveal();
    datetimepicker('.datetimepicker, #dateRetour, #dateEmprunt, #datetimepicker1, #date-naissance-personne, #dateParution');
    adminButtonNav();
    change_nombre_livre_par_vue;

//appel de bootstrap-data-table
    $('#admin-persons-table, #admin-books-table, #admin-loans-table').bdt();

    $('#page-rows-form label').html('Voir par&nbsp;');

//JQuery TextEditor
    //console.log($.tinymce());
    enblableTextEditor('.jqte-test', true);

});//fin



// detecte le click et lance le formulaire approrie dans la boitre modale

function adminButtonNav() {
    $('#admin-btn-nav button').click(function (event) {
        event.preventDefault();
        modal = $(this).attr('data-target');
        form = $(this).attr('data-formulaire');
        //text = $(form).parent().html();
        $modaBody = $(modal + ' .modal-body');
        //console.log($modaBody.html(text));
        $modaBody.find('form').removeClass('submittable');
        $modaBody.find(form).addClass('submittable').show().siblings().hide();

        submitChange();
    });
}


// ecoute le bouton qui permet de lancer le formulaire qui est a l interieur de la modal box
function submitChange() {
    $modaBody = $('#myModal .modal-body');
    $modaTitle = $('#myModal .modal-title');
    $form = $modaBody.find('form.submittable');
    validation_de_formulaire("#myModal form.submittable");
    $('#submitChange').click(function (event) {
        event.preventDefault();
        $form.submit();
        //console.log($form);
    });
}

// 
function adminSubmitForm() {

    $('#addBookForm , #addLoanForm').on('submut', function (event) {
        event.preventDefault();
        validation_de_formulaire($(this).attr('id'));
        return false;
    });
}

function ajaxSubmit(form) {

    action = form.attr('action');
    data_array = form.serializeArray();
    console.log('form ');
    console.log($form);
    console.log('action ' + action);
    console.log('donnee ');
    console.log(data_array);

    $.ajax({
        url: action,
        timeout: 3000,
        type: 'POST',
        //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
        data: data_array
    })
            .done(function (data) {
                $('#flashAlert').removeClass('alert-danger').addClass('alert-success').show().find('span').text('ajouté');
                console.log("success");
                console.log("data");
                console.log(data);
            })
            .fail(function () {
                console.log("error");
                $('#flashAlert').removeClass('alert-success').addClass('alert-danger').show().find('span').text('échec');
            })
            .always(function () {
                setTimeout(function () {
                    $('#flashAlert').fadeOut('slow/4000/fast');
                }, 1000);
                form.find('input').val('');

                console.log("complete");
            });
}


// detecte la souri a dessus des tiles des livres et revele les details masques
function book_tile_detail_reveal(argument) {
    $('#Books .book-tile').each(function () {
        $(this).hover(function () {
            $titre = $(this).find('.titre');
            $detail = $(this).find('.detail');
            $titre.hide();
            $detail.fadeIn();

        }, function () {
            $detail.stop().hide();
            $titre.fadeIn('slow');
        });
    });
}
function change_nombre_livre_par_vue() {
    $('body').on('change', '#nombre-livre', function () {
        alert($(this).val());
    })
}
