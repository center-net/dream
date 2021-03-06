<?php
namespace App\Http\Controllers\Validations;

use Illuminate\Foundation\Http\FormRequest;

class AdminsRequest extends FormRequest {

	/**
	 * Baboon Script By [It V 1.5.0 | https://it.phpanonymous.com]
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Baboon Script By [It V 1.5.0 | https://it.phpanonymous.com]
	 * Get the validation rules that apply to the request.
	 *
	 * @return array (onCreate,onUpdate,rules) methods
	 */
	protected function onCreate() {
		return [
			'first_name' => 'required|string',
			'last_name' => 'required|string',
			'mobile' => 'required|string',
			'username' => 'required|string|unique:admins',
			'password' => 'required|max:255|min:6',
			'photo_profile' => '' . it()->image() . '|nullable|sometimes',
			'email' => 'required|email|unique:admins',
			'group_id' => 'required|numeric|exists:admin_groups,id',
		];
	}

	protected function onUpdate() {
		return [
            'first_name' => 'required|string',
			'last_name' => 'required|string',
			'mobile' => 'required|string',
			'username' => 'required|string|unique:admins,username,' . request()->segment(3),
			'password' => 'sometimes|nullable|max:255|min:6',
			'photo_profile' => '' . it()->image() . '|nullable|sometimes',
			'email' => 'required|email|unique:admins,email,' . request()->segment(3),
			'group_id' => 'sometimes|required|numeric|exists:admin_groups,id',
		];
	}

	public function rules() {
		return request()->isMethod('put') || request()->isMethod('patch') ?
		$this->onUpdate() : $this->onCreate();
	}

	/**
	 * Baboon Script By [It V 1.5.0 | https://it.phpanonymous.com]
	 * Get the validation attributes that apply to the request.
	 *
	 * @return array
	 */
	public function attributes() {
		return [
			'first_name' => trans('admin.first_name'),
			'last_name' => trans('admin.last_name'),
			'mobile' => trans('admin.mobile'),
			'username' => trans('admin.username'),
			'password' => trans('admin.password'),
			'photo_profile' => trans('admin.photo_profile'),
			'email' => trans('admin.email'),
			'group_id' => trans('admin.group_id'),
		];
	}

	/**
	 * Baboon Script By [It V 1.5.0 | https://it.phpanonymous.com]
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
