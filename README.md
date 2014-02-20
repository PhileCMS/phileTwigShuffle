phileTwigShuffle
===================

Shuffle an associative array with Twig

### Installation

* Install [Phile](https://github.com/PhileCMS/Phile)
* Clone this repo into `plugins/phileTwigShuffle`
* add `$config['plugins']['phileTwigShuffle'] = array('active' => true);` to your `config.php`

### Usage

There will now be a new twig function called `shuffle`. It takes an array and shuffles it up.

Example:

```html
<ul>
  {% for page in shuffle(pages) %}
    <li>{{ page.title }}</li>
  {% endfor %}
</ul>
```

The output will be a randomized array for the `pages` object.
