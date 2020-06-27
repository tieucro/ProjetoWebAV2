<?php
                    
  include "conexao.php";
  $conn = connection();

  try {
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT * FROM usuario WHERE id=:id");
  $stmt->bindParam(':id', $id);
  $id           = $_GET['id'];
  $stmt->execute();

  // set the resulting array to associative
  foreach($stmt->fetchAll() as $k=>$v) {
    $id       = $v['id'];
    $nome     = $v['nome'];
    $cpf     = $v['cpf'];
    $celular  = $v['celular'];
    


  }
  } catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
  }
  $conn = null;
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>InfoGames</title>
  <?php
    include "_includes/header.php";
  ?>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<?php
    include "_includes/leftnav.php";
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dados da Usuário</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="index_dist.php">Usuário</a></li>
              <li class="breadcrumb-item active">Dados Usuário</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
    
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Dados do Usuário</h3>
          </div>
                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Usuários
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  Dados
                  <address>
                    <strong><?php echo $nome; ?></strong><br>
                    CPF: <?php echo $cpf; ?><br>
                    Phone: <?php echo $celular; ?><br>
                    CEP: <?php echo $cep; ?><br>
                  </address>
                </div>
                
              </div>
              <!-- /.row -->


            </div>          
        </div>
        <!-- /.card -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php
    include "_includes/footer.php";
  ?>

</body>
</html>


