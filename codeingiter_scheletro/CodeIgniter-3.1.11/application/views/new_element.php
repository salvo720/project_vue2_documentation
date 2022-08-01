<style>
    .space_element {
        height: 50px;
    }
</style>
<?php
//  echo '<pre>';
//  var_dump($page_var["result"]);
?>
<!-- i dati si trovano in page_var , per implementazione del template   -->
<div class="space_element"></div>
<div class="container">
    <form class="row g-3" method="POST" action="<?php echo site_url('Elementi_Crud_Controller/insert_new_element'); ?>">

        <!-- form elelemti visibili -->
        <div class="col-md-4">
            <label for="Nome_elemento" class="form-label">Nome elemento</label>
            <input type="text" name="Nome_elemento" class="form-control" id="id_Nome_elemento">
        </div>
        <div class="col-md-4">
            <label for="Numero_elemento" class="form-label">Numero elemento</label>
            <input type="text" name="Descrizione_elemento" class="form-control" id="id_Descrizione_elemento">
        </div>
        <div class="col-4">
            <label for="Tipologia" class="form-label">Tipologia</label>
            <input type="text" name="Tipologia" class="form-control" id="id_Tipologia">
        </div>
        <div class="col-6">
            <label for="Quantita" class="form-label">Quantita</label>
            <input type="text" name="Quantita" class="form-control" id="id_Quantita" placeholder="Inserisci la quantita nel magazzino">
        </div>
        <div class="col-md-6">
            <label for="Prezzo" class="form-label">Prezzo</label>
            <input type="text" name="Prezzo" class="form-control" id="id_Prezzo">
        </div>
        <div class="col-12">
            <button type="submit" value="Submit" class="btn btn-primary">Manda</button>
        </div>
    </form>
</div>