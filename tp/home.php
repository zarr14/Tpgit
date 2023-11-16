<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home page</title>
    <link rel="stylesheet" href="Nouveau document texte.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body style=" background-image:url(pxakh.jpeg);
    background-size: cover;">
    
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "utilisateur";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if(isset($_POST["ajouter"])){
        $cin = $_POST["cin"];
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $email = $_POST["email"];
        $telephone = $_POST["telephone"];
        $password = $_POST["password"];
        
        if (!empty($cin) && !empty($nom) && !empty($prenom) && !empty($email) && !empty($telephone) && !empty($password)) {
            $utilisateur = "INSERT INTO table_utilisateur (cin, nom, prenom, email, telephone, passe) values ('$cin', '$nom', '$prenom', '$email', '$telephone', '$password')";
            $q = mysqli_query($conn, $utilisateur);
            header("Location: user.php");
            exit();
        } else {
            echo '<span style="color: white;">Veuillez remplir tous les champs.</span>';
        }
    }
    
    
    
    if (isset($_POST["btnlogin"])) {
        $gmail = $_POST["email"];
        $password = $_POST["password"];
    
        if (!empty($gmail) && !empty($password)) {
            $admin_query = "SELECT * FROM table_admin WHERE Gmail = '$gmail' AND Password = '$password'";
            $admin_result = mysqli_query($conn, $admin_query);
    
            if (mysqli_num_rows($admin_result) > 0) {
                header("Location: admin.php");
                exit();
            } else {
                $user_query = "SELECT * FROM table_utilisateur WHERE email = '$gmail' AND passe = '$password'";
                $user_result = mysqli_query($conn, $user_query);
    
                if (mysqli_num_rows($user_result) > 0) {
                    header("Location: user.php");
                    exit();
                } else {
                    echo '<span style="color: white;">Veuillez remplir tous les champs.</span>';
                }
            }
        }
    }


    ?>
    
    <div class="welcome"><h2 class="h2 text-light">Système de gestion de bibliothèque</h2>
    <br><p class="p1">Voici tous les livres dont vous avez besoin, bienvenue chez nous </p>
    <button  onclick="showingsignup()" class="but btn btn-secondary">signup</button><br>
    <button  onclick="showinlogin()"class="but1 btn btn-secondary">login</button>

    </div>
    <form action="" method="POST" class="walo text-center mt-5" id="signupform" >
        <h1 class="text-light">SIGNUP</h1>
        <label class="text-white  text-uppercase " for="">cin</label><br><input required type="text"  name="cin" id="cin"><br>
        <span  id="spn1" ></span><br>
        <label class="text-white  text-uppercase " for="">nom</label ><br><input required  type="text" name="nom"id="nom"><br>
        <span  id="spn2" ></span><br>
        <label class="text-white  text-uppercase " for="">prenom</label ><br><input required  type="text" name="prenom"id="prenom"><br>
        <span  id="spn3" ></span><br>
        <label class="text-white  text-uppercase " for="">email</label ><br><input required  type="email" name="email"id="email"><br>
        <span  id="spn4" ></span><br>
        <label class="text-white  text-uppercase " for="">telephone</label ><br><input required  type="text" name="telephone" id="tele"><br>
        <span  id="spn5" ></span><br>
        <label class="text-white  text-uppercase " for="">password</label ><br><input required  type="password" name="password" id="password"><br>
        <span  id="spn6"></span><br>
        <button name="ajouter" class="btn btn-secondary" >sign up</button>

    </form>
    <form action="" method="POST" class="walo1 text-center mt-5" id="loginform" >
    <h1 class="text-light">LOGIN</h1>  
    <label for="" class="text-white  text-uppercase ">email</label><br><input required type="gmail" name="email" id="gmail" ><br><span  id="spn" ></span><br>
    <label for="" class="text-white  text-uppercase ">password</label><br><input required type="password" name="password" id="mot" ><br><span  id="spn1" ></span><br>
    <button name="btnlogin" class="btn btn-secondary" >login</button>


    </form>
    
  
    <script src="Nouveau document texte.js"></script>
</body>
</html>