<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Carbon\Carbon;

class Jawaban extends Model
{
	/**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = [];

	public function getUploadTimeAttribute()
	{
		return Carbon::parse($this->updated_at)->isoFormat('HH:mm');
	}
}
