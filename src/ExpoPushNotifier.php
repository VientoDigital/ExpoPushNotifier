<?php

namespace VientoDigital\ExpoPushNotifier;

use GuzzleHttp\Client;

class ExpoPushNotifier
{
	private $client;
	private $url;

	public function __construct()
	{
		$this->client = new Client();
		$this->url = config('expopushnotifier.url');
	}


	public function send($tokens, string $title,string $body,int $badge = 1, string $sound='default'){
		if(!is_array($tokens) && is_string($tokens))
			$tokens = [$tokens];
		else if(!is_array($tokens))
			throw new ExpoPushNotifierException('Invalid token');
		\Log::info(['tokens'=>$tokens]);
		foreach ($tokens as $key => $token) {
			$data = [
				'to'=>$token,
				'title'=>$title,
				'body'=>$body,
				'badge'=>$badge,
				'sound'=>$sound
			];
			$this->sendRequest($data);
		}
	}
	private function sendRequest($data){
		$response = $this->client->request('POST',$this->url,['json' => $data ]);
		return $response;
	}
}