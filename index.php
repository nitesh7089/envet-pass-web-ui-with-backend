 <?php session_start();
    ?>
 <!doctype html>
 <html lang="en">

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Welcome To The House of Mystery</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
     <link rel="stylesheet" href="assets/css/style.css">
 </head>

 <body>

     <div class="container p-0 width-25">
         <div class="bg-img">
             <div class="position-absolute set-position container">
                 <h1 class="heading-text">Welcome To The House of Mystery</h1>
             </div>
         </div>
         <form action="check.php" method="POST">
             <div class="container bg-input set-position-1">

                 <div class="position-absolute container jk">
                     <input type="text" class="form" name="agent-code" placeholder="ENTER YOUR CODE NAME" maxlength="22">
                 </div>
                 <div>
                     <?php
                        if (isset($_SESSION['msg'])) {
                            if ($_SESSION['msg'] == 0) {
                                echo "<h2 class='flash-danger-text'>Access Denied</h2>";
                            } elseif ($_SESSION['msg'] == 1) {
                                echo "<h2 class='flash-text'>Access Granted</h2>";
                                echo "<h2 class='flash-text-1'> Agent Name : <br>" . $_SESSION['name'] . "</h2>";
                            } elseif ($_SESSION['msg'] == 2) {
                                echo "<h2 class='flash-danger-text'>Agent Not Found!</h2>";
                            }
                        } else {
                            echo "<h2 class='flash-text'>Welcome</h2>";
                        }

                        ?>
                 </div>
                 <div class="set-position-2">
                     <button class="btn border-0" type="submit" name="set" value="true"><img src="assets/img/btn-1.png" class="img-fluid" alt="img-btn"></button>
                 </div>
             </div>

         </form>

     </div>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
 </body>

 </html>
 <?php session_destroy(); ?>