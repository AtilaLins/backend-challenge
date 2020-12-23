<?php


namespace App\Helpers;


class Text
{

    const SPECIALS_CHARACTERS = ['!','@','#','$','%','^','&','*','(',')','-','+'];

    // Espaços em branco não devem ser considerados como caracteres válidos.
    public static function getIsThereBlankSpace(string $text) : bool
    {
        return ($text != trim($text) || strpos($text, ' ' ) !== false || strpos($text, '   ' ) !== false);
    }

    //Nove ou mais caracteres
    public static function getIsMinimumLength(int $length, string $text) : bool
    {
        return (mb_strlen($text) >= $length);
    }

    //Ao menos 1 dígito
    public static function getIsThereDigit(string $text) : bool
    {
        if(trim($text) == '')
            return false;
        return (bool)preg_match('/\d/', $text);
    }

    //Ao menos 1 letra minúscula
    public static function getIsThereLowerCase(string $text) : bool
    {
        $characters = mb_str_split($text);
        foreach ($characters as $character){
            if($character === mb_strtolower($character)){
                return true;
            }
        }
        return false;
    }

    //Ao menos 1 letra maiúscula
    public static function getIsThereUpperCase(string $text) : bool
    {
        $characters = mb_str_split($text);
        foreach ($characters as $character){
            if($character === mb_strtoupper($character)){
                return true;
            }
        }
        return false;
    }

    //Ao menos 1 caractere especial, Considere como especial os seguintes caracteres: !@#$%^&*()-+
    public static function getIsThereSpecialCharacters(string $text) : bool
    {
        if($text == '')
            return false;
        foreach (self::SPECIALS_CHARACTERS as $character){
            if (mb_stripos($text, $character) !== false){
                return true;
            }
        }
        return false;
    }

    //Não possuir caracteres repetidos dentro do conjunto
    public static function getIsThereRepeatedCharacters(string $text) : bool
    {
        $arrayOfCharacters = mb_str_split($text);
        if(count($arrayOfCharacters) == 0)
            return false;
        $characters = '';
        foreach ($arrayOfCharacters as $character){
            if($characters !== '' && mb_strpos($characters, $character) !== false){
                return true;
            }
            $characters .= $character;
        }
        return false;
    }

}
