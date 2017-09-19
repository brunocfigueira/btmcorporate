<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Validator;

class APIController extends Controller {

	protected $uriApi = "https://jsonplaceholder.typicode.com/";

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function users() {

		return view( 'api/users' );
	}

	public function posts() {

		return view( 'api/posts' );
	}

	public function createPost() {
		return view( 'api/create_post' );
	}

	public function sendPost( Request $request ) {
		$data = null;

		try {
			$client  = new Client();
			$res     = $client->request( 'POST', $this->uriApi . 'posts', [
				'form_params' => [
					'title'  => $request->title,
					'body'   => $request->body,
					'userId' => $request->userId,
				]
			] );
			$data    = json_decode( $res->getBody()->getContents() );
			$message = "Post enviado com sucesso!";
			$success = true;

		} catch ( Exception $e ) {
			$message = "Ocorreu um erro inesperado. " . $e->getMessage();
			$success = false;
		}

		return view( '/api/create_post' )->with( [
			'message' => $message,
			'success' => $success,
			'data'    => $data
		] );
	}

	public function editPost( Request $request, $id ) {
		$data = null;

		$client = new Client();
		$res    = $client->request( 'GET', $this->uriApi . 'posts/' . $id );
		$data   = json_decode( $res->getBody()->getContents() );

		return view( '/api/edit_post' )->with( [
			'data' => $data
		] );
	}

	public function updatePost( Request $request, $id ) {
		$data = null;

		try {
			$client  = new Client();
			$res     = $client->request( 'PUT', $this->uriApi . 'posts/'.$id, [
				'form_params' => [
					'id'  => $id,
					'title'  => $request->title,
					'body'   => $request->body,
					'userId' => $request->userId,
				]
			] );
			$data    = json_decode( $res->getBody()->getContents() );
			$message = "Post atualizado com sucesso!";
			$success = true;

		} catch ( Exception $e ) {
			$message = "Ocorreu um erro inesperado. " . $e->getMessage();
			$success = false;
		}

		return view( '/api/edit_post' )->with( [
			'message' => $message,
			'success' => $success,
			'data'    => $data
		] );
	}


}
