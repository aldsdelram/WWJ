<?php


/**
 * Class for wwj.
 */
class WWJ{

	/**
	 * Gets the user full name.
	 *
	 * @return     string  The user full name.
	 */
	public static function getUserFullName(){	
		if(is_user_logged_in()){
			$current_user  = get_currentuserinfo();
				$firstname = $current_user->user_firstname;
				$lastname  = $current_user->user_lastname;
			$display_name  = $firstname .' '. $lastname;
			return $display_name;
		}
		return '';
	}

	/**
	 * format the contact number in singapore contact number format
	 *
	 * @param      string  $number  The number
	 *
	 * @return     string  the formatted phone number
	 */
	public static function formatContactNumber($number){
		$contact_number = "+65 ";
		$contact_number .= substr($number,0,4).' '.substr($number,4,4);
		return $contact_number;
	}
}