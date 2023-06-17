<?php

use PHPUnit\Framework\TestCase;
use Core\Language\Language;

class LanguageTest extends TestCase
{
    public function testTranslate()
    {
        $language = new Language('fr');

        $translatedText = $language->get('hello');

        $this->assertEquals('Bonjour', $translatedText);
    }
}
