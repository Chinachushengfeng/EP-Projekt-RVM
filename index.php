<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script src="./indexjs/jquery-1.9.1.min.js"></script>
    <title>RVM</title>
    <link href="./indexjs/styles.css" type="text/css" media="all" rel="stylesheet">


    <link href="./indexjs/skitter.styles.css" type="text/css" media="all" rel="stylesheet">
    <style type="text/css">
        body {

        }
    </style>

<body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart='return false'
      onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false'
      onmouseup='document.selection.empty()'>

<style>
    .button {


        position: relative;
        appearance: none; 
        padding: 1em 2em;
        border: none;
        color: white;
        font-size: 1.2em;
        cursor: pointer;
        outline: none;
        overflow: hidden;
        border-radius: 100px;

    }

    .button span {
        position: relative;
    }

    .button::before {
        --size: 0;
        content: '';
        position: absolute;
        left: var(--x);
        top: var(--y);
        width: var(--size);
        height: var(--size);
        background: radial-gradient(circle closest-side, #4405f7, transparent);
        transform: translate(-50%, -50%);
        transition: width .2s ease, height .2s ease;
    }

    .button:hover::before {
        --size: 400px;
    }
</style>


<?php


include('IncDB.php');

$sql = "select * from machineinformation ";
$result = mysqli_query($link, $sql);
$result = mysqli_fetch_array($result);
$ad0orpic1 = $result['ad0orpic1'];

if ($ad0orpic1 == "0") {
    echo '  <iframe  src="advideo/index.php"  width=100% height="610"  frameborder="no" border="0" marginwidth="0" marginheight="0" scrolling="no" allowtransparency="yes" > </iframe> 
   ';
} else {
    echo '  <iframe  src="upadpic/index.php"  width=100% height="180"  frameborder="no" border="0" marginwidth="0" marginheight="0" scrolling="no" allowtransparency="yes" > </iframe> 
   ';
}
?>
<iframe src="tjt/index.php" width=100% height="630" frameborder="no" border="0" marginwidth="0" marginheight="0"
        scrolling="no" allowtransparency="yes"></iframe>
<iframe src="downadpic/index.php" width=100% height="680" frameborder="no" border="0" marginwidth="0" marginheight="0"
        scrolling="no" allowtransparency="yes"></iframe>
        
         
 
      
      
      
	  
	 
	  
	  
	  
	  
	   



	
     



 
    
    
   
    
    
    
    
    
