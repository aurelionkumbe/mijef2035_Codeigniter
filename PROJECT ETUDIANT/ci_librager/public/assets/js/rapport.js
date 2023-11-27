

function insert_action() {

    $('#ajouter-action-submit').click(function (event) {

        event.preventDefault();

        var datas = {
            'numeroRapport': $('#rapport-numero').val(),
            'intitule': $('#intitule-action').val(),
            'echeance': $('#echeance-travail').val(),
            'personneAssigne': $('#personne-assigne-action').val(),
        };

        console.log(datas);


        console.log('data transfert');
        path = siteUrl + 'action/ajouter'
        $.post(path, datas, function (result, textStatus, xhr) {
            //success
            //console.log('la reponse en JSON');
            //console.log($.parseJSON(result));

            res = $.parseJSON(result);
            act = res.data;

            if (res['status'] = 'OK') {
                $.notify('nouvelle action insérée', 'success');
                /*
                 html = ''
                 + '<li class="list-group-item">'
                 + '<b>' + act.intitule + '</b><br>'
                 + '<small class="text-muted">à éffectué avant ' + act.echeance + ' minutes par ' + act.nom_concerne + '</small>'
                 + '<a title="supprimés cette tache" class="badge remove pull-right" href="' + siteUrl + 'rapports/supprimer/action/' + act.id + '">'
                 + '<span class="mif-bin mif-1x">supprimé</span>'
                 + '</a>'
                 + '</li>';
                 $('#liste-des-actions').append(html);
                 nbAct = $('#nb-act').val();
                 nbAct++;
                 $('#nbr-act-label').text(nbAct);
                 $('#nb-act').val(nbAct);
                 $('#intitule-action, #echeance-action, #personne-assigne-action').val('');
                 $('#intitule-action').focus();
                 */
                //fail
            } else {
                $.notify('echec d\'insertion ', 'error');
                //$('#flashAlert').removeClass('alert-success').addClass('alert-danger').show().find('span').text('échec');
                //console.log(res);
            }
            //always
            //$('#flashAlert').fadeOut('slow/4000/fast');

            //TODO on masque le form et on rafraichie 
            window.location.reload();
            $('#intitule-action').val('');
            $('#echeance-travail').val('');
        });

    })
}

function insert_travail() {
    $('#problemes').click(function (event) {
        $(this).val('');
        $(this).off();
    });
    $('#ajouter-travail-submit').click(function (event) {

        event.preventDefault();
        nbrPb = $('#nbr-pb').val();
        var datas = {
            'numeroRapport': $('#rapport-numero').val(),
            'intitule': $('#intitule-travail').val(),
            'heure_debut': $('#heuredeb').val(),
            'heure_fin': $('#heurefin').val(),
            'nbrPb': $('#nbr-pb').val(),
            'superviseurid': $('#superviseur').val(),
            'problemes': []
        };
        for (var i = 1; i <= nbrPb; i++) {
            datas['problemes'].push({
                "intitule": $("#liste-pb tbody #intitule-pb" + i + "").val(),
                "description": $("#liste-pb tbody #description-pb" + i + "").val(),
            });
        }

        //console.log('problemes');
        //console.log(datas['problemes']);
        //console.log('data transfert');
        path = siteUrl + 'travail/ajouter';
        $.post(path, datas, function (result, textStatus, xhr) {
            //success
            //console.log('la reponse en JSON');
            //console.log($.parseJSON(result));


            res = $.parseJSON(result);
            trav = res.data;
            console.log(trav);
            if (res['status'] = 'OK') {
                $('#flashAlert').removeClass('alert-danger').addClass('alert-success').show().find('span').text('ajouté');
                $.notify('une nouvelle realisation inséré', 'success')
                // on ajoute le travail a la liste
                /*
                html = ''
                        + '<li class="list-group-item">'
                        + '<b>' + trav.intitule + '</b><br>'
                        + '<small class="text-muted"> éffectué de ' + trav.heure_debut + 'à ' + trav.heure_fin + ', supervise par: ' + datas['intitule'] + '</small>'
                        + '<span class=" pull-right">'
                        + '<button class="btn btn-sm btn-default show-pb-btn" type="button" data-slidetoggle="#pb-de-' + datas['id'] + '">problemes liés <span class="caret"></span> </button>'
                        + '<a  title="supprimés ce travail" class=" badge remove-travail" href="' + siteUrl + 'rapports/supprimer/travail/' + trav.id + '" > <span class="mif-bin mif-1x">suppimé</span> </a>&nbsp;&nbsp;'
                        + '</span>'
                        + '<div hidden id="pb-de-' + trav.id + '"  class="well well-sm pb">';
                if (trav.pb.length != 0) {
                    for (var i = trav.length - 1; i >= 0; i--) {
                        html += '';
                        +'<div class="row" style="border-bottom: 1px dotted white;">'
                                + '<b>' + trav.pb[i]['intitule'] + '</b><br>'
                                + '<span style="overflow: hidden;">' + trav.pb[i]['description'] + '</span>'
                                + '</div>';
                    }
                    $('#travauxId').html(html);
                } else {
                    html += '<div class="text-center text-success">Aucun probleme rencontré.</div>';
                }
                +'</div></li>';
                $('#liste-des-travaux').append(html);
                nbTrav = $('#nb-trav').val();
                nbTrav++;
                $('#nbr-trav-label').text(nbTrav);
                $('#nb-trav').val(nbTrav);

                $('#liste-pb tbody').html('');
                $('#nbr-pb-label').text('0');
                $('#nbr-pb').val(0);
                $('#intitule-travail, #heuredeb, #heurefin').val('');
                $('#intitule-travail').focus();
                */
                //fail
            } else {
                $.notify('echec d\'insertion', 'error')
                //$('#flashAlert').removeClass('alert-success').addClass('alert-danger').show().find('span').text('échec');
                console.log(res);
            }
            //always
            //$('#flashAlert').fadeOut('slow/4000/fast');

            //TODO on masque le formulaire et on rafraichi la page
            window.location.reload();
            $('#intitule-travail').val();
            $('#heuredeb').val();
            $('#heurefin').val();
        });
        //get_travaux();
    });
}

function ajouter_probleme_liste() {
    nbrPb = 0;
    $('#nbr-pb-label').text(nbrPb);
    $('#ajouter-pb').click(function (event) {
        event.preventDefault();
        intitule = $('#intitule-pb').val();
        description = $('#description-pb').val();
        nbrPb = $('#nbr-pb').val();
        html = '';
        if (intitule != "") {
            if (nbrPb == 0) {
                html = '<tr>' + '<th>intitule</th>' + '<th>description</th>' + '<th class="action"><a href=""><span class="mif-plusss">&nbsp;</span></a> &nbsp;</th>' + '</tr>';
                $('#liste-pb tbody').html('');
                $('#liste-pb tbody').append(html);
            }
            nbrPb++;
            $('#nbr-pb-label').text(nbrPb);
            $('#nbr-pb').val(nbrPb);

            html = '<tr class="pb" id="pb-' + nbrPb + '"><td><input type="text" id="intitule-pb' + nbrPb + '" name="intitule' + nbrPb + '" disabled value="' + intitule + '">' + '</td><td>' + '<input type="text" id="description-pb' + nbrPb + '" name="description' + nbrPb + '" disabled value="' + description + '"></td><td><span data-close="#pb-' + nbrPb + '" class="remove mif-cross"></span></td></tr>';
            $('#liste-pb tbody').append(html);
            nbrPb = 0;
            // ecouter la supp de pb
            remove_pb();
            //vide les formulaires
            $('#intitule-pb').val("");
            $('#description-pb').val("");
        }
        //always
        $('#intitule-pb').focus();

    });
}

function ajax_get_delete(path, $elementToRemove) {
    $.get(path, function (res) {
        if (res != 'failed') {
            $('#flashAlert').removeClass('alert-danger').addClass('alert-success').show().find('span').text('supprimé');
            $elementToRemove.remove();
            //fail
        } else {
            $('#flashAlert').removeClass('alert-success').addClass('alert-danger').show().find('span').text('échec');
            console.log(res);
        }
        //always
        $('#flashAlert').fadeOut('slow/4000/fast');
        /*optional stuff to do after success */
    });

}

function ajax_post_insert(path, datas) {

    $.post(path, datas, function (res, textStatus, xhr) {
        ok = false;
        //success
        if (res != 'failed') {
            ok = true;
            $('#flashAlert').removeClass('alert-danger').addClass('alert-success').show().find('span').text('ajouté');
            //fail
        } else {
            $('#flashAlert').removeClass('alert-success').addClass('alert-danger').show().find('span').text('échec');
            console.log(res);
        }
        //always
        $('#flashAlert').fadeOut('slow/4000/fast');
        return ok;
    });

}

function get_travaux() {
    var trav;
    path = siteUrl + 'rapports/get_travaux';
    //console.log(travaux);

    $.get(path, function (travaux) {
        //console.log( JSON.parse(travaux));
        $.getJSON(path, function (t) {
            var html = '';
            for (var i = t.length - 1; i >= 0; i--) {
//                console.log(t[i].intitule);
                html += '' + '<option value="' + t[i].id + '">' + t[i].intitule + '</option>'
            }
            $('#travauxId').html(html);
        });
    });
}

function remove_pb() {
    $('#liste-pb tbody .remove').click(function (event) {
        $(this).parents('tr').remove();
        count_trav_pb();
    });
}

function remove_action() {
    $('#liste-des-actions .remove-action').click(function (event) {
        event.preventDefault();

        path = $(this).attr('href');
        $that = $(this);
        $.get(path, function (result) {
            if (result == 'OK') {
                $that.parents('li.list-group-item').slideUp().remove();
            }
        });
    });
}

function remove_travail() {
    $('#liste-des-travaux .remove-travail').click(function (event) {
        event.preventDefault();
        path = $(this).attr('href');
        $that = $(this);
        $.get(path, function (result) {
            console.log(result);
            if (result == 'OK') {
                $that.parents('li.list-group-item').slideUp().remove();
                count_travaux();
                /*
                 nbTrav = $('#nb-trav').val();
                 --nbTrav;
                 console.log(nbTrav);
                 $('#nbr-trav-label').text(nbTrav);
                 $('#nbr-trav').val(nbTrav);*/

            }
        });
    });
}


function count_travaux() {
    nb = $("#liste-des-travaux li").length;
    nb = $('#nb-trav').val();
    $('#nbr-trav-label').text(nb);
}
function count_actions() {
    nb = $("#liste-des-actions li").length;
    console.log(nb);
    nb = $('#nb-act').val();
    $('#nbr-act-label').text(nb);
}
function count_trav_pb() {
    nbPb = $("#liste-pb tbody tr.pb").length;
    console.log(nbPb);
    $('#nbr-pb').val(nbPb);
    $('#nbr-pb-label').text($('#nbr-pb').val());
}