<?php

namespace Core\Language;

class Language
{
    protected $currentLanguage;
    protected $languageData;

    public function __construct($language)
    {
        $this->currentLanguage = $language;
        $this->languageData = $this->loadLanguageFile($language);
    }

    public function get($key)
    {
        return $this->languageData[$key] ?? $key;
    }

    protected function loadLanguageFile($language)
    {
        $filePath = __DIR__ . '/../../lang/' . $language . '.php';
        if (file_exists($filePath)) {
            return require $filePath;
        }
        return [];
    }
}
