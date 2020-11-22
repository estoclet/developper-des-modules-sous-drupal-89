<?php

namespace Drupal\hello_world\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\hello_world\HelloWorldSalutation;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Controller pour le message de salutation.
 */
class HelloWorldController extends ControllerBase {

  /**
   * Le service salutation.
   *
   * @var \Drupal\hello_world\HelloWorldSalutation
   */
  protected $salutation;

  /**
   * Constructeur HelloWorldController.
   *
   * @param \Drupal\hello_world\HelloWorldSalutation $salutation
   *   The salutation service.
   */
  public function __construct(HelloWorldSalutation $salutation) {
    $this->salutation = $salutation;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('hello_world.salutation')
    );
  }

  /**
   * Hello World.
   *
   * @return array
   *   Notre message.
   */
  public function helloWorld() {
    return [
      '#markup' => $this->salutation->getSalutation(),
    ];
  }

}
