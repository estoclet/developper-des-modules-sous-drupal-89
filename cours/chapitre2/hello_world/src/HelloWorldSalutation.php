<?php

namespace Drupal\hello_world;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Prépare la salutation au monde.
 */
class HelloWorldSalutation {

  use StringTranslationTrait;

  /**
   * La config factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * L'event dispatcher.
   *
   * @var \Symfony\Component\EventDispatcher\EventDispatcherInterface
   */
  protected $eventDispatcher;

  /**
   * Constructeur HelloWorldSalutation.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   La config factory.
   * @param \Symfony\Component\EventDispatcher\EventDispatcherInterface $eventDispatcher
   *   L'event dispatcher.
   */
  public function __construct(ConfigFactoryInterface $config_factory, EventDispatcherInterface $eventDispatcher) {
    $this->configFactory = $config_factory;
    $this->eventDispatcher = $eventDispatcher;
  }

  /**
   * Renvoie la salutation.
   *
   * @return \Drupal\Core\StringTranslation\TranslatableMarkup
   *   Le message de salutation.
   */
  public function getSalutation() {
    $config = $this->configFactory->get('hello_world.custom_salutation');
    $salutation = $config->get('salutation');
    if ($salutation !== "" && $salutation) {
      $event = new SalutationEvent();
      $event->setValue($salutation);
      $this->eventDispatcher->dispatch(SalutationEvent::EVENT, $event);
      return $event->getValue();
    }

    $time = new \DateTime();
    if ((int) $time->format('G') >= 00 && (int) $time->format('G') < 12) {
      return $this->t('Good morning world');
    }

    if ((int) $time->format('G') >= 12 && (int) $time->format('G') < 18) {
      return $this->t('Good afternoon world');
    }

    if ((int) $time->format('G') >= 18) {
      return $this->t('Good evening world');
    }
  }

}
