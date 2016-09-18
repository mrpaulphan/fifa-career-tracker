<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $fillable = [
      'save_id',
      'season',
      'color',
      'name',
      'domestic_objective',
      'continental_objective',
      'brand_objective',
      'financial_objective',
      'youth_objective',
      'club_worth',
      'transfer_budget'
    ];
}
