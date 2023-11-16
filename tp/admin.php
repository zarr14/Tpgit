<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admine page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body style="text-align: center; background-image: url(Arabesques.jpeg); background-size: cover; ">
    
<form action="" method="POST"  id="signupform"  >
        <h1 class="text-light">AJOUTER LIVRES</h1>
        <label class="text-white  text-uppercase " for="">titre de livre </label><br><input  style="width: 50%;margin-left:340px;"  type="text" name="titre" class="form-control"><br>
        <label class="text-white  text-uppercase " for="">ISBN</label><br><input  style="width: 50%; margin-left:340px;  "  type="text" name="isbn"class="form-control "><br>
        <label class="text-white  text-uppercase " for="">auteur</label><br><input  style="width: 50%; margin-left:340px; "  type="text" name="auteur"class="form-control"><br>
        <label class="text-white  text-uppercase " for="">quantite</label><br><input  style="width: 50%; margin-left:340px; "  type="number" name="quantite"class="form-control"><br>
        <button  name="ajouter" class="btn btn-secondary" onclick="Confirmation()">ajouter</button> 
        <button  name="delete" class="btn btn-secondary"onclick="Confirmation()">delete</button> 
        <button  name="update" class="btn btn-secondary"onclick="Confirmation()">update</button> 
        
    </form>
        <table border="1" class="table table-dark" style="margin-top:30px;" >
            <tr> 
                    <th >titre</th>
                    <th >ISBN</th>
                    <th >auteur</th>
                    <th >Quantite</th>

            </tr>
              

   <?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "utilisateur";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $select ="SELECT * from table_livres";
    $ext = mysqli_query($conn,$select);
    while($rows = mysqli_fetch_assoc($ext)){
 
     echo "<tr>";
     echo "<td>".$rows["TITRE"]."</td>";
     echo "<td>".$rows["ISBN"]."</td>";
     echo "<td>".$rows["AUTEUR"]."</td>";
     echo "<td>".$rows["QUANTITE"]."</td>";
     echo "</tr>";
    }

    

    ?>
    

        </table>
        <h1 class="text-light">TABLE RESERVATION</h1>
<table border="1" class="tron table table-dark" style="margin-top:30px;">


<tr> 
    
                    <th >GMAIL</th>
                    <th >TITRE</th>
                    <th >DATE</th>
                    

            </tr>





<?php 
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "utilisateur";
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  $search ="SELECT * from table_reservation";
  $go = mysqli_query($conn,$search);
  while($rows = mysqli_fetch_assoc($go)){

   echo "<tr>";
   echo "<td>".$rows["GMAIL"]."</td>";
   echo "<td>".$rows["TITRE"]."</td>";
   echo "<td>".$rows["HEURE"]."</td>";
   

   echo "</tr>";
  }

  
?>
</table>

 
                    
   

    <?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "utilisateur";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if (isset($_POST['ajouter'])){
        $titre =$_POST['titre'];
        $isbn =$_POST['isbn'];
        $auteur =$_POST['auteur'];
        $quantite =$_POST['quantite'];

        $utilisateur="INSERT INTO table_livres (TITRE,ISBN,AUTEUR,QUANTITE) VALUES ('$titre','$isbn','$auteur','$quantite')";
        $query = mysqli_query($conn,$utilisateur);

    }

    if (isset($_POST['delete'])) {
        $titre = $_POST['titre'];
        $isbn = $_POST['isbn'];
        $auteur = $_POST['auteur'];
        $quantite = $_POST['quantite'];

        $delete = "DELETE FROM table_livres WHERE ISBN = '$isbn'";
           
    
        $result = mysqli_query($conn, $delete);
    
        if ($result) {
            
            echo "was deleted";
        } else {
           
            echo "was not deleted!!!!!!!";
        }
    }
    if (isset($_POST['update'])) {
        $titre = $_POST['titre'];
        $isbn = $_POST['isbn'];
        $auteur = $_POST['auteur'];
        $quantite = $_POST['quantite'];



      
        $update = "UPDATE table_livres SET QUANTITE = QUANTITE - $quantite WHERE TITRE = '$titre' AND ISBN = '$isbn' AND AUTEUR = '$auteur'";
    
        $result = mysqli_query($conn, $update);
    
        if ($result) {
          
            echo "was updated";
        } else {
            
            echo "was not updated!!!!!!!!!!!!!!!!";
        }
    }

    
    
    
    ?>



<script>
   function Confirmation() {
            alert("PLEAZE REFRECH THE PAGE for new updates !");
            return false;  
        }
</script>
    

    
</main>
</body>
</html>