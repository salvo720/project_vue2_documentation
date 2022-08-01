<style>
    .space_element {
        height: 50px;
    }
</style>

<div class="space_element"></div>
<div class="container">
    <table class="table table-bordered border-dark" id="table_detail_element">
        <thead>
            <tr>
                <th scope="col">ID Elemento</th>
                <th scope="col">Nome elemento</th>
                <th scope="col">Descrizione elemento</th>
                <th scope="col">Tipologia</th>
                <th scope="col">Quantita</th>
                <th scope="col">Prezzo</th>
                <th scope="col">ID produttore</th>
                <th scope="col">Nome Produttore</th>
                <th scope="col">Partita Iva Produttore</th>
                <!-- <th scope="col">Azioni</th> -->
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
    // var new_element_productor = '<?php echo site_url('Elementi_Crud_Controller/new_element_productor/'); ?>';
    // var update_element_productor = '<?php echo site_url('Elementi_Crud_Controller/update_element_productor/'); ?>';
    // var delete_element_productor = '<?php echo site_url('Elementi_Crud_Controller/delete_element_productor/'); ?>';
    var id_elemento = '<?php echo $page_var['id'] ?>';

    $('#table_detail_element').DataTable({
        ajax: {
            url: '<?php echo site_url('Elementi_Crud_Controller/detail_element_injson/') ?>' + id_elemento,
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
            {
                data: 'id_produttore'
            },
            {
                data: 'nome_produttore'
            },
            {
                data: 'partita_iva_produttore'
            },
            // azioni sui produttori (tabella2)

            // { 
            //     render : function( data , type , row , full){
            //     return "<button class='btn btn-info' onclick=window.location.href='" + new_element_productor + row.id + '/' + row.id_produttore + "'> New Productor </button> "  +         
            //     "&nbsp; <button class='btn btn-warning' onclick=window.location.href='" + update_element_productor + row.id + '/' + row.id_produttore +  "'> Edit </button>" +       
            //     "&nbsp; <button class='btn btn-danger' onclick=window.location.href='" + delete_element_productor + row.id + '/' + row.id_produttore + "'>  Delete </i></button>"
            //     }
            // },
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