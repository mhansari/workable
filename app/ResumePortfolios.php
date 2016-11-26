<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResumePortfolios extends Model
{
    protected $table = "resume_portfolios";
    public function portfolio_award_types()
    {
        return $this->belongsTo('App\PortfolioAwardsType','project_award_id');
    }
}
