<?php

namespace VarenykyECom\Traits;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

trait Encryptable
{
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        if (in_array($key, $this->encryptable) && (! is_null($value)) && $value != '') {
            try {
                $value = Crypt::decryptString($value);
            } catch (DecryptException $e) {
                $value = parent::getAttribute($key);
            }
        }

        return $value;
    }

    public function setAttribute($key, $value)
    {
        if (in_array($key, $this->encryptable) && (! is_null($value)) && $value != '') {
            $value = Crypt::encryptString($value);
        }

        return parent::setAttribute($key, $value);
    }
}