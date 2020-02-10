/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
$(document).ready(function() {

    var serial_value = '';
    var serial_data = '';

    $("#o--tasks").hide();
    $("#o--info").hide();

    $(document).ready(function() {
        $('#serials-table').DataTable({
            language: {
                processing: "Traitement en cours ...",
                search: "Rechercher&nbsp;:&nbsp;",
                lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
                zeroRecords: "Aucun r&eacture;sultat",
                info: "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                paginate: {
                    first: "Première page",
                    previous: "Pr&eacute;c&eacute;dent",
                    next: "Suivant",
                    last: "Dernière page",
                },
                emptyTable: "Aucune donn&eacute;e dans le tableau"
            }
        });
        $('#fleet-table').DataTable({
            language: {
                processing: "Traitement en cours ...",
                search: "Rechercher&nbsp;:&nbsp;",
                lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
                zeroRecords: "Aucun r&eacture;sultat",
                info: "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                paginate: {
                    first: "Première page",
                    previous: "Pr&eacute;c&eacute;dent",
                    next: "Suivant",
                    last: "Dernière page",
                },
                emptyTable: "Aucune donn&eacute;e dans le tableau"
            }
        });
        $('#dealers-table').DataTable({
            language: {
                processing: "Traitement en cours ...",
                search: "Rechercher&nbsp;:&nbsp;",
                lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
                zeroRecords: "Aucun r&eacture;sultat",
                info: "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                paginate: {
                    first: "Première page",
                    previous: "Pr&eacute;c&eacute;dent",
                    next: "Suivant",
                    last: "Dernière page",
                },
                emptyTable: "Aucune donn&eacute;e dans le tableau"
            }
        });
    });
    
    $("#serial-checker").on('input',function(e) {
        
        serial_value = e.target.value;

        if(serial_value.length >= 8) {
            
            $.ajax({
                type:'GET',
                url: 'http://fleetmanager.mac/api/serials/search/'+serial_value,
                success:function(data) {
                    serial_data = data;
                    if(!$.isEmptyObject(serial_data)) {
                        if(serial_data.status == "available") {
                            $("#serial-info").html('<div class="flatnotification flatnotification-primary">"Vous devez d\'abord <a href="#">enregistrer ce vélo</a> avant mise en circulation.</div>');

                        } else {
                            $("#serial-info").html('<div class="flatnotification flatnotification-success">Nous recherchons les révisions existantes pour ce vélo ...</div>');
                            $("#o--tasks").fadeIn();
                        }
                    } else {
                        $("#serial-info").html('<div class="flatnotification flatnotification-destroy">Le numéro de série n\'a pas été reconnu.</div>');
                    }
                }
            });
        } else {
            $("#serial-info").html('');
        }

    });

    $("#fleet-checker").on('input', function(e) {

        serial_value = e.target.value;

        if(serial_value.length >= 8) {
            console.log('Length is 8');
            $.ajax({
                type:'GET',
                url: 'http://fleetmanager.mac/api/serials/search/'+serial_value,
                success:function(data) {
                    serial_data = data;
                    if(!$.isEmptyObject(serial_data)) {
                        if(serial_data.status == "used") {
                            $("#fleet-info").html('<div class="flatnotification flatnotification-danger">Ce numéro de série est déjà utilisé.</div>');

                        } else {
                            $("#fleet-info").html('<div class="flatnotification flatnotification-success">Ce numéro de série est disponible.</div>');
                            $("#o--info").fadeIn();
                        }
                    } else {
                        $("#fleet-info").html('<div class="flatnotification flatnotification-destroy">Le numéro de série n\'a pas été reconnu.</div>');
                    }
                },
                error: function()
                {
                    console.log('Error');
                }
            });

        } else {
            $("#fleet-info").html('');
            $("#o--info").fadeOut('fast');
        }

    })

});