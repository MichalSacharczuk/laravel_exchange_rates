<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExchangeController extends Controller
{
	public function getExchangeRates(Request $request)
	{
		$date_now = date('Y-m-d');
		// $date_now = '2019-09-07'; // // do testów - weekend
		// $date_now = '2019-09-01'; // // do testów - weekend

		$request->validate([
			'date' => 'required|date',
		], [
			'date.required' => 'Proszę podać poprawną datę.',
			'date.date' => 'Proszę podać poprawną datę.',
		]);

		// if ( !isset($request->date) || $request->date > $date_now ) {
		// 	return back()->with('no_input', 'Podaj poprawną datę.');
		// }

		$url_start = 'http://api.nbp.pl/api/exchangerates/rates/c/usd/';
		// $url = $url_start . $request->date . '/' . $date_now;
		// $url = $url_start . '2019-09-04/2019-09-06'; // // DO TESTÓW

		$content = @file_get_contents($url);

		// walidacja czy poprawnie pobrano???

		$data = json_decode($content);

		if ( !empty($data->rates) ) {
			dd( $data->rates );
		}
		else {
			echo "Brak danych";
		}
		

		// !!!!!!!!!!! pamiętać że w weekendy nie ma danych z kursów!!!!!!!

		return '';
	}
}
