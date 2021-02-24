<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loans extends Model
{
    protected $fillable = [
        'employee',
        'loanAmount',
        'currency',
        'date',
        'startDate',
        'InstallmentAmount'
      ];
}
