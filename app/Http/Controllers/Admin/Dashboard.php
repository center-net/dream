<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use DateTime;
use App\Models\Setting;
use App\Models\Ticket;
use App\Models\Advance;
use App\Models\Admin;
use Carbon\Carbon;

class Dashboard extends Controller {

	public function home() {
        $updated_at = Ticket::where('status','5')->orwhere('status','6')->whereDate('updated_at','LIKE','%' . Carbon::today()->format('Y-m-d') . '%')->count();
        $created_at = Ticket::whereDate('updated_at',Carbon::today())->where('status','!=','4')->where('status','!=','6')->count();
        $from = Carbon::now(new \DateTimeZone('Asia/Gaza'))->startOfWeek(Carbon::SATURDAY);
        $to =  Carbon::parse($from)->addWeeks(1);
        $advances = Advance::whereBetween('created_at',[$from, $to])->get();
        $advances2 = Advance::whereNull('status')->get();
        $adminalls = Admin::where('id','!=','1')->get();
        $adminOne = Advance::whereBetween('created_at',[$from, $to])->where('admin_id',admin()->id())->get();
		return view('admin.home', [
            'title' => trans('admin.dashboard'),
            'updated_at' => $updated_at,
            'created_at' => $created_at,
            'advances' => $advances,
            'advances2' => $advances2,
            'from' => $from,
            'to' => $to,
            'adminalls' => $adminalls,
            'adminOne' => $adminOne,
        ]);
	}

	public function prepareKey($key) {
		$setting = setting()->theme_setting;
		if (!empty($setting) && !empty($setting->{$key})) {
			$$key = $setting->{$key};
		} else {
			$$key = '';
		}

		if (request()->has($key)) {
			if (!empty(request($key))) {
				return [$key => request($key)];
			} else {
				return [$key => ''];
			}
		} else {
			return [$key => $$key];
		}

	}

	public function theme_setting() {
		$data_setting = [];
		$data_setting = array_merge($data_setting, $this->prepareKey('brand_color'));
		$data_setting = array_merge($data_setting, $this->prepareKey('sidebar_class'));
		$data_setting = array_merge($data_setting, $this->prepareKey('main_header'));
		$data_setting = array_merge($data_setting, $this->prepareKey('navbar'));
		//return print_r($data_setting);
		return json_encode($data_setting);
	}

	public function theme($id) {
		if (request()->ajax()) {
			$update = Setting::find(setting()->id);
			$update->theme_setting = $this->theme_setting();
			$update->save();
			return setting()->theme_setting;
		} else {
			return 'no ajax request';
		}
	}
}
