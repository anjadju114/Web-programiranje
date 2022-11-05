<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="style.css"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
</head>
<body>
  
<div class="container ">
    <form method="post" action="baze1.php">  
        Ime: <input type="text" name="name" >
        <br><br>
        E-mail: <input type="text" name="email">

        <br><br>
        Naziv filma
      <select name="film" id="film">
          <option value="">--- Izaberi film ---</option>
          <option value="Lier game">Lier game</option>
          <option value="Werewolf game">Werewolf game </option>
          <option value="Tomodachi game">Tomodachi game</option>
      </select>
    
      <br><br>
      Vreme:
      <select name="vreme" id="vreme">
          <option value="">--- Izaberi vreme ---</option>
          <option value="16">16:00</option>
          <option value="18">18:00 </option>
          <option value="20">20:00</option>
      </select>
    
        <br><br>
       Broj sedista: <input type="number" min="1" max="15" name="sediste"  value="<?php echo $seiste;?>">
    
        <br><br>
      
        <input type="submit" name="submit" value="Submit">  
      
      </form>
      </body>
</div>

</body>

</html>