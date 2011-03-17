<?php

	$ch = @curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://github.com/api/v2/json/repos/search/ruby+testing");
		curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$page = curl_exec( $ch);
	curl_close($ch);
	//descodifica uma string json
	$json = json_decode($page);

	foreach($json->repositories as $arg) {
		print_r("<b>Projecto:</b> ".$arg->name." - <b> Descricao: </b> ".$json->description." - <b>Autor:</b> <a href='https://bitbucket.org/".$json->username." .</a><br>");
		print_r("&nbsp<b>Seguidores</b>: ".$json->followers."<b>Watchers: </b>".$json->watchers."<b>Criado a: </b>".$json->created_at."</a></br>");
	}
	//mostra as opcoes/tag de cada projecto
	echo "<br><br><hr>";
	echo "<h2>Opções/Tags de cada Projecto.</h2>";
	echo "Mais info em: <b>http://confluence.atlassian.com/display/BBDEV/Repositories</b>";
	echo "<br><br>";
	foreach($json->repositories[1] as $key => $value) {
		print_r("<b>[".$key."]</b> => ".$value."<br>");
	}
	
	
	
?>