<?php

namespace App\Services;

use App\Jobs\SendEmailJob;
use App\Models\Offer as Element;

class FindRelatedProduct
{
    protected $offer;
    protected $producer;
    protected $user;

    public function handle($offer)
    {
        $this->offer = $offer;
        $this->producer = $this->offer->producer;
        if($this->producer){
            $this->user = $this->producer->user;
                dispatch(new SendEmailJob($this->user));
        }
        else{
            $this->user = null;
        }

    }

}
