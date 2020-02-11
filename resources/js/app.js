/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
$(document).ready(function() {


    $(document).ready(function() {
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
                emptyTable: "Aucune dealer dans le tableau"
            }
        });

    });


});