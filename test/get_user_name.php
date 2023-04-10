<?php
session_start();

if (isset($_SESSION['user_name'])) {
  echo $_SESSION['user_name'];
} else {
  http_response_code(401);
  echo "Unauthorized";
}
?>
