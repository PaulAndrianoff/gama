<?php

class TextInput
{
    private $name;
    private $constraints;

    public function __construct($name, $constraints = [])
    {
        $this->name = $name;
        $this->constraints = $constraints;
    }

    public function render()
    {
        $input = '<input type="text" name="' . $this->name . '"';
        
        // Add constraints as HTML attributes
        foreach ($this->constraints as $constraint => $value) {
            $input .= ' ' . $constraint . '="' . $value . '"';
        }
        
        $input .= '>';
        
        return $input;
    }
}

