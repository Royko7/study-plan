<?php

namespace Drupal\hello_world\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;
/**
 * Implements an example form.
 */
class HelloForm extends FormBase
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
        $form['phone_number'] = [
            '#type' => 'tel',
            '#title' => $this->t('Your phone number'),
            '#ajax' => array(
                // 'callback' => '::yearSelectCallback',
                'event' => 'keyup',
                'progress' => array(
                    'type' => 'throbber',
                    'message' => NULL,
                ),
            ),
        ];
        $form['actions']['#type'] = 'actions';
        $form['actions']['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Save'),
            '#button_type' => 'primary',
        ];
        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state)
    {
        if (strlen($form_state->getValue('phone_number')) < 3) {
            $form_state->setErrorByName('phone_number', $this->t('The phone number is too short. Please enter a full phone number.'));
        }
        if (!is_numeric($form_state->getValue('phone_number'))) {
            $form_state->setErrorByName('phone_number', $this->t('error'));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        $this->messenger()->addStatus($this->t('Your phone number is @number', ['@number' => $form_state->getValue('phone_number')]));
    }

    public function yearSelectCallback(array $form, FormStateInterface $form_state) {
        return $form['month'];
      }

}
