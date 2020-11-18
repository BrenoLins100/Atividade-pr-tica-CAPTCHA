<?php

    include_once ("recaptchalib.php");
    error_reporting(0);
    ini_set('display_errors', 0);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-exp.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Recaptcha</title>
    
    <script src="https://www.google.com/recaptcha/api.js?hl=pt-BR"></script>
    

</head>
<body>

    <div class="container">
        <form method="POST" class="form-group">
        <div class='toast toast-success'>ACESSO PERMITIDO</div>
        <div class='toast toast-error'>ACESSO NEGADO</div>

            
            <label for="email" class="form-label"></label>

            <div class="input-box">
                <i class="icon icon-1x icon-mail"></i>
                <input type="email" name="email" required class="form-input" placeholder="Email">
            </div>

            <label for="senha" class="form-label"></label>

            <div class="input-box">
                <i class="icon icon-1x icon-people"></i>
                <input type="password" name="senha"  class="form-input" required placeholder="Senha">
            </div>

            <br>
            <div class="g-recaptcha" data-sitekey="6LfkAOQZAAAAAAGUkp-sipYI_qog-v7M6aLuFK-o"></div>
            <button class="btn btn-primary" type="submit" >Entrar</button>
            </form>

              <?php 
            $secret = "6LfkAOQZAAAAAFaVSIsQidDSFdKBrl4kaVe-RcWa";
            $response = null;
            $reCaptcha = new reCaptcha($secret);

            if(isset($_POST['g-recaptcha-response'])){
                $response = $reCaptcha->verifyResponse($_SERVER['REMOTE_ADDR'],$_POST['g-recaptcha-response']);
            }

            if($response != null && $response->success){
                echo "<script>document.querySelector('.toast-success').style.display = 'block'</script>";
            }else{
                echo "<script>
                        document.querySelector('.toast-error').style.display = 'block'
                    </script>";
            }
        ?>
      
    </div>

</body>

</html>