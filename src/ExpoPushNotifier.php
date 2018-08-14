<?php

namespace VientoDigital\ExpoPushNotifier;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class ExpoPushNotifier
{
	public static function send(string $token, string $title,string $body,int $badge = 1, string $sound='default'){
		$client = new Client();
		$url = config('expopushnotifier.url');
		// Log::info($url);
		$data = [
				'to'=>$token,
				'title'=>$title,
				'body'=>$body,
				'badge'=>$badge,
				'sound'=>$sound
			];
		$response = $client->request('POST',$url,[
			'json' => $data 
		]);
		Log::info(['data'=>$data]);
		Log::info(['response'=>$response]);
	}
}