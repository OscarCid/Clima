<?php
/**
 * Created by IntelliJ IDEA.
 * User: Oscar
 * Date: 05/10/2015
 * Time: 20:46
 */

/* se busca la ruta del archivo .txt con el mes y año automaticamente */
if(date("M")=="Jan")
{
    $fichero = "../txt/"."ene".date("y")."log.txt";
}
else
{
    $fichero = "../txt/".date("M").date("y")."log.txt";
}

$filas = file($fichero);
$ultima_linea = $filas[count($filas)-1];


$dato=split("[.,]+",$ultima_linea);


$link = mysqli_connect("localhost", "root", "", "clima");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt insert query execution
$sql = "INSERT INTO prueba (fecha,hora,temp,tempDec,humedad,pRocio,pRocioDec,vMedio,vMedioDec,vRafaga,vRafagaDec,direcViento,ritmoLLuvia,ritmoLLuviaDec,precipHoy,precipHoyDec,presion,presionDec,dato19,dato20,dato21,dato22,dato23,dato24,dato25,senTermica,senTermicaDec,indCalor,indCalorDec,dato30,dato31,rSolar,dato33,dato34,dato35,dato36,dato37,dato38,dato39,dato40,dato41,dato42,dato43,dato44,dato45,dato46)
        VALUES ('$dato[0]', '$dato[1]', '$dato[2]', '$dato[3]', '$dato[4]', '$dato[5]', '$dato[6]', '$dato[7]', '$dato[8]', '$dato[9]', '$dato[10]', '$dato[11]', '$dato[12]', '$dato[13]', '$dato[14]', '$dato[15]', '$dato[16]', '$dato[17]', '$dato[18]', '$dato[19]', '$dato[20]', '$dato[21]', '$dato[22]', '$dato[23]', '$dato[24]', '$dato[25]', '$dato[26]', '$dato[27]', '$dato[28]', '$dato[29]', '$dato[30]', '$dato[31]', '$dato[32]', '$dato[33]', '$dato[34]', '$dato[35]', '$dato[36]', '$dato[37]', '$dato[38]', '$dato[39]', '$dato[40]', '$dato[41]', '$dato[42]', '$dato[43]', '$dato[44]', '$dato[45]')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);


