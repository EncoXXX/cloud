<?php
  $data["url"] = URL::getUrl();
  http_response_code(404);
  View::$data = $data;
?>
