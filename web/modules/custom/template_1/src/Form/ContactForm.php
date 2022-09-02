<?php

namespace Drupal\template_1\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class ContactForm extends FormBase
{

  public function getFormId()
  {
    return 'contact_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $form['lastname'] = [
      '#type' => 'textfield',
    ];
    $form['firstname'] = [
      '#type' => 'textfield',
    ];

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Envoyer'),
    ];

    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state)
  {
  }
}
