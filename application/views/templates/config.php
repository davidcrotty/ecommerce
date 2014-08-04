<?php
include_once 'links.php';

$header = '
<!DOCTYPE html>
<html>
    <head>
        <!-- Responsive web-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Bootstrap-->
        <link href='.$bootstrap.' rel="stylesheet">
        
        <!-- Bootstrap theme-->
        <link href='.$bootStrapTheme.' rel="stylesheet">
        
        <!-- Own style sheet-->
        <link href='.$mainStyle.' rel="stylesheet">
        
        <!-- Jquery ui theme-->
        <link href='.$jqueryTheme.' rel="stylesheet">
        
        <!-- Font awesome-->
        <link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        
        <!-- Jquery bootstrap-->
        <script src='.$jqueryBootstrap.'></script>
        
        <!-- Jquery ui-->
        <script src='.$jqueryUi.'></script>
        
        <!-- customjs -->
        <script src='.$customjs.'></script>
        
        <!-- Validation -->
        <script src='.$validationJs.'></script>

    </head>
    <body>';
 echo $header;
?>