<?php

namespace Drupal\hello_world;

use Symfony\Component\EventDispatcher\Event;

/**
 * Classe d'événement à envoyer par le service HelloWorldSalutation.
 */
class SalutationEvent extends Event {

  const EVENT = 'hello_world.salutation_event';

  /**
   * Le message de salutation.
   *
   * @var string
   */
  protected $message;

  /**
   * Renvoie le message de salutation.
   *
   * @return mixed
   *   Le message de salutation.
   */
  public function getValue() {
    return $this->message;
  }

  /**
   * Définie le message de salutation.
   *
   * @param mixed $message
   *   Le message de salutation.
   */
  public function setValue($message) {
    $this->message = $message;
  }

}
