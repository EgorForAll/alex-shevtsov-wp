<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package alex-shevtsov
 */

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	  <?php wp_head();?>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Raleway:wght@400;600&display=swap"
      rel="stylesheet"
    />
    <title>ALEX.SHEVTSOV</title>
  </head>
  <body>
    <header class="header">
      <div class="header__container">
        <!-- сетка для наложения серых полос -->
        <div class="header__grid">
          <div class="grid-column"></div>
          <div class="grid-column"></div>
          <div class="grid-column"></div>
        </div>
        <!-- элемента хэдера -->
        <svg class="header__logo">
          <use xlink:href="#logo"></use>
        </svg>
        <nav class="header__nav">
          <a href="#" class="header__link">Обо мне</a>
          <a href="#" class="header__link">Наставничество</a>
          <a href="#" class="header__link">Мероприятия</a>
          <a href="#" class="header__link">Кейсы</a>
          <a href="#" class="header__link">Отзывы</a>
          <a href="#" class="header__link">Контакты</a>
        </nav>
        <div class="header__right-links">
          <button
            class="svg-button dropdown-toggle"
            type="button"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
            <svg class="header__burger">
              <use xlink:href="#menu"></use>
            </svg>
          </button>
          <button class="svg-button">
            <svg class="header__phone-svg">
              <use xlink:href="#telephone"></use>
            </svg>
          </button>
          <a href="tel:83451233445" class="header__link phone-link">8-345-123-34-45</a>
          <ul class="dropdown-menu header__dropdown">
            <li>
              <a class="dropdown-item header__dropdown-item" href="#">Обо мне</a>
            </li>
            <li>
              <a class="dropdown-item header__dropdown-item" href="#">Наставничество</a>
            </li>
            <li>
              <a class="dropdown-item header__dropdown-item" href="#">Мероприятия</a>
            </li>
            <li>
              <a class="dropdown-item header__dropdown-item" href="#">Кейсы</a>
            </li>
            <li>
              <a class="dropdown-item header__dropdown-item" href="#">Отзывы</a>
            </li>
            <li>
              <a class="dropdown-item header__dropdown-item" href="#">Контакты</a>
            </li>
          </ul>
        </div>
      </div>
    </header>