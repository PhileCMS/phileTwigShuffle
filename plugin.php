<?php

/**
 * Shuffle an associative array using Twig
 * Usage: {{ shuffle(array) }}
 */

class PhileTwigShuffle extends \Phile\Plugin\AbstractPlugin implements \Phile\EventObserverInterface {
	public function __construct() {
		\Phile\Event::registerEvent('template_engine_registered', $this);
	}

	/*!
	 * shuffle an associative array
	 * @param  array $array the input array
	 * @return array        the shuffled array
	 */
	private function shuffle_assoc($in_array) {
		$keys = array_keys($in_array);
		shuffle($keys);
		return array_merge(array_flip($keys), $in_array);
	}

	public function on($eventKey, $data = null) {
		if ($eventKey == 'template_engine_registered') {
			$shuffle = new Twig_SimpleFunction('shuffle', function ($array) {
				if (is_array($array)) {
					return $this->shuffle_assoc($array);
				} else {
					return false;
				}
			});
			$data['engine']->addFunction($shuffle);
		}
	}
}
