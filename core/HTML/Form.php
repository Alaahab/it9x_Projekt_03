<?php
namespace Core\HTML;

/**
 * Class Form
 * Permet de générer un formulaire rapidement et simplement
 */
class Form{

  private $data;
  public $suround = 'p';

    /**
     * Form constructor.
     *
     * @param array $data
     */

  public function __construct($data = array()) {
      $this->data = $data;
  }

    /**
     * @param $html
     *
     * @return string
     */

  private function surround($html) {
      return "<{$this->suround}>{$html}</{$this->suround}>";
  }

    /**
     * @param $index
     *
     * @return mixed|null
     */

  public function getValue($index) {

      if (is_object($this->data)) {
          return $this->data->$index;
      }
          return isset($this->data[$index]) ? $this->data[$index] : null;

  }

    /**
     * @param $name
     *
     * @return string
     * @param array $option
     * @param $label
     * @return  string
     */

  public function input($name, $label, $option = []) {

      $type = isset($option['type']) ? $option['type'] : 'text';
      return $this->surround (
          '<input type="'. $type . '" name="' . $name . '" value="' .$this->getValue($name) . '">'
      );
  }

    /**
     * @return string
     */

  public function submit() {
      return $this->surround('<button type="submit">Send</button>');
  }
}