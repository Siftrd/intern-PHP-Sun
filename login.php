<?php
if(isset($_SESSION["user"]) ){   
            header("Location:index.php?page=start");
        }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link href="/resources/css/style.css" rel="stylesheet" type="text/css"/>
        <title>Login</title>
    </head>
    <body>
        <div id="logreg-forms">
            <form class="form-signin" action="/index.php?page=start" method="post">
                <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Sign in</h1>
                <input name="user"  type="text"  class="form-control" placeholder="Username" required="" autofocus="">
                <input name="pass"  type="password"  class="form-control" placeholder="Password" required="">
                <label><input type="checkbox" name="rem" > Remember me</label>
                
                <button id="btn"  name="login" class="btn btn-dark btn-block"  type="submit"><i class="fas fa-sign-in-alt"></i> Sign in</button>
                <hr>

            </form>
        </div>
    </body>
</html>