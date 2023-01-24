
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo DIRCSS.'style.css'?>">
    <link rel="stylesheet" href="<?php echo DIRCSS.'materialize.min.css'?>">
    <meta name="description" content="<?php echo $this->getDescription();?>">
    <meta name="keywords" content="<?php echo $this->getKeywords();?>">
    <title><?php echo $this->getTitle();?></title>
</head>
<body>
   <?php echo $this->addHeader();?>
   <?php echo $this->addMain();?>
  


    <script src="<?php echo DIRJS.'jquery-3.4.1.min.js';?>"></script>
    <script src="<?php echo DIRJS.'materialize.min.js';?>"></script>
    <script>
        M.AutoInit();
    </script>
    <?php echo $this->addScript();?>
</body>
</html>