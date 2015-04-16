<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
</head>

<body>

<table style="border:1px solid black;">

<?php
$text = trim($_POST['textarea']);
$text = explode("\n", $text);

foreach ($text as $line) {
  $url = filter_var($line, FILTER_SANITIZE_URL);
  echo("<tr><td>$url</td><td>");

  if (!filter_var('http://' . $url, FILTER_VALIDATE_URL) === false) {
    $shellout = shell_exec("dig +short $url");
    //echo("$url is a valid URL");
    //echo "<br />";
    echo $shellout;
  } else {
    echo("not a valid URL");
  }
  echo ("</td></tr>");
}

?>

</table>

</body>
</html>