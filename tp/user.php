<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     
</head>
<body style=" background-image:url(ULTRA.jpeg);
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

    ?>



    <div class="container text-center">
        <h1 class="text-light"> BOOKS</h1>  
        <table class="table  table-bordered">
            <thead class="">
                <tr class="text-center">
                    <th >titre</th>
                    <th >ISBN</th>
                    <th >auteur</th>
                    
                    
                </tr>
            </thead>
            <tbody>
                <?php
                $select_query = "SELECT TITRE, ISBN, AUTEUR FROM table_livres";
                $result = mysqli_query($conn, $select_query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr class='text-center'>";
                        echo "<td>" . $row['TITRE'] . "</td>" ;
                        echo "<td>" . $row['ISBN'] . "</td>";
                        echo "<td>" . $row['AUTEUR'] . "</td>";
                        
                        
                        echo "</tr>";
                        
                    }
                }

                if (isset($_POST['submit'])){
                    $titre =$_POST['titre'];
                    $gmail =$_POST['gmail'];
                    $date =$_POST['date'];
            
                    $utilisateur="INSERT INTO table_reservation (GMAIL,TITRE,HEURE) VALUES ('$gmail','$titre','$date')";
                    $query = mysqli_query($conn,$utilisateur);
            
                }
                
                
                ?>
            </tbody>
            
        </table>
    </div>
    <div class="reserve mt-5" style="text-align: center; "  ><form id="reservationForm" method="POST" >
    <input type="text" name="titre" value="" placeholder="enter titre">
    <input  type="gmail" name="gmail"  value="" placeholder="enter your gmail@.com">
    <input  type="date" name="date" value="" placeholder="  date reservation">
    <input type="submit" name="submit" class="btn btn-secondary">
</div>
    
    <script>
  function reserver(ISBN) {
    
    var form = document.querySelector('.reserve');
            form.style.display = 'block';
}
   
    </script>
</form> 
</body>
</html>