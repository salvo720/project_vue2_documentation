<style>
    .space_element {
        height: 50px;
    }
</style>

<div class="space_element"></div>
<div class="container">
    <table class="table table-bordered border-dark" id="table_show_elements">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome elemento</th>
                <th scope="col">Descrizione elemento</th>
                <th scope="col">Tipologia</th>
                <th scope="col">Quantita</th>
                <th scope="col">Prezzo</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>
        <!-- <tbody>
        <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        </tr>
        <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
        </tr>
        <tr>
        <th scope="row">3</th>
        <td colspan="2">Larry the Bird</td>
        <td>@twitter</td>
        </tr>
    </tbody> -->
    </table>
</div>

<script>
    var detail_element = '<?php echo site_url('Elementi_Crud_Controller/detail_element/'); ?>';
    var update_element = '<?php echo site_url('Elementi_Crud_Controller/update_element/'); ?>';
    var delete_element = '<?php echo site_url('Elementi_Crud_Controller/delete_element/'); ?>';

    $('#table_show_elements').DataTable({
        ajax: {
            url: '<?php echo site_url('Elementi_Crud_Controller/index_injson') ?>',
            type: "POST",
        },
        // modifica rapida : elelementi tabella 
        // cambia i nomi di data con quelli estratti 
        columns: [{
                data: "id"
            },
            {
                data: 'nome'
            },
            {
                data: 'descrizione'
            },
            {
                data: 'tipologia'
            },
            {
                data: 'quantita'
            },
            {
                data: 'prezzo'
            },
            // dettaglio button  , // update button  , // delete button
            {
                data: "id",
                render: function(data) {
                    return "<button class='btn btn-info' onclick=window.location.href='" + detail_element + data + "'> Detail </button> " +
                        "&nbsp; <button class='btn btn-warning' onclick=window.location.href='" + update_element + data + "'> Edit </button>" +
                        "&nbsp; <button class='btn btn-danger' onclick=window.location.href='" + delete_element + data + "'>  Delete </i></button>"
                }
            },
        ],
        language: {
            "lengthMenu": "Visualizza _MENU_ record per pagina",
            "zeroRecords": "Niente trovato - mi dispiace",
            "info": "Visualizzazione della pagina _PAGE_ di _PAGES_",
            "infoEmpty": "Nessun record disponibile",
            "infoFiltered": "(filtrato da _MAX_ record totali)",
            "search": "Cerca",
            paginate: {
                "previous": "Precedente",
                "next": "Succesivo",
            },
        },

    });
</script>