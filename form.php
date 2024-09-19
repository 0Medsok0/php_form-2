<?php

if (!empty($_POST)) {
  if (empty($_POST['name'])) {
    $errors[] = 'Поле name пустое';
  } else {
    $nameArray = str_split($_POST['name']); // Преобразовывает строку в массив
    foreach ($nameArray as $char) { // Проходим по массиву и проверяем каждый символ
      if (!ctype_alpha($char)) { // Проверяет, состоит ли переданная строка (string) text только из букв
        $errors[] = "Поле name содержит неверный символ: '$char'";
        break;
      }
    }
  }

  if (empty($_POST['pass'])) {
    $errors[] = 'Поле password пустое';
  } else if (strlen($_POST['pass']) < 8 || strlen($_POST['pass']) > 12) {
    $errors[] = 'Пароль должен быть от 8 до 12 символов';
  } else if (!preg_match('/[A-Z]/', $_POST['pass']) || !preg_match('/[a-z]/', $_POST['pass']) || !preg_match('/[0-9]/', $_POST['pass']) || !preg_match('/[\W]/', $_POST['pass'])) {
    $errors[] = 'Пароль должен содержать заглавные и прописные буквы, цифры и символы';
  } 

  if (empty($_POST['age'])) {
    $errors[] = 'Поле age пустое';
  }elseif (!is_numeric($_POST['age'])) {
    $errors[] = 'Поле age содержит не цифры';
  }

  if (!empty($errors)) {
    foreach ($errors as $err) {
      echo "<strong>$err</strong><br>";
    }
  }

}
