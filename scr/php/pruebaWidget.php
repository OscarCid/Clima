<?php
 
    mysql_connect("localhost","root",""); // host, username, password...
    mysql_select_db("clima"); // db name...
      
    $q=mysql_query("SELECT * FROM yali ORDER BY ordenar DESC LIMIT 15");
    while($row=mysql_fetch_assoc($q))
            $json_output[]=$row;
      
    print(json_encode($json_output));
      
    mysql_close();
     
?>