<?php
namespace App;

class UnicodeToBijoyConverter
{
    public function convert(string $text): string
    {
        $map = $this->bijoy();

        $text = str_replace(array_keys($this->complexMappings()), array_values($this->complexMappings()), $text);

        return str_replace(array_keys($map), array_values($map), $text);
    }

    public function bijoy(): array
    {
        return [
            'অ' => 'A', 'আ' => 'Av', 'ই' => 'B', 'ঈ'  => 'C', 'উ'   => 'D', 'ঊ' => 'E',
            'ঋ' => 'F', 'এ' => 'G', 'ঐ'  => 'H', 'ও'  => '&I', 'ঔ'  => 'J',
            'ক' => 'K', 'খ' => 'L', 'গ'  => 'M', 'ঘ'  => 'N', 'ঙ'   => 'O',
            'চ' => 'P', 'ছ' => 'Q', 'জ'  => 'R', 'ঝ'  => 'S', 'ঞ'   => 'T',
            'ট' => 'U', 'ঠ' => 'V', 'ড'  => 'W', 'ঢ'  => 'X', 'ণ'   => 'Y',
            'ত' => 'Z', 'থ' => '_', 'দ'  => '`', 'ধ'  => 'a', 'ন'   => 'b',
            'প' => 'c', 'ফ' => 'd', 'ব'  => 'e', 'ভ'  => 'f', 'ম'   => 'g',
            'য' => 'h', 'র' => 'i', 'ল'  => 'j', 'শ'  => 'k', 'ষ'   => 'l',
            'স' => 'm', 'হ' => 'n', 'ড়' => 'o', 'ঢ়' => 'p', 'য়'  => 'q',
            'ৎ' => 'r', 'ং' => 's', 'ঃ'  => 't', 'ঁ'  => 'u',
            '্' => '&', '্র'=>'ª', '্য'=>'¨',

            // কার ‡nv‡mb
            'া' => 'v', 'ি' => 'w', 'ী'  => 'x', 'ু'  => 'y', 'ূ'   => '~',
            'ৃ' => '„', 'ে' => '‡', 'ৈ'  => '‰',


            // সংখ্যা
            '০' => '0', '১' => '1', '২'  => '2', '৩'  => '3', '৪'   => '4',
            '৫' => '5', '৬' => '6', '৭'  => '7', '৮'  => '8', '৯'   => '9',
        ];
    }

    public function complexMappings(): array
    {
        return [
            'ক্র'   => 'µ', // ক+্+র
            'গ্র'   => 'MÖ',
            'প্র'   => 'e¨v',
            'ত্র'   => 'Zr',
            'দ্র'   => 'b¨v',
            'স্ত্র' => 'ov‡Z',
            'র্'    => '©', // Reph
            'মোঃ' => '‡gvt',
            'ক্ষ' => 'ÿ',
        ];
    }
}
