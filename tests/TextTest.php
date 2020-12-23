<?php

use App\Helpers\Text;

class TextTest extends TestCase
{

    public function testGetIsThereBlankSpace() : void
    {
        $cases = [' abc', 'abc ', 'a b c', ' ', '   ', 'a    bc', 'abc    '];
        foreach ($cases as $case){
            $this->assertTrue(Text::getIsThereBlankSpace($case), "The character '$case' is not been considering an blank space");
        }
    }

    public function testGetIsMinimumLength() : void
    {
        $minimum = 9;
        $cases = [
            '123456789',
            '1234567890',
            ' 12345678',
            '12345678 '
        ];
        foreach ($cases as $case){
            $this->assertTrue(Text::getIsMinimumLength($minimum, $case), "The case '$case' is been considering having the minimum $minimum length");
        }
        $cases = [
            '12345678',
            '',
            ' ',
            '    ',
            '1'
        ];
        foreach ($cases as $case){
            $this->assertFalse(Text::getIsMinimumLength($minimum, $case), "The case '$case' is not been considering having the minimum $minimum length");
        }
    }

    public function testGetIsThereDigit() : void
    {
        $cases = [
            'lfksjskf1fsffd',
            'lfdskf 0 slkfj',
            'SLDFKJ0',
            ' 0 '
        ];
        foreach ($cases as $case){
            $this->assertTrue(Text::getIsThereDigit($case), "The case '$case' is been considering not having digits");
        }
        $cases = [
            ' ',
            '    ',
            'fskjfdfAVSDV[[];.,\|<>:?{',
            '!@#$%*&*()_-+'
        ];
        foreach ($cases as $case){
            $this->assertFalse(Text::getIsThereDigit($case), "The case '$case' is been considering having digit");
        }
    }

    public function testGetIsThereLowerCase() : void
    {
        $cases = [
            'aBC123',
            'AbC123',
            'ç'
        ];
        foreach ($cases as $case){
            $this->assertTrue(Text::getIsThereLowerCase($case), "The case '$case' is been considering not having lower case");
        }
        $cases = [
            'ABC',
            '',
        ];
        foreach ($cases as $case){
            $this->assertFalse(Text::getIsThereLowerCase($case), "The case '$case' is been considering having lower case");
        }
    }

    public function testGetIsThereUpperCase() : void
    {
        $cases = [
            'Abc123',
            'abC123',
            'Ç',
            '123',
            '   '
        ];
        foreach ($cases as $case){
            $this->assertTrue(Text::getIsThereUpperCase($case), "The case '$case' is been considering not having upper case");
        }
        $cases = [
            'abc',
            'ç',
            '',
        ];
        foreach ($cases as $case){
            $this->assertFalse(Text::getIsThereUpperCase($case), "The case '$case' is been considering having upper case");
        }
    }

    //Ao menos 1 caractere especial, Considere como especial os seguintes caracteres: !@#$%^&*()-+
    public function testGetIsThereSpecialCharacters() : void
    {
        foreach (Text::SPECIALS_CHARACTERS as $case) {
            $this->assertTrue(Text::getIsThereSpecialCharacters($case), "The case '$case' is not been considering an especial character");
        }
        $cases = [
            '',
            'abc',
            'ç'
        ];
        foreach ($cases as $case) {
            $this->assertFalse(Text::getIsThereSpecialCharacters($case), "The case '$case' is been considering an especial character");
        }
    }

    //Não possuir caracteres repetidos dentro do conjunto
    public function testGetIsThereRepeatedCharacters() : void
    {
        $cases = [
            'aa',
            'Abc@23522a'
        ];
        foreach ($cases as $case) {
            $this->assertTrue(Text::getIsThereRepeatedCharacters($case), "The case '$case' is been considering as having repeated characters");
        }
        $cases = [
            'aA',
        ];
        foreach ($cases as $case) {
            $this->assertFalse(Text::getIsThereRepeatedCharacters($case), "The case '$case' is been considering as having repeated characters");
        }
    }

}
