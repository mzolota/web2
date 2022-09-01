<?php include 'inc/header.php' ?>

<?php
$user = 'root';
$password = '';
$database = 'test';
$servername='localhost';


$mysqli = new mysqli($servername, $user,$password, $database);
 

if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}
 
// SQL query to select data from database
$sql = " SELECT * FROM treninzi  ORDER BY dan DESC ";
$result = $mysqli->query($sql);
$mysqli->close();
?>


<html>
<body>


    <section class="Grupni">

        <h1 class="h1grupni">Grupni Treninzi</h1>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <th>Dan</th>
                <th>Vrijeme</th>
                <th>Naziv</th>
                <th>Opis</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $rows['dan'];?></td>
                <td><?php echo $rows['vrijeme'];?></td>
                <td><?php echo $rows['naziv'];?></td>
                <td><?php echo $rows['opis'];?></td>
            </tr>
            <?php
                }
            ?>
        </table>
    </section>



   


  <div class="container">
  <h1 class="variable">galerija</h1>
    <input type="radio" name="slider" id="item-1" checked>
    <input type="radio" name="slider" id="item-2">
    <input type="radio" name="slider" id="item-3">
  <div class="cards">
    <label class="card" for="item-1" id="song-1">
      <img src="slike/galerija1.jpg" alt="song">
    </label>
    <label class="card" for="item-2" id="song-2">
      <img src="slike/galerija2.jpg" alt="song">
    </label>
    <label class="card" for="item-3" id="song-3">
      <img src="slike/galerija3.jpg" alt="song">
    </label>
  </div>
  
    
  <div class="accordion-menu">
    <h1 class="variable">Korisni linkovi</h1>
        <ul>
            <li>
                <input type="checkbox" checked>
                <i class="arrow"></i>
                <h2><i class="fas fa-code"></i>Body fat calculator</h2>
                <p><a href="https://www.calculator.net/body-fat-calculator.html">Provjerite vašu kompoziciju tijela</a></p>
                </p>
            </li>
            <li>
                <input type="checkbox" checked>
                <i class="arrow"></i>
                <h2><i class="fas fa-question"></i>Plan vježbanja</h2>
                <p><a href="https://legionathletics.com/best-way-to-build-muscle/">Odgovor je ovdje</a></p>
            </li>
            <li>
                <input type="checkbox" checked>
                <i class="arrow"></i>
                <h2><i class="fas fa-laugh"></i>Sve o prehrani</h2>
                <p><a href="https://www.bodybuilding.com/content/24-laws-of-eating-for-muscle.html">Healthy eating</a></p>
            </li>
        </ul>
    </div>

           

   


















        



    


</body>
</html>
