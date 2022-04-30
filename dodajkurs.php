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
    <form action="dodajkurssql.php" method="post">
      <div class="row">
        <label for="dane">W tym miejscu wprowadzamy dane kursu, którego chcemy wprowadzić do systemu:</label>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="nazwakursu">Nazwa:</label>
        </div>
        <div class="col-75">
          <input type="text" id="nazwakursu" name="nazwakursu" maxlength="64" placeholder="Napisz tu nazwę kursu...">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="godzinykursu">Ilość godzin:</label>
        </div>
        <div class="col-75">
          <input type="text" id="godzinykursu" name="godzinykursu" maxlength="3" placeholder="Napisz tu ilość godzin wymaganych do ukończenia kursu...">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="tryb">Tryb:</label>
        </div>
        <div class="col-75">
          <select id="tryb" name="tryb">
            <option value="Indywidualny">Indywidualny</option>
            <option value="Grupowy">Grupowy</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="cenakursu">Cena (PLN):</label>
        </div>
        <div class="col-75">
          <input type="text" id="cenakursu" name="cenakursu" maxlength="10" placeholder="Napisz tu cenę za cały kurs...">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="terminkursu">Termin:</label>
        </div>
        <div class="col-75">
          <input type="datetime-local" id="terminkursu" name="terminkursu" placeholder="Napisz tu termin, w którym odbędzie się kurs:">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="opiskursu">Opis:</label>
        </div>
        <div class="col-75">
          <textarea id="opiskursu" name="opiskursu" maxlength="1000" placeholder="Napisz tu coś o prowadzonym kursie..." style="height:150px"></textarea>
        </div>
      </div>
      <div class="row">
        <input type="submit" name="submit" value="Dodaj dane kursu">
      </div>
    </form>
  </div>
