<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MeetCode implements Rule
{
	/**
	 * Create a new rule instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Determine if the validation rule passes.
	 *
	 * @param  string  $attribute
	 * @param  mixed  $value
	 * @return bool
	 */
	public function passes($attribute, $value)
	{
		return preg_match('/^([A-Za-z0-9]{3}-[A-Za-z0-9]{4}-[A-Za-z0-9]{3})$/s', $value);
	}

	/**
	 * Get the validation error message.
	 *
	 * @return string
	 */
	public function message()
	{
		return 'The :attribute format is invalid.';
	}
}
