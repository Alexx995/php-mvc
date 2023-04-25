<?php

class mysqlconnector
{
    public function connectToMysql()
    {
        // parametri za vezu
        $server="localhost";
        $user="root";
        $password="";
        $baza="oopcrud";

        // ostvarivanje veze
        $konekcija=mysqli_connect($server, $user, $password, $baza);

        // sta ako dodje ili ne dodje do konekcije
        if(!$konekcija) {
            echo "Ovo ne radi";
        } else {
            echo "<br>";


        }
        return $konekcija;
    }
}
?>