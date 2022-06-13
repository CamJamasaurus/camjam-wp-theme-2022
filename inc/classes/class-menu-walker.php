<?php

namespace camjam;

class SlideOutNavWalker extends \Walker_Nav_Menu {

  function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
    if ($depth === 0) {
      $output .= sprintf(
        "\n<li class='cjSlideOutNav__item cjSlideOutNav__item--slide %s'>
        <a href='%s' class='cjSlideOutNav__link'>%s</a>
        \n",
        $item->classes[0], $item->url, $item->title
      );

      if ($args->walker->has_children) {
        $output .= sprintf(
          "\n
          <span class='cjSlideOutNav__btn--forward'>
            <fa-icon icon='chevron-right'>
          </span>
          \n",
          $item->url, $item->title
        );
      }
    }

    if ($depth === 1) {
      $output .= sprintf(
        "\n<li class='cjSlideOutNav__item cjSlideOutNav__item--dropdown'>
        <a href='%s' class='cjSlideOutNav__link'>%s</a>
        \n",
        $item->url, $item->title
      );

      if ($args->walker->has_children) {
        $output .= sprintf(
          "\n
          <span class='cjSlideOutNav__btn--expand'>
            <fa-icon icon='chevron-down'>
          </span>
          \n",
          $item->url, $item->title
        );
      }
    }

    if ($depth === 2) {
      $output .= sprintf(
        "\n<li class='cjSlideOutNav__item'>
        <a href='%s' class='cjSlideOutNav__link'>%s</a>\n",
        $item->url, $item->title
      );
    }

  }

  function start_lvl(&$output, $depth = 0, $args = null) {
    $depth = $depth + 1;

    if ($depth === 1) {
      $output .= sprintf(
        "\n
          <ul class='cjSlideOutNav__page' data-nav-level='%s'>
          \n",
        $depth
      );

      if ($args->walker->has_children) {
        $output .= sprintf(
          "\n
          <span class='cjSlideOutNav__btn--back'>
            <fa-icon icon='chevron-left' family='regular'></fa-icon>
          </span>
          \n"
          //$item->url, $item->title
        );
      }
    }

    if ($depth === 2) {
      $output .= sprintf(
        "\n<ul class='cjSlideOutNav__subMenu' data-nav-level='%s'>
        \n",
        $depth
      );
    }

  }

}