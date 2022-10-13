
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="Design/css/login.css"  rel="stylesheet" >
    
    <title>Login Admin</title>
</head>
<body>
      <div class="login-container">
        


          <div class="login-info-container">
            <h1 class="title">Bienvenido </h1>
            

        

            <form class="inputs-container" name="login-form" method="POST" action="login.php" ">
                

				


                
                <div class="form_group">
                    <input type="text" id="user" class="form_input" placeholder=" ">
                    <label for="user" class="form_label">Nombre:</label>
                    
    
                </div>


                <div class="form_group">
                    <input type="text" id="password" class="form_input" placeholder=" ">
                    <label for="password" class="form_label">Contraseña:</label>
                    
    
                </div>

                
                <button class="btn" name="signin-button" type="submit">Entrar</button>
                <p> Restablecer Contraseña? <span class="span">Click</span></p>
            </form>
          </div>
            <img class="image-container" src=" Design/images/sr Bigote .logo.png" alt="" >
            
            
      </div>

</body>
</html>