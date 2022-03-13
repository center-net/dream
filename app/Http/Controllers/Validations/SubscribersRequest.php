<?php
namespace App\Http\Controllers\Validations;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SubscribersRequest extends FormRequest {

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Get the validation rules that apply to the request.
	 *
	 * @return array (onCreate,onUpdate,rules) methods
	 */
	protected function onCreate() {
		return [
             'subscriberName'=>'required|string',
             'mobile'=>'required|string',
             'type'=>'required|integer|in:1,0',
             'region_id'=>'required|integer|exists:regions,id',
             'street_id'=>'required|integer|exists:streets,id',
             'address'=>'required|string',
             'note'=>'nullable|string',
		];
	}

	protected function onUpdate() {
		return [
             'subscriberName'=>'required|string',
             'mobile'=>'required|string',
             'type'=>'sometimes|integer|in:1,0',
             'region_id'=>'sometimes|integer|exists:regions,id',
             'street_id'=>'sometimes|integer|exists:streets,id',
             'address'=>'required|string',
             'note'=>'nullable|string',
		];
	}

	public function rules() {
		return request()->isMethod('put') || request()->isMethod('patch') ?
		$this->onUpdate() : $this->onCreate();
	}


	/**
	 * Baboon Script By [it v 1.6.37]
	 * Get the validation attributes that apply to the request.
	 *
	 * @return array
	 */
	public function attributes() {
		return [
             'subscriberName'=>trans('admin.subscriberName'),
             'mobile'=>trans('admin.mobile'),
             'type'=>trans('admin.type'),
             'region_id'=>trans('admin.region_id'),
             'street_id'=>trans('admin.street_id'),
             'address'=>trans('admin.address'),
             'note'=>trans('admin.note'),
		];
	}

	/**
	 * Baboon Script By [it v 1.6.37]
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