<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExchangeController extends Controller
{
	public function getExchangeRates(Request $request)
	{
		$date_now = date('Y-m-d');
		// $date_now = '2019-09-08';

		$validation_message = 'Proszę podać poprawną datę.';

		$request->validate([
			'date' => 'required|date',
		], [
			'date.required' => $validation_message,
			'date.date' => $validation_message,
		]);

		$last_date = $request->date;

		$url_start = 'http://api.nbp.pl/api/exchangerates/rates/c/usd/';
		$url = $url_start . $request->date . '/' . $date_now;

		$content = @file_get_contents($url);

		$object = json_decode($content);

		if ( !empty($object->rates) ) {
			// dd( $object->rates );

			$rates = $object->rates;

			$rates = array_reverse($rates);

			// return view('main', compact('rates', 'last_date'));
			return back()->with([
				'rates' => $rates,
				'last_date' => $last_date,
			]);
		}
		else {
			return back()->with('error_message', 'Nie udało się pobrać danych.');
		}

	}
}
