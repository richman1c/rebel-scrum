<?php
    include('dbconnect.php'); 
    function serverDataToCookie($someData)
    {
        $array = array();
        
        while($row = mysqli_fetch_array($someData,MYSQL_ASSOC))
        {
            array_push($array,$row);
        }
        $jsonData = json_encode($array);
        echo $jsonData;
        //TODO: APPEND IF COOKIE HAS DATA
        setcookie("clientlistofpoints",$jsonData);
    };
    
    function serverDataFromCookie()
    {
        if(isset($_COOKIE["serverlistofpoints"]))
        {
        $jsonData = $_COOKIE["serverlistofpoints"];
        $array = json_decode($jsonData);
        foreach($array as $row)
        {
            $sql = "CALL updateLocation(?,?,?,?,?)";
            $stmt = mysqli_prepare($con,$sql);
            mysqli_stmt_bind_param($stmt,'ddsss',$row['lat'],$row['lon'],$_SESSION['userID'],$row['loc_type'],$row['trip_name']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
        unset($_COOKIE["serverlistofpoints"]);
        setcookie("serverlistofpoints", "", time()-3600);
        mysqli_close($con);
        }
    };
    
 ?>
 
 
 <script>
    
    function clientDataToCookie(someData)
    {
        //parse someData into json format
        var json = JSON.stringify(someData);
        //set/append cookie 'serverlistofpoints' to jsondata
        document.cookie = 'serverlistofpoints='+json+';';
    }
    
    function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
    }
    
    function clientDataFromCookie()
    {
        //get value of cookie 'clientlistofpoints'
        //populate local data structure with decoded json data
        var cookiedata = getCookie("clientlistofpoints");
        console.log(cookiedata);
        var array;
        if(cookiedata)
        {
        array = jQuery.parseJSON(unescape(getCookie("clientlistofpoints")));        
        //delete cookie 'clientlistofpoints'
        //document.cookie = 'clientlistofpoints=;'
        //return local data structure for further processing
        }
        
        return array;
        
    }
 </script>
 