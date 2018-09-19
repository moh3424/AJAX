<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src ="ajax.js"></script>
    <title>Document</title>
</head>
<body>
   
        <table border='1' name="employe" id="employe">
            <th>Identifiant</th>
            <th>Nom</th>
            
                <?php
                    require 'connexion.php';
                    $employes = $pdo -> query("SELECT id_employes, prenom FROM employes") ->fetchAll(PDO::FETCH_ASSOC);
                   
                    foreach($employes as $emp){
                        echo '<tr>';
                        echo '<td><input  value="'. $emp['id_employes'].'">'  . '</td>';
                        echo '<td><input  value="'. $emp['prenom'].'">' . '</td>';
                        echo '</tr>';
                    }
                  
                ?>
           
        </table>
        <form method='post' action=''>
            <input type="text" id="prenom" name ="prenom" value=""> 
            <input type="submit" id="submit" value="Inserer">
        </form>

    
</body>

</html>