<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Carbon\Carbon;

class Soal extends Model
{
	use HasFactory;

	/**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = [];

	public function getBatasWaktuAttribute()
	{
		return Carbon::parse($this->end_time)->isoFormat('HH:mm');
	}
}
