**NOTE:** This repository is not maintained anymore and archived. Use https://github.com/PhileCMS/phileTwigFilters instead.

phileTwigShuffle
===================

Shuffle an associative array with Twig

### 1.1 Installation (composer)
```
php composer.phar require phile/twig-shuffle:*
```
### 1.2 Installation (Download)

* Install [Phile](https://github.com/PhileCMS/Phile)
* Clone this repo into `plugins/phile/twigShuffle`

### 2. Activation

After you have installed the plugin. You need to add the following line to your `config.php` file:

```
$config['plugins']['phile\\twigShuffle'] = array('active' => true);`
```

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
