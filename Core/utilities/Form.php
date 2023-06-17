<?php

class Form
{
    private $action;
    private $method;
    private $elements;

    public function __construct($action, $method = 'POST')
    {
        $this->action = $action;
        $this->method = $method;
        $this->elements = [];
    }

    public function addElement($element)
    {
        $this->elements[] = $element;
    }

    public function render()
    {
        $html = '<form action="' . $this->action . '" method="' . $this->method . '">';

        foreach ($this->elements as $element) {
            $html .= $element->render();
        }

        $html .= '</form>';

        return $html;
    }
}
