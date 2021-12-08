
<!-- dump -->
<?php // echo '<pre>'; var_dump($_SESSION);  ?>
<?php if(!empty($_SESSION['successo'])): ?>

  <!-- success -->
  <br>
  <div class="alert alert-success" role="alert">
    <?php echo $_SESSION['successo']; ?>
  </div>
  <br>

<?php elseif(!empty($_SESSION['errore'])): ?>
  
  <!-- error -->
  <br>
  <div class="alert alert-danger" role="alert">
    <?php echo $_SESSION['errore']; ?>
  </div>
  <br>

<?php endif; ?>

<script>
// TODO: sweat alert che non va , va bene anche senza 
    // $('.btn btn-danger').click(function (){
    //     Swal.fire({
    //     position: 'top-end',
    //     icon: 'success',
    //     title: 'Your work has been saved',
    //     showConfirmButton: false,
    //     timer: 1500
    // })
    // });
  </script>
