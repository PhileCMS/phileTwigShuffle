<?php
/**
 * Plugin class
 */
namespace Phile\Plugin\Phile\TwigShuffle;

/**
 * Shuffle an associative array using Twig
 * Usage: {{ shuffle(array) }}
 */
class Plugin extends \Phile\Plugin\AbstractPlugin implements \Phile\Gateway\EventObserverInterface {
	/**
	 * the constructor
	 */
	public function __construct() {
		\Phile\Event::registerEvent('template_engine_registered', $this);
	}

	/**
	 * shuffle an associative array
	 * @param $in_array
	 *
	 * @return array
	 */
	private function shuffle_assoc($in_array) {
		$keys = array_keys($in_array);
		shuffle($keys);
		return array_merge(array_flip($keys), $in_array);
	}

	/**
	 * event method
	 * @param string $eventKey
	 * @param null   $data
	 *
	 * @return mixed|void
	 */
	public function on($eventKey, $data = null) {
		if ($eventKey == 'template_engine_registered') {
			$shuffle = new \Twig_SimpleFunction('shuffle', function ($array) {
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
