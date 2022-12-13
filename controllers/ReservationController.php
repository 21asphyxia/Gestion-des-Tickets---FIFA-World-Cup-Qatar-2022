<?php 
    //INCLUDES
    require_once(__DIR__.'/../models/MatchesModel.php');
    require_once(__DIR__.'/../models/TicketsModel.php');

    $readMatches = new MatchesModel();

    if(isset($_GET['id'])){
        $match=$readMatches->getMatchById($_GET['id']);
    }