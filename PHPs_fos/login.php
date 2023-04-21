<?php

//Decrypted password.txt

/*
katika@gmail.com            *       katica85
arpi40@freemail.hu          *       polip
zsanettka@hotmail.com       *       csillag12
hatizsak@protonmail.com     *       tracking
terpeszterez@citromail.hu   *       cukorka
nagysanyi@gmail.hu          *       julcsika
*/

function get_Titkos($Username){
    $servername = "************";
    $username = "************";
    $password = "************";
    $dbname = "************";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT Titkos FROM webmeg_project_2 where Username = '$Username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        return $row["Titkos"];
    }
    } else {
        return "NULL";
    }
    $conn->close();
}

function decodePasswords($filename, $key) {
    $encrypted = file_get_contents($filename);

    $decoded = '';

    foreach (explode("\n", $encrypted) as $line) {
        if (empty($line)) {
            continue;
        }
        $decodedLine = '';
        for ($i = 0; $i < strlen($line); $i++) {
            $charCode = ord($line[$i]);
            $keyIndex = $i % count($key);
            $decodedCharCode = ($charCode - $key[$keyIndex]) % 256;
            if ($decodedCharCode < 0) {
                $decodedCharCode += 256;
            }
            $decodedLine .= chr($decodedCharCode);
        }
        $decoded .= $decodedLine . "\n";
    }

    return $decoded;
}

$decoded = decodePasswords('password.txt', array(5, -14, 31, -9, 3));

$username = $_POST['uname'];
$password = $_POST['passwd'];

$foundUsername = false;
$correctPassword = false;
foreach (explode("\n", $decoded) as $line) {
    if (empty($line)) {
        continue;
    }
    list($lineUsername, $linePassword) = explode('*', $line);
    if ($lineUsername === $username) {
        $foundUsername = true;
        if ($linePassword === $password) {
            $correctPassword = true;
            break;
        }
    }
}

if ($correctPassword) {
    echo "Login successful!";

    $Titkos = array(
        "piros" => "red",
        "zold" => "green",
        "sarga" => "yellow",
        "kek" => "blue",
        "fekete" => "black",
        "feher" => "white"
    );

    $Titkos = $Titkos[get_Titkos($username)];
    header("Location: index.php?response=Belépés sikeres!&Titkos=$Titkos");
    
} else {
    if (!isset($username) || $username == '') {
        header("Location: index.php?response=Nincs ilyen felhasználó!");
    } else if ($foundUsername) {
        header("Location: index.php?response=Hibás jelszó!&redirect=police.hu&delay=3");
    } else {
        header("Location: index.php?response=Nincs ilyen felhasználó!");
    }
}
?>