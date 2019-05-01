<!DOCTYPE html>
<html>
  <head>
    <meta charset = "UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge"> 
    <meta name="description" content="">
	  <meta name="keywords" content="">
  	<meta name="author" content=""> 
  	  <meta http-equiv="refresh" content="1800" />
                 <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="description" content="Cisodent Comunidad Dental - Marketing para Odontologos" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
<?php if(Session::Mstrr('autenticado')): ?>
		<?php if(isset($_layoutParams['Bbltcs']) && count($_layoutParams['Bbltcs'])): ?>
      <?php for($i = 0; $i < count($_layoutParams['Bbltcs']); $i++): ?>
      <?php if($_layoutParams['Bbltcs'][$i]['Ubicacion'] == 'Cabecera'): ?>
      <?php if($_layoutParams['Bbltcs'][$i]['Tipo'] == 'css'): ?>
        <link rel="stylesheet" href="<?php echo $_layoutParams['Bbltcs'][$i]['Directorio'].$_layoutParams['Bbltcs'][$i]['Archivo']; ?>">
        <?php elseif($_layoutParams['Bbltcs'][$i]['Tipo'] == 'js'): ?>
      <script type="text/javascript" src="<?php echo $_layoutParams['Bbltcs'][$i]['Directorio'].$_layoutParams['Bbltcs'][$i]['Archivo']; ?>"></script>
        <?php endif; ?>
      
        <?php endif; ?>
        <?php endfor; ?>
    <?php endif; ?>
    <?php if(isset($_layoutParams['CSS']) && count($_layoutParams['CSS'])): ?>
			<?php for($i = 0; $i < count($_layoutParams['CSS']); $i++): ?>
				<link rel="stylesheet" href="<?php echo $_layoutParams['CSS'][$i]; ?>">
			<?php endfor; ?>
		<?php endif; ?>
     
  <?php else: ?>
  
  <?php if(isset($_layoutParams['Bbltcs']) && count($_layoutParams['Bbltcs'])): ?>
      <?php for($i = 0; $i < count($_layoutParams['Bbltcs']); $i++): ?>
      <?php if($_layoutParams['Bbltcs'][$i]['Ubicacion'] == 'Cabecera'): ?>
      <?php if($_layoutParams['Bbltcs'][$i]['Tipo'] == 'css'): ?>
        <link rel="stylesheet" href="<?php echo $_layoutParams['Bbltcs'][$i]['Directorio'].$_layoutParams['Bbltcs'][$i]['Archivo']; ?>">
        <?php elseif($_layoutParams['Bbltcs'][$i]['Tipo'] == 'js'): ?>
      <script type="text/javascript" src="<?php echo $_layoutParams['Bbltcs'][$i]['Directorio'].$_layoutParams['Bbltcs'][$i]['Archivo']; ?>"></script>
        <?php endif; ?>
      
        <?php endif; ?>
        <?php endfor; ?>
    <?php endif; ?>
    
    <?php endif; ?>
    <link rel="shortcut icon" type="image/x-icon" href="/recursos/imagenes/favicon.png" />


	<title><?php if(isset($this->Titulo)) echo $this->Titulo; ?></title>
	
  </head>

  

	