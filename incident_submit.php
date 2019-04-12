<!DOCTYPE html>
<html>
    <head>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">    
        <div id="main">
        <title>CITS Form Submit</title>
    </head>

    <!--JUMBOTRON-->
    <div class="jumbotron text-center">
        <div class="container">
            <h1>CITS</h1>
            <p>Child Incident Tracking System</p>
            <h2>Form Submit</h2>
        </div>
    </div>
    
    <body>

<div class="container">

    <?php
    //Connects to the MySQL Database and selects the database to work with

    $servername = "localhost";
    $username = "citsadmin";
    $password = "c3Odx@-PmORn";
    $dbname = "citsdb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    // GRABS ENTRIES FROM FORM AND PLACES THEM IN VARIABLES
    $child_firstName = HTMLSpecialChars($_POST ['child_firstName']);
    $child_lastName = HTMLSpecialChars($_POST ['child_lastName']);
    $incident_desc = HTMLSpecialChars($_POST ['incident_desc']);

    //Adds a new record via user input from a browswer form
    $newrecord3 =  "INSERT INTO childincident (child_firstname, child_lastname, incidentdesc)
                        VALUES(
                            '$child_firstName',
                            '$child_lastName',
                            '$incident_desc')";

        if ($conn->query($newrecord3) === TRUE) {
            echo "Incident info entered successfully" . "<br>" . "<br>" ;
        } else {
            echo "Error: " . $newrecord . "<br>" . $conn->error . "<br>" . "<br>" ;
        }

        $conn->close();

        // DISPLAYS WHAT THE USER HAS PROVIDED
        echo "<b>Child Name:</b> {$child_firstName} {$child_lastName}<br /><br />";
        echo "<b>Incident:</b> {$incident_desc}<br /><br />";

    ?>
        <div class ="containter text-center">
            <a class="btn btn-primary btn-lg" href="index.html" role="button">Back</a>
        </div>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" 
        integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js"></script>

    </body>

    <br>

    <div class="container text-center">
    <div class="panel-footer panel-default" text="text-center">CITS Corp &copy; 2019</div>
    </div>  
</html>
