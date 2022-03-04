<?php

	//VIEWS COUNTER

	$lastUrserAgent = R::load($namesOfTables['views'], $data['id']); //todo Получаю строку с таблицы с инфой о ласт юзере			1

	$userAgent = $_SERVER['HTTP_USER_AGENT']; //? Получаю юзерагент юзера																			2
	$userIp = $_SERVER['REMOTE_ADDR'];			//? Получаю айпи юзера

	$user = $userAgent . $userIp; 								 //! Соединяю юзерагент и айпи юзера 												3

	if($lastUrserAgent['lastUserAgent'] != $user){			 //* Если инфа о юзере не равна табличной, то 									4

		$lastUrserAgent -> lastUserAgent = $user;				 //* Записываю новую инфу о юзере в таблицу
		R::store($lastUrserAgent);

		$post -> views = $post['views'] + 1;					 //* Прибавляю к колву просмотров 1 
		R::store($post);
	}

	//VIEWS COUNTER

?>