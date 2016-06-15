<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Item;
use App\Lead;
use App\Team;
use Illuminate\Http\Request;

use App\Http\Requests;
use Log;
use Response;

class CartController extends Controller {

	/**
	 * LeadController constructor.
	 */
	public function __construct() {
	}

	/**
	 * @param Request $request
	 *
	 * @return array|Response
	 */
	public function store( Request $request ) {
		Log::info('Start Cart Store ');
		$payload = json_decode( $request->getContent(), true );
		$app_id  = $payload['app_id'] ? $payload['app_id'] : false;
		$lead_id = $payload['lead_id'] ? $payload['lead_id'] : false;
		$hash    = $payload['cart_hash'] ? $payload['cart_hash'] : false;
		$total   = $payload['total'] ? $payload['total'] : false;
		$items   = $payload['items'] ? $payload['items'] : false;
		$team    = Team::where( 'public_id', '=', $app_id )->firstOrFail();
		$lead    = Lead::where( 'public_id', '=', $lead_id )->firstOrFail();

		if ( ! $app_id || ! $lead_id || ! $team || ! $hash  || ! $items ) {
			Log::info('Cart NOT FOUND ');
			Log::info('Hash: ' . $hash);
			Log::info('$lead_id: ' . $lead_id);
			Log::info('$team: ' . $team);
			Log::info('$total: ' . $total);
			//Log::info('$items: ' . $items);
			return response( 'Not found.', 401 );
		}

		$cart = Cart::where( 'hash', $hash )->where( 'lead_id', $lead->id )->first();

		/**
		 * Check if the same cart is passed, if true, just update the updated_at value
		 * and return a ok response.
		 */
		if ( $cart ) {
			$cart->touch();

			return [
				'status'  => 200,
				'error'   => false,
				'message' => 'Cart already saved'
			];
		}

		/**
		 * A new cart is submitted, this means that the lead maybe update or delete
		 * an old cart, so at this point we need to search and delete the active
		 * carts for that lead.
		 */

		Cart::where( 'lead_id', $lead->id )->where( 'status', 'active' )->delete();

		/**
		 * Now the old carts are deleted, create a new one.
		 */

		Log::info('Creating Cart: ' . $hash);

		$cart = new Cart( [
			'hash'    => $hash,
			'total'   => $total,
			'lead_id' => $lead->id
		] );

		$cart->save();

		/**
		 * Save the cart Items.
		 */

		foreach ( $items as $item ) {
			Log::info( $item );
			$newItem = new Item( [
				'cart_id'   => $cart->id,
				'name'      => $item['name'],
				'price'     => $item['price'],
				'img_path'  => $item['image'],
				'quantity'  => $item['quantity'],
				'remote_id' => $item['remote_id']
			] );

			$newItem->save();
		}

		return [
			'status' => 200,
			'error'  => false,
			'cart'   => $cart
		];

	}

}
