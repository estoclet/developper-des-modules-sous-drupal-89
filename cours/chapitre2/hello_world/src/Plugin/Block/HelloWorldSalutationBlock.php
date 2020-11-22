<?php

namespace Drupal\hello_world\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\hello_world\HelloWorldSalutation;

/**
 * Bloc Hello World Salutation.
 *
 * @Block(
 *  id = "hello_world_salutation_block",
 *  admin_label = @Translation("Hello world salutation"),
 * )
 */
class HelloWorldSalutationBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * Le service de salutation.
   *
   * @var \Drupal\hello_world\HelloWorldSalutation
   */
  protected $salutation;

  /**
   * Construit un bloc HelloWorldSalutationBlock.
   *
   * @param array $configuration
   *   Un tableau de configuration contenant des informations sur l'instance du plugin.
   * @param string $plugin_id
   *   Le plugin_id pour l'instance du plugin.
   * @param string $plugin_definition
   *   La définition de l'implémentation du plugin.
   * @param \Drupal\hello_world\HelloWorldSalutation $salutation
   *   Le service de salutation.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, HelloWorldSalutation $salutation) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->salutation = $salutation;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('hello_world.salutation')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#markup' => $this->salutation->getSalutation(),
    ];
  }

}
