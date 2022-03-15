<?php
/*
* To implement in admingroups permissions
* to remove CRUD from Validation remove route name
* CRUD Role permission (create,read,update,delete)
* [it v 1.6.37]
*/
return [
	"merchants"=>["create","read","update","delete"],
	"subcategories"=>["create","read","update","delete"],
	"categories"=>["create","read","update","delete"],
	"routers"=>["create","read","update","delete"],
	"purchases"=>["create","read","update","delete"],
	"funds"=>["create","read","update","delete"],
	"advances"=>["create","read","update","delete"],
	"salaries"=>["create","read","update","delete"],
	"troubleshootings"=>["create","read","update","delete"],
	"actions"=>["create","read","update","delete"],
	"tickets"=>["create","read","update","delete"],
	"damages"=>["create","read","update","delete"],
	"subscribers"=>["create","read","update","delete"],
	"streets"=>["create","read","update","delete"],
	"regions"=>["create","read","update","delete"],
	"admins"=>["create","read","update","delete"],
	"admingroups"=>["create","read","update","delete"],
	"salaryreports"=>["read"],
	"reports"=>["read"],
];