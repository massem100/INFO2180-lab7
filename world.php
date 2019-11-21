<?php

$country = $_GET['country'];
$host = getenv('IP');
$username = 'lab7_user';
$password = 'my_password';
$dbname = 'world';

?>

<?php


if (isset($country) || !empty($country)) 
{
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
    $results = $stmt->fetchALL(PDO::FETCH_ASSOC);
    
    
       echo '<table>';
       
        echo '<tr>';
            echo '<th> Country Name</th>';
            echo '<th>Continent</th>';
            echo '<th>Independence Year</th>';
            echo '<th>Head of State</th>';
        echo '</tr>';
        
        foreach ($results as $row){
        echo '<tr>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['continent'] . '</td>';
            echo '<td>' . $row['independence_year'] . '</td>';
            echo '<td>' . $row['head_of_state'] . '</td>';
        
        echo '</tr>';
        }
        
    
     
    echo '</table>';

}
?>

