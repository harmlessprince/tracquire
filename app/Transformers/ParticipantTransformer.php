<?php

namespace App\Transformers;

use Musonza\Chat\Transformers\Transformer;

class ParticipantTransformer extends Transformer
{

    public function transform($participants)
    {
       return $participants->toArray();
    }
}
