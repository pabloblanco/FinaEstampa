<?php

return [
  "driver" => "smtp",
  "host" => "smtp.mailtrap.io",
  "port" => 587,
  "from" => array(
      "address" => "from@example.com",
      "name" => "Example"
  ),
  "username" => "3838ee5b6ea70c",
  "password" => "ead537945fb1fe",
  "sendmail" => "/usr/sbin/sendmail -bs"
];