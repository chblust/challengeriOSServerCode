<?php
error_reporting(E_ALL);
/***
 * determines the intent of the request, executes the appropriate code
 */
 //ensures client is a real Challenger client

$skfile = fopen("skh.txt","r");
$skh = fread($skfile,filesize("skh.txt"));

//if ($securityKey === $_POST['securityKey']){
$secKey = hash('sha512', $_POST['securityKey']);
if ($skh === $secKey){ 
//makes sure request has intent, logic for executing the appropriate code
if(isset($_POST['intent'])){
switch($_POST['intent']){
	case 'login':
	require 'loginManager.php';
	break;

	case 'getUsers':
	require 'userDistributor.php';
	break;

	case 'getChallenges':
	require 'challengeDistributor.php';
	break;

	case 'search':
	require 'searchManager.php';
	break;
	
	case 'upload':
	require 'uploadManager.php';
	break;
	
	case 'like':
	require 'likeManager.php';
	break;

	case 'rechallenge':
	require 'rechallengeManager.php';
	break;

	case 'createUser':
	require 'userRegistrator.php';
	break;

	case 'follow':
	require 'followManager.php';
	break;

	case 'image':
	require 'imageManager.php';
	break;

	case 'edit':
	require 'userMetadataEditor.php';
	break;

	case 'createChallenge':
	require 'challengeRegistrator.php';
	break;

	case 'removeChallenge':
	require 'challengeRemover.php';
	break;
	
	case 'removeVideo':
	require 'videoRemover.php';
	break;

	case 'checkUser':
	require 'userChecker.php';
	break;
        
        case 'report':
        require 'reportManager.php';
        break;
        
        case 'acceptance':
        require 'acceptanceManager.php';
        break;
	
        case 'removeUser':
	require 'userRemover.php';
	break;
       
        case 'notifications':
        require 'notificationManager.php';
        break;
        
        case 'comments':
        require 'commentManager.php';
        break;

	case 'moderate':
	require 'moderator.php';
	break;
}
}else{
    var_dump($_POST);
}
}else{
    //used for security debugging
}
?>
