<?php

class Validation
{
  public $validations;

  public function __construct()
  {
    $this->validations = [];
  }

  public static function validate($rules, $data)
  {
    $validation = new self;

    foreach ($rules as $field => $fieldRules) {
      $nameField = $fieldRules['fieldName'] ?? $field;
      $rulesForField = $fieldRules['rules'] ?? [];

      foreach ($rulesForField as $rule) {
        $fieldValue = $data[$field] ?? '';

        if ($rule === 'confirmed') {
          $confirmKey = "{$field}_confirm";
          $confirmValue = $data[$confirmKey] ?? null;
          $validation->$rule($nameField, $fieldValue, $confirmValue);
        } elseif (str_contains($rule, ':')) {
          $temp = explode(':', $rule, 2);
          $ruleMinOrMax = $temp[0];
          $ruleArg = $temp[1];

          $validation->$ruleMinOrMax($nameField, $fieldValue, $ruleArg);
        } else {
          $validation->$rule($nameField, $fieldValue);
        }
      }
    }

    return $validation;
  }

  private function required($field, $value)
  {
    if (strlen($value) == 0) {
      $this->validations[] = "O $field é obrigatório.";
    }
  }

  private function email($field, $value)
  {
    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
      $this->validations[] = "O $field é inválido.";
    }
  }

  private function confirmed($field, $value, $valueConfirm)
  {
    if ($value != $valueConfirm) {
      $this->validations[] = "O $field de confirmação está diferente.";
    }
  }

  private function min($field, $value, $min)
  {
    if (strlen($value) < $min) {
      $this->validations[] = "O $field precisa ter no mínimo $min caracteres.";
    }
  }

  private function max($field, $value, $max)
  {
    if (strlen($value) > $max) {
      $this->validations[] = "O $field precisa ter no máximo $max caracteres.";
    }
  }

  public function isInvalid($customKey = null)
  {
    $key = 'validations';

    if ($customKey) {
      $key .= '_' . $customKey;
    }

    flash()->push($key, $this->validations);

    return sizeof($this->validations) > 0;
  }
}
