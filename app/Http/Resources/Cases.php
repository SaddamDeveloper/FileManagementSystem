<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Cases extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
        // return [
        //     'id' => $this->id,
        //     'caseid' => $this->caseid,
        //     'clientType' => $this->clientType,
        //     'typeofwork' => $this->typeofwork,
        //     'time2' => $this->time2,
        //     'amount' => $this->amount,
        //     'paymentmode' => $this->paymentmode,

        // ];
    }
}
