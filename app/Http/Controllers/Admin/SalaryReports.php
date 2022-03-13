<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\SalaryReportsDataTable;
use Carbon\Carbon;
use App\Models\SalaryReport;

use App\Http\Controllers\Validations\SalariesRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class SalaryReports extends Controller
{



            /**
             * Baboon Script By [it v 1.6.37]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(SalaryReportsDataTable $salaries)
            {
               return $salaries->render('admin.salaries.index',['title'=>trans('admin.salaryreports')]);
            }



}
