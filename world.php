<?php

$country = filter_var(trim($_GET["country"]), FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
$context = filter_var(trim($_GET["context"]), FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
$host = getenv('IP');
$username = 'lab7_user';
$password = 'my_password';
$dbname = 'world';

?>

<?php
 
if ($context === 'cities'){
   $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $stmt = $conn->query("SELECT c.name, c.district, c.population FROM cities c JOIN countries cs ON
c.country_code = cs.code WHERE cs.name = '$country'");
    $results = $stmt->fetchALL(PDO::FETCH_ASSOC);
    
    
    echo '<table>';
       
        echo '<tr>';
            echo '<th> Name</th>';
            echo '<th>District</th>';
            echo '<th>Population</th>';
        echo '</tr>';
        
        foreach ($results as $row){
        echo '<tr>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['district'] . '</td>';
            echo '<td>' . $row['population'] . '</td>';
        
        echo '</tr>';
        }
        
    
     
    echo '</table>';
    
    
    
}else if (isset($country) || !empty($country)) {
    
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

