<?php

	if(isset($_GET['parametr']) && $_GET['parametr']!=""){ // tutaj wypadalo by zrobic walidacje
	
		//zczytana fraza
		$phrase = $_GET['parametr'];
	
		$url 	= 'http://xlab.pl/feed/'; 		//url do rss feed
		$feed 	= file_get_contents($url); 		//feed
		$xml 	= new SimpleXmlElement($feed);	//feed->simplexmlelement
		
		//szukaj elementow, ktore zawieraja description (dziecko item), ktore zawiera tekst zawarty w zmiennej $phrase.
		//uwzglednij wielkosc liter
		$res = $xml->xpath("//item/description[contains(translate(text(),'".strtoupper($phrase)."','".strtolower($phrase)."'),'".strtolower($phrase)."')]/parent::*"); 

		//wyswietl title i description znalezionych elementow
		foreach ($res as $item) { 
			echo $item->title .'</br>';
			echo $item->description.'</br>'; 
			echo '</br>';
		} 
	
	}

?>