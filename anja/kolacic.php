<?php
$cookie_name = "voce";
$cookie_value = "kajsija";

setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
//setcookie("voce", "", time() -3600 , "/");
?>
<!DOCTYPE html>

<html>
<body>

<?php
if(!isset($_COOKIE[$cookie_name])) {
    echo "Zdravo, prvi puit ste ovde";
}
 else {
    echo "Zdravo opet! izabrali ste: " . $_COOKIE[$cookie_name];
}
?>


</body>
</html>