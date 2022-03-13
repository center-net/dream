<?php
namespace App\Models;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable {
	use Notifiable;
	protected $table = 'admins';
	protected $guarded = [];

	protected $hidden = ['password'];

	public function group_id() {
		return $this->hasOne(\App\Models\AdminGroup::class, 'id', 'group_id');
	}

    public function Advances() {
		return $this->hasMany(\App\Models\Advance::class);
	}

    public function salarie_id() {
		return $this->hasMany(\App\Models\Salarie::class);
	}

    public function salarie() {
		return $this->hasOne(\App\Models\Salarie::class);
	}

	public function role($name) {
		$exists_group_id = $this->getConnection()
			->getSchemaBuilder()
			->hasColumn($this->getTable(), 'group_id');
		if ($exists_group_id) {
			$explode_name = explode('_', $name);

			if (!empty($this->group_id()->first())) {
				$role = $this->group_id()->first()->role()->where('name', $explode_name[0])->first();
				if (!empty($role) && $role->{$explode_name[1]} == 'yes') {
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

}
