<?php

namespace Drupal\template_1\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;

class IndexController extends ControllerBase
{
  public function homepage()
  {
    $profil_id = \Drupal::entityTypeManager()->getStorage('node')->loadByProperties(['type' => 'profil']);
    $profil = Node::load(array_key_first($profil_id));
    $profil_view = \Drupal::service('entity_type.manager')->getViewBuilder('node')->view($profil, 'full');

    return [
      '#theme' => 'homepage',
      '#profil' => $profil_view,
    ];
  }

  /*   public function contact()
  {
    $form = \Drupal::formBuilder()->getForm('Drupal\template_1\Form\ContactForm');
    return [
      '#theme' => 'page__contact',
      '#form' => $form,
    ];
  } */
}
