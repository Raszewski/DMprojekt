<?php
  require "headernauczyciela.php";
 ?>
 <style>

 input[type=text], select, textarea{
   width: 100%;
   padding: 12px;
   border: 1px solid #ccc;
   border-radius: 4px;
   box-sizing: border-box;
   resize: vertical;
 }


 label {
   color: white;
   font-size: 22px;
   padding: 12px 12px 12px 0;
   display: inline-block;
 }


 input[type=submit] {
   background-color: #0000e6;
   color: white;
   padding: 20px 40px;
   border: none;
   border-radius: 6px;
   cursor: pointer;
   float: right;
 }
 input[type=submit]:hover {
   background-color: #8f00b3;
   cursor: pointer;
 }

 .container {
   border-radius: 5px;
   background-color: #000066;
   padding: 20px;
 }


 .col-25 {
   float: left;
   width: 25%;
   margin-top: 6px;
 }


 .col-75 {
   float: left;
   width: 75%;
   margin-top: 6px;
 }


 .row:after {
   content: "";
   display: table;
   clear: both;
 }

 </style>


  <div class="container">
    <form action="dodajmaterialysql.php" method="post">
      <div class="row">
        <label for="dane">W tym miejscu wprowadzamy materiały do kursu, które chcemy wprowadzić do systemu:</label>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="nazwakursu">Nazwa kursu:</label>
        </div>
        <div class="col-75">
          <input type="text" id="nazwakursu" name="nazwakursu" maxlength="64" placeholder="Napisz tu nazwę kursu, do którego chcesz wprowadzić materiały...">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="imieautora">Imię autora:</label>
        </div>
        <div class="col-75">
          <input type="text" id="imieautora" name="imieautora" maxlength="20" placeholder="Napisz tu imię autora pozycji...">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="nazwiskoautora">Nazwisko autora:</label>
        </div>
        <div class="col-75">
          <input type="text" id="nazwiskoautora" name="nazwiskoautora" maxlength="32" placeholder="Napisz tu nazwisko autora pozycji...">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="tytul">Tytuł:</label>
        </div>
        <div class="col-75">
          <input type="text" id="tytul" name="tytul" placeholder="Napisz tu tytuł literatury...">
        </div>
      </div>
      <div class="row">
        <input type="submit" name="submit" value="Dodaj materiały do kursu">
      </div>
    </form>
  </div>
