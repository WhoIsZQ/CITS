<!DOCTYPE html>
<html>
    <head>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">    
        <div id="main">
        <title>CITS Form Submit Successful</title>
    </head>

    <!--JUMBOTRON-->
    <div class="jumbotron text-center">
        <div class="container">
            <h1>CITS</h1>
            <p>Child Incident Tracking System</p>
            <h2>Form Submit Successful</h2>
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
    $child_DOB = HTMLSpecialChars($_POST ['child_DOB']);
    $child_SS = HTMLSpecialChars($_POST ['child_SS']);
    $streetAddress = HTMLSpecialChars($_POST ['streetAddress']);
    $city = HTMLSpecialChars($_POST ['city']);
    $state = HTMLSpecialChars($_POST ['state']);
    $zip = HTMLSpecialChars($_POST ['zip']);
    $pFirstName = $pFirstName = HTMLSpecialChars($_POST['p_firstName']);
    $pLastName = HTMLSpecialChars($_POST['p_lastName']);
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $incident_desc = HTMLSpecialChars($_POST ['incident_desc']);

    //Adds a new record via user input from a browswer form
    $newrecord = "INSERT INTO childinfo (child_firstname, child_lastname, child_dob, child_ss, street_address, city, state, zip)
                        VALUES(
                            '$child_firstName',
                            '$child_lastName',
                            '$child_DOB',
                            '$child_SS',
                            '$streetAddress',
                            '$city',
                            '$state',
                            '$zip')";
    $newrecord2 =  "INSERT INTO parentinfo (parent_fname, parent_lname, phone, email)
                        VALUES(
                            '$pFirstName',
                            '$pLastName',
                            '$phone',
                            '$email')";
    $newrecord3 =  "INSERT INTO childincident (child_firstname, child_lastname, incidentdesc)
                        VALUES(
                            '$child_firstName',
                            '$child_lastName',
                            '$incident_desc')";

        if ($conn->query($newrecord) === TRUE) {
            echo "Child info entered successfully" . "<br>" ;
        } else {
            echo "Error: " . $newrecord . "<br>" . $conn->error . "<br>" ;
        }

        if ($conn->query($newrecord2) === TRUE) {
            echo "Parent info entered successfully" . "<br>" ;
        } else {
            echo "Error: " . $newrecord . "<br>" . $conn->error . "<br>" ;
        }

        if ($conn->query($newrecord3) === TRUE) {
            echo "Incident info entered successfully" . "<br>" ;
        } else {
            echo "Error: " . $newrecord . "<br>" . $conn->error . "<br>" . "<br>" ;
        }

        $conn->close();

        // DISPLAYS WHAT THE USER HAS PROVIDED
        echo "<b>Child Name:</b> {$child_firstName} {$child_lastName}<br /><br />";
        echo "<b>Child DOB:</b> {$child_DOB}<br /><br />";
        echo "<b>Child_SS:</b> {$child_SS}<br /><br />";
        echo "<b>City:</b> {$city}<br /><br />";
        echo "<b>State:</b> {$state}<br /><br />";
        echo "<b>Zip:</b> {$zip}<br /><br />";

        echo "<b>Parent Name:</b> {$pFirstName} {$pLastName}<br /><br />";
        echo "<b>Phone:</b> {$phone}<br /><br />";
        echo "<b>Email:</b> {$email}<br /><br />";

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
