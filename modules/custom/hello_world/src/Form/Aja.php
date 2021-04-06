<?php

namespace Drupal\hello_world\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;

/**
 * Implements an example form.
 */
class Aja extends FormBase
{

    /**
     * {@inheritdoc}
     */
    public function getFormId()
    {
        return 'example_form';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['example_select'] = [
            '#type' => 'select',
            '#title' => $this->t('Select element'),
            '#options' => [
                '1' => $this->t('One'),
                '2' => $this->t('Two'),
                '3' => $this->t('Three'),
                '4' => $this->t('From New York to Ger-ma-ny!'),
            ],
            '#ajax' => [
                'callback' => '::myAjaxCallback', // don't forget :: when calling a class method.
                //'callback' => [$this, 'myAjaxCallback'], //alternative notation
                'disable-refocus' => FALSE, // Or TRUE to prevent re-focusing on the triggering element.
                'event' => 'change',
                'wrapper' => 'edit-output', // This element is updated with this AJAX callback.
                'progress' => [
                    'type' => 'throbber',
                    'message' => $this->t('Verifying entry...'),
                ],
            ]

        ];

        $form['output'] = [
            '#type' => 'textfield',
            '#size' => '60',
            '#disabled' => TRUE,
            '#value' => 'Hello, Drupal!!1',
            '#prefix' => '<div id="edit-output">',
            '#suffix' => '</div>',
        ];

        // Create the submit button.
        $form['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Submit'),
        ];

        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state)
    {
        parent::validateForm($form, $form_state);
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        // Display result.
        foreach ($form_state->getValues() as $key => $value) {
          \Drupal::messenger()->addStatus($key . ': ' . $value);
        }
      }

    public function myAjaxCallback(array &$form, FormStateInterface $form_state) {
        // Prepare our textfield. check if the example select field has a selected option.
        if ($selectedValue = $form_state->getValue('example_select')) {
            // Get the text of the selected option.
            $selectedText = $form['example_select']['#options'][$selectedValue];
            // Place the text of the selected option in our textfield.
            $form['output']['#value'] = $selectedText;
        }
        // Return the prepared textfield.
        return $form['output'];
      }
}
