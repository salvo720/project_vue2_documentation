<style>
    .space_element {
        height: 50px;
    }
</style>

<div class="space_element"></div>
<div class="container">
    <table class="table table-bordered border-dark" id="table_show_productors">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome Produttore</th>
                <th scope="col">Partita Iva Produttore</th>
                <th scope="col">Id Elemento</th>
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
    var update_element = '<?php echo site_url('Produttori_Crud_Controller/update_productor/'); ?>';
    var delete_element = '<?php echo site_url('Produttori_Crud_Controller/delete_productor/'); ?>';

    /* // old call full work 
     $('#table_show_productors').DataTable({
         ajax: {
             url: '<?php echo site_url('Produttori_Crud_Controller/index_injson') ?>',
             type: "POST",
         },
         // modifica rapida : elelementi tabella 
         // cambia i nomi di data con quelli estratti 
         columns: [{
                 data: "id"
             },
             {
                 data: 'nome_produttore'
             },
             {
                 data: 'partita_iva_produttore'
             },
             {
                 data: 'id_element'
             },
             // dettaglio button  , // update button  , // delete button
             {
                 render: function(data, type, row, full) {
                     return "&nbsp; <button class='btn btn-warning' onclick=window.location.href='" + update_element + row.id + "'> Edit </button>" +
                         "&nbsp; <button class='btn btn-danger' onclick=window.location.href='" + delete_element + row.id_element + '/' + row.id + "'>  Delete </i></button>"
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
     */
    $('#table_show_productors').DataTable({
        ajax: {
            url: '<?php echo site_url('API_Controller/produttori_injson') ?>',
            type: "POST",
        },
        // modifica rapida : elelementi tabella 
        // cambia i nomi di data con quelli estratti 
        columns: [{
                data: "id"
            },
            {
                data: 'nome_produttore'
            },
            {
                data: 'partita_iva_produttore'
            },
            {
                data: 'id_element'
            },
            // dettaglio button  , // update button  , // delete button
            {
                render: function(data, type, row, full) {
                    return "&nbsp; <button class='btn btn-warning' onclick=window.location.href='" + update_element + row.id + "'> Edit </button>" +
                        "&nbsp; <button class='btn btn-danger' onclick=window.location.href='" + delete_element + row.id_element + '/' + row.id + "'>  Delete </i></button>"
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