<?php
$dbname = "bkk_accident";
$hostname = "localhost";
$username = "gimleng";
$password = "configtion";
try {
    $connect = new PDO("pgsql:dbname=$dbname;host=$hostname", $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE IF NOT EXISTS accident_point (
        ID SERIAL NOT NULL,
        eid TEXT NOT NULL,
        title TEXT ,
        title_en TEXT ,
        acc_description TEXT ,
        acc_description_en TEXT ,
        latitude TEXT NOT NULL,
        longitude TEXT NOT NULL,
        acc_type TEXT NOT NULL,
        acc_start DATE NOT NULL,
        acc_stop DATE NOT NULL,
        contributor TEXT ,
        PRIMARY KEY (ID));
      ";
    $connect->exec($sql);

} catch (PDOException $e) {
    echo $e->getMessage();
}
?>