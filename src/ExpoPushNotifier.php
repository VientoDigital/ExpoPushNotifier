<?php

namespace VientoDigital\ExpoPushNotifier;

use GuzzleHttp\Client;

class ExpoPushNotifier
{
	public static function send($tokens, string $title,string $body,int $badge = 1, string $sound='default'){
		if(!is_array($tokens) && is_string($tokens))
			$tokens = [$tokens];
		else 
			return;
			// throw new ExpoPushNotifierException();
		$client = new Client();
		$url = config('expopushnotifier.url');
		foreach ($tokens as $key => $token) {
			$data = [
				'to'=>$token,
				'title'=>$title,
				'body'=>$body,
				'badge'=>$badge,
				'sound'=>$sound
			];
		}
		$this->sendRequest($data);
	}
	private static function sendRequest($data){
		$response = $client->request('POST',$url,['json' => $data ]);
		return $response;
	}
}