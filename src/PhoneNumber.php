<?php

namespace Dots;

class PhoneNumber extends DotsObject
{
    public string $country_code;
    public string $phone_number;

    /**
     * @param array $array
     * @return DotsObject
     */
    public static function fromArray(array $array): DotsObject
    {
        $phoneNumber = new PhoneNumber();
        $phoneNumber->country_code = $array['country_code'];
        $phoneNumber->phone_number = $array['phone_number'];

        return $phoneNumber;
    }
}
