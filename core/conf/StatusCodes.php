<?php
	defined('AppAUTH') or die;

	final class StatusCodes{

		//success
		const c200 = 200;
		const m200 = 'Page Found';
		const c251 = 251;
		const m251 = 'User Information Found';

		const c260 = 260;
		const m260 = 'User successfully added';
		const c261 = 261;
		const m261 = 'Group successfully added';
		const c262 = 262;
		const m262 = 'Group successfully updated';
		const c263 = 263;
		const m263 = 'Group request sent';
		const c264 = 264;
		const m264 = 'Found group list';
		const c265 = 265;
		const m265 = 'Found group member list';
		const c266 = 266;
		const m266 = 'Found group request list';
		const c270 = 270;
		const m270 = 'User successfully logged in';
		const c271 = 271;
		const m271 = 'User successfully activated';


		//failed
		const c404 = 404;
		const m404 = 'Page Not Found';
		const c421 = 421;
		const m421 = 'User not found';
		const c451 = 451;
		const m451 = 'Undefined Class Object';
		const c452 = 452;
		const m452 = 'Undefined Class Object Method';
		const c453 = 453;
		const m453 = 'Insufficient GET parameter';
		const c454 = 454;
		const m454 = 'Invalid POST url';


		const c460 = 460;
		const m460 = 'Username already exists';
		const c461 = 461;
		const m461 = 'Failed to create group';
		const c462 = 462;
		const m462 = 'Group list empty';
		const c463 = 463;
		const m463 = 'No members in the group';
		const c464 = 464;
		const m464 = 'No request in the group';

		const c470 = 470;
		const m470 = 'Invalid User ID';
		const c471 = 471;
		const m471 = 'Invalid Password';
		

		const c530 = 530;
		const m530 = 'Query failed to update';
		const c550 = 550;
		const m550 = 'Unable to login';
	}

?>