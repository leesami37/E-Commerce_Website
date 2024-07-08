<?php
  session_start();
  session_destroy();  //destroys all the information stored in session
  header("Location: index.php");
