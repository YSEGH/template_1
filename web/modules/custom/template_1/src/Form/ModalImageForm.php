<?php

namespace Drupal\template_1\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\file\Entity\File;
use Drupal\node\Entity\Node;
use Drupal\node\NodeInterface;

/**
 * Provides a 'Hello' Block.
 *
 * @Block(
 *   id = "hello_block",
 *   admin_label = @Translation("Hello block"),
 *   category = @Translation("Hello World"),
 * )
 */
class ModalImageForm extends FormBase
{

  public function getFormId()
  {
    return 'modal_image_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $node_id = \Drupal::routeMatch()->getParameter('media_id');
    $node = Node::load($node_id);
    $media_id = $node->get('field_image')->getValue()[0]['target_id'];
    $media = File::load($media_id);
    $url = $media->createFileUrl();

    return [
      '#markup' => "<img src='$url'></img>",
    ];
  }

  public function submitForm(array &$form, FormStateInterface $form_state)
  {
  }
}
