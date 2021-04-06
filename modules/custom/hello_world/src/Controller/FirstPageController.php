<?php

/**
 * @return
 * Contains \Drupal\drupalbook\Controller\FirstPageController.
 */

namespace Drupal\hello_world\Controller;

use Drupal\Core\Controller\ControllerBase;
use Form\HelloForm;

/**
 * Provides route responses for the DrupalBook module.
 */
class FirstPageController extends ControllerBase
{

  /**
   * Returns a simple page.
   *
   * @return array
   *   A simple renderable array.
   */
  public function content()
  {

    $myText = 'This is not just a default text!';
    $myNumber = $this->dat();
    $myArray = [1, 2, 3];

    return [
      // Your theme hook name.
      '#theme' => 'hello_world',
      // Your variables.
      '#variable1' => $myText,
      '#variable2' => $myNumber,
      '#variable3' => $myArray,
    ];
  }


  public function dat()
  {

    return date('H:i:s');
  }
}
