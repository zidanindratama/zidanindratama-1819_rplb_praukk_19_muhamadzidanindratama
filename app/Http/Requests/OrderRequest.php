<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * OrderRequest
 *
 * PHP version 7
 */
class OrderRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$rules = [
			'first_name' => 'required|string',
			'last_name' => 'required|string',
			'no_meja' => 'required',
			'keterangan' => 'required|string',
		];

		return $rules;
	}
}