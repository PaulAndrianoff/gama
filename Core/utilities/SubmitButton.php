<?php

class SubmitButton
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
        $submit = '<button type="submit"';
        
        // Add constraints as HTML attributes
        foreach ($this->constraints as $constraint => $value) {
            $submit .= ' ' . $constraint . '="' . $value . '"';
        }
        
        $submit .= '>' . $this->name . '</button>';

        return $submit;
    }
}
