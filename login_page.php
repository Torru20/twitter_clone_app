<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My forum</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Playwrite+CU:wght@100..400&family=Playwrite+VN:wght@100..400&family=Protest+Guerrilla&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/8d9bbedb1f.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<link rel="stylesheet" href="../css/reset.css">
<style>
    @import "../css/pallete.css";
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

</style>
    <link rel="stylesheet" href="../css/signin.css">
    

</head>
<body>
    <?php
        require "../components/nav_bar.php";
    ?>

    <div class="form-body">
        <div class="container" id="container">
            <div class="form-container sign-up">
                <form>
                    <h1>Sign up</h1>
                    <div class="social-icons">
                        <a href="#" class="icon"><i class="fa-brands fa-google"></i></a>

                        <a href="#" class="icon"><i class="fa-brands fa-facebook"></i></i></a>
                    </div>
                    <span>
                        or use your email for registeration
                    </span>

                    <input type="text" placeholder="Name">
                    
                    <input type="text" placeholder="Email">
                    
                    <input type="password" placeholder="Password">
                    
                    <button>Sign up</button>
                </form>
            </div>

            <?php
 
            if ($_SERVER['REQUEST_METHOD'] == "GET" && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
            header('Location: ../pages/index.php');
            }
            if(isset($_POST['login']) && !empty($_POST['login'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];

                if(!empty($email) or !empty($password)) {
                $email = $getFromU->checkInput($email);
                $password = $getFromU->checkInput($password);

                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $errorMsg = "Invalid format";
                }else {
                    if($getFromU->login($email, $password) === false){
                    $errorMsg = "The email or password is incorrect!";
                    }
                }
                }else {
                $errorMsg = "Please enter username and password!";
                }
            }
            ?>
            <div class="form-container sign-in">
                <form method="post">
                    <h1>Log in</h1>
                    <div class="social-icons">
                        <a href="#" class="icon"><i class="fa-brands fa-google"></i></a>

                        <a href="#" class="icon"><i class="fa-brands fa-facebook"></i></i></a>
                    </div>
                    <span>
                        or use your email for registeration
                    </span>
                    <input type="text" name="email" placeholder="Email">
                    
                    <input type="password" name="password" placeholder="Password">
                    
                    <a href="#">Forgot your password</a>
                    <button name="login" value="login">Sign In</button>
                    <?php
                    if(isset($errorMsg)){
                            echo '<div class="alert alert-danger" role="alert"style="width: 400px; margin:20px auto;text-align:center;">
                            '.$errorMsg.'
                            </div>';
                    }
                    ?> 
                
                </form>
            </div>
            <div class="toggle-container">
                <div class="toggle">
                    <div class="toggle-panel toggle-left">
                        <h1>Welcome back</h1>
                        <p>Go to your home page</p>
                        <button class="hidden" id="login">Sign in</button>
                    </div>

                    <div class="toggle-panel toggle-right">
                        <h1>Hello Friend!</h1>
                        <p>Nice to meet you</p>
                        <button class="hidden" id="register">Sign up</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
        


            
            
     <script src="../js/signin.js"></script> 
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>