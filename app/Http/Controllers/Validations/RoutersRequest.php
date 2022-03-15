<?php
namespace App\Http\Controllers\Validations;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RoutersRequest extends FormRequest {

	/**
	 * Baboon Script By [it v 1.6.38]
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Baboon Script By [it v 1.6.38]
	 * Get the validation rules that apply to the request.
	 *
	 * @return array (onCreate,onUpdate,rules) methods
	 */
	protected function onCreate() {
		return [
             'router_number'=>'required|numeric',
             'region_id'=>'required|integer|exists:regions,id',
             'street_id'=>'required|integer|exists:streets,id',
             'address'=>'required|string',
             'note'=>'string',
             'ip_router'=>'ip|ipv4',
		];
	}

	protected function onUpdate() {
		return [
             'router_number'=>'required|numeric',
             'region_id'=>'required|integer|exists:regions,id',
             'street_id'=>'required|integer|exists:streets,id',
             'address'=>'required|string',
             'note'=>'string',
             'ip_router'=>'ip|ipv4',
		];
	}

	public function rules() {
		return request()->isMethod('put') || request()->isMethod('patch') ?
		$this->onUpdate() : $this->onCreate();
	}


	/**
	 * Baboon Script By [it v 1.6.38]
	 * Get the validation attributes that apply to the request.
	 *
	 * @return array
	 */
	public function attributes() {
		return [
             'router_number'=>trans('admin.router_number'),
             'region_id'=>trans('admin.region_id'),
             'street_id'=>trans('admin.street_id'),
             'address'=>trans('admin.address'),
             'note'=>trans('admin.note'),
             'ip_router'=>trans('admin.ip_router'),
		];
	}

	/**
	 * Baboon Script By [it v 1.6.38]
	 * response redirect if fails or failed request
	 *
	 * @return redirect
	 */
	public function response(array $errors) {
		return $this->ajax() || $this->wantsJson() ?
		response([
			'status' => false,
			'StatusCode' => 422,
			'StatusType' => 'Unprocessable',
			'errors' => $errors,
		], 422) :
		back()->withErrors($errors)->withInput(); // Redirect back
	}



}