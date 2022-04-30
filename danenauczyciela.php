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
    <form action="dodaj-danenauczyciela.php" method="post">
      <div class="row">
        <label for="dane">W tym miejscu wprowadzamy dane zalogowanego nauczyciela. Dane można wprowadzić tylko raz do bazy danych.</label>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="imienauczyciela">Imię:</label>
        </div>
        <div class="col-75">
          <input type="text" id="imienauczyciela" name="imienauczyciela" maxlength="32" placeholder="Napisz tu swoje imię...">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="nazwiskonauczyciela">Nazwisko:</label>
        </div>
        <div class="col-75">
          <input type="text" id="nazwiskonauczyciela" name="nazwiskonauczyciela" maxlength="32" placeholder="Napisz tu swoje nazwisko...">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="wyksztalcenienauczyciela">Wykształcenie:</label>
        </div>
        <div class="col-75">
          <select id="wyksztalcenienauczyciela" name="wyksztalcenienauczyciela">
            <option value="Licencjat">Licencjat</option>
            <option value="Inżynier">Inżynier</option>
            <option value="Magister">Magister</option>
            <option value="Magister inżynier">Magister inżynier</option>
            <option value="Doktor">Doktor</option>
            <option value="Profesor">Profesor</option>
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="opisnauczyciela">Opisz siebie:</label>
        </div>
        <div class="col-75">
          <textarea id="opisnauczyciela" name="opisnauczyciela" maxlength="1000" placeholder="Napisz tutaj coś o sobie..." style="height:150px"></textarea>
        </div>
      </div>
      <div class="row">
        <input type="submit" name="submit" value="Dodaj swoje dane">
      </div>
    </form>
  </div>
