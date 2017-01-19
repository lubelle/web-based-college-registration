<!DOCTYPE html>
<!--
     Project: IntegratedApp_PHP
     Program: header.php
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title>Online Registration</title>
        <link rel="stylesheet" type="text/css" href="main.css" />
    </head>
    <body>
        <header>
            <h1>Welcome</h1>
            <h2>Student Menu</h2>
        </header>
        <nav id="nav_bar">
            <ul>
              <li>
              <div class="dropdown">
                 <button class="dropbtn">Course Listing</button>
                    <div class="dropdown-content">
                       <a href="http://localhost:8080/IntegratedApp/CE5Servlet?action=Preview&semester=Winter_2015">Winter 2015</a>
                       <a href="http://localhost:8080/IntegratedApp/CE5Servlet?action=Preview&semester=Fall_2014">Winter 2014</a>
                       <a href="http://localhost:8080/IntegratedApp/CE5Servlet?action=Preview&semester=Summer_2014">Fall 2014</a>
                       <a href="http://localhost:8080/IntegratedApp/CE5Servlet?action=Preview&semester=Winter_2014">Fall 2013</a>
                    </div>
              </div>
              </li>
              <li><a href="http://localhost:8080/IntegratedApp/index.jsp">Login</a>
            </ul>
        </nav>        

        

