<?php 
include_once('config.php');
$error=false;
	//recupero i dati dell'utente, se esiste
	$q="SELECT * FROM utenti WHERE username='".pulisci($_POST['username'])."' AND password='".md5(pulisci($_POST['password']))."'";
	$query=mysql_query($q, $db);

	//se i dati inviati al form corrispondono a un utente, allora mi loggo, creo il cookie di sessione e vado a index.php
	if(mysql_num_rows($query)>0){

		$row=mysql_fetch_array($query);

		//immagazzinano le informazioni dell'utente in un array
		$var_session["id"]=$row["id"];
		$var_session["username"]=$row["username"];
		$var_session["password"]=$row["password"];

		//setto la durata del cookies a una settimana
		$time_cookie=3600*24*7;
		setcookie("session", $var_session["username"].'_&&_'.$var_session["password"], time()+$time_cookie);

        echo 1;

	//nessuna corrispondenza con gli utenti: non mi loggo e ritorno al form
	}else
		echo 0;

}



//CARATTERI SPECIALI
function pulisci($login){
	$login=str_replace(";","",$login);
	$login=str_replace(":","",$login);
	$login=str_replace(",","",$login);
	$login=str_replace("'","",$login);
	$login=str_replace("*","",$login);
	$login=str_replace("?","",$login);
	$login=str_replace("=","",$login);
	$login=str_replace("&","",$login);
	$login=str_replace("%","",$login);
	$login=str_replace("$","",$login);
	$login=str_replace("<","",$login);
	$login=str_replace(">","",$login);
	$login=str_replace("#","",$login);
	return $login;
}



// CONTROLLO COOKIE
function controllo_cookie(){

	global $db, $var_session;

	if(isset($_COOKIE['session'])){

		//prendo username e md5(password) presente nel cookie
		$tmp=split("_&&_", $_COOKIE['session']);
		if(count($tmp)!=2)
			return false;

		//confronto username e password del cookie con il database
		$query=mysql_query("select * from utenti where username='".$tmp[0]."' and password='".$tmp[1]."'", $db);

		if(mysql_num_rows($query)>0){
			$row=mysql_fetch_array($query);
			//immagazzinano le informazioni dell'utente in un array
			$var_session["id"]=$row["id"];
			$var_session["username"]=$row["username"];
			$var_session["password"]=$row["password"];
			return true;
		}else
			return false;

	}else
		return false;
}


//CORRELAZIONE DATABASE-COOKIE
if(!controllo_cookie()){
	header("location: login.php");
}else{
	//codice da mostrare
}
?>