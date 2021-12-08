<style>
    .space_element{
    height:50px;
    }
</style>
<?php
//  echo '<pre>';
//  var_dump($page_var["result"][0]);
  ?>
 <!-- i dati si trovano in page_var , per implementazione del template   -->
<div class="space_element"></div>
<div class="container">
    <form class="row g-3" method="POST" action="<?php echo site_url('Produttori_Crud_Controller/execute_update/'); echo (!empty($page_var['id'])) ?  $page_var['id'] : '' ; ;?>">
        <!-- elelemnti nascosti fino alla classe di spazio  -->
        <!-- form elelemti visibili -->
        <div class="col-md-4">
            <label for="Nome_elemento" class="form-label">Nome Produttore</label>
            <input type="text" name="Nome_Produttore" class="form-control" id="id_Nome_elemento" value="<?php echo $page_var["result"][0]->nome_produttore?>">
        </div>
       
        <div class="col-md-4">
            <label for="Numero_elemento" class="form-label">Numero Partita Iva Produttore</label>
            <input type="text" name="Numero_Partita_Iva_Produttore" class="form-control" id="id_Numero_elemento"  value="<?php echo $page_var["result"][0]->partita_iva_produttore ?>">
        </div>
        <div class="col-4">
            <label for="Tipologia" class="form-label">Id Elemento</label>
            <input type="text" name="Id_Elemento" class="form-control" id="id_Tipologia" value="<?php echo $page_var["result"][0]->id_element ?>">
        </div>
        <div class="col-12">
            <button type="submit" value="Submit" class="btn btn-primary">Manda</button>
        </div>
    </form>
</div>