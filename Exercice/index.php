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
        <form method='post' action=''>
           <div> <input type="text" id="prenom" name ="prenom" value=""> </div>
           <div> <input type="text" id="nom" name ="nom" value=""> </div>
            <div><input type="text" id="sexe" name ="sexe" value=""> </div>
            <div><input type="text" id="service" name ="service" value=""> </div>
            <div><input type="text" id="salaire" name ="salaire" value=""> </div>
            <div><input type="submit" id="submit" value="Inserer"></div>
        </form>
   
        <table border='1' name="employe" id="employe">
            <th>Nom</th>
            <th>prenom</th>
            <th>sexe</th>
            <th>service</th>
            <th>salaire</th>
            
                <?php
                    require 'connexion.php';
                    $employes = $pdo -> query("SELECT * FROM employes") ->fetchAll(PDO::FETCH_ASSOC);
                   
                    foreach($employes as $emp){
                        echo '<tr>';
                        echo '<td>'. $emp['prenom'] . '</td>';
                        echo '<td>'  . $emp['nom'] . '</td>';
                        echo '<td>' . $emp['sexe'] .'</td>';
                        echo '<td>'  . $emp['service'] . '</td>';
                        echo '<td>' . $emp['salaire'] .'</td>';
                        echo '</tr>';
                    }
                  
                ?>
           
        </table>
     

    
</body>

</html>