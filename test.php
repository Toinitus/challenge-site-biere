<?php
require_once 'includes/function.php';
echo envoiMail(  "coucou",
            ["antoinegozard03@gmail.com", "foucrier.corentin@gmail.com"],
            ["html" => "<a href=#>c'est trop cool</a>", "text"=> "c'est trop cool"]
          );