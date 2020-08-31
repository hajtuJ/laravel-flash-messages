# Laravel Flash Messages

> Simple, session based flash messages for Laravel applications.


[![Latest Version on Packagist](https://img.shields.io/packagist/v/hajtuj/laravel-flash-messages.svg?style=flat-square)](https://packagist.org/packages/hajtuj/laravel-flash-messages)
[![License](http://img.shields.io/:license-mit-blue.svg?style=flat-square)](http://badges.mit-license.org) 
[![StyleCI](https://github.styleci.io/repos/291263881/shield?branch=master)]()
![](https://github.com/hajtuj/laravel-flash-messages/workflows/Tests/badge.svg?branch=master)

<a href="#"><img src="https://i.imgur.com/Sb5MqCH.png" title="Alerts" alt="Alerts"></a>

## Content 

- [Installation](#installation)
- [Usage](#usage)
- [Setup](#setup)
- [Donations](#donations)
- [License](#license)

---

## Installation

Just pull package through composer
```
composer require hajtuj/laravel-flash-messages
```

Add component tag to Your layout template
```blade
<x-flash-message-bootstrap/>
```
---
Package is created to work as default with css framework **Twitter Bootstrap v4**. Information how to [add boostrap to Your project](https://getbootstrap.com/docs/4.5/getting-started/introduction/) 
or simply add inline link to css file of bootstrap: 
```html
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" crossorigin="anonymous">
```
and js file to make messages able to hide:
```html
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
```

## Usage

U can simply call flash messages from macro added to `RedirectResponse`. Macro name is created from config macro values and type of flash message:

> **macro prefix** + type +  **macro suffix**

```php
public function store() {
    return redirect('/')->successMsg('Your message');
}
```
```php
public function store() {
    return back()->successMsg('Your message');
}
```
---
U can use handy helper method:
```php
public function store() {
    flash('message', 'info');
    return back();
}
```
or by chaining it with message type:
```php
public function store() {
    flash('message')->success();
    return back();
}
```
---
You can also receive class of `FlashMessageContract $flash` in constructor method of Your controller:

```php
public function store(FlashMessageContract $flash) {
    $flash->flashMessage('Hey! Successfully stored resource', 'success');
}
```

### Setup

You can always export config file and views [
] to make Your own modifications

> exporting config to `config/flash-message.php`

```shell
$ php artisan flash-message:config
```

> exporting view file to `resources/views/vendor/flash-message/bootstrap.blade.php`

```shell
$ php artisan flash-message:views
```

> you can add own types of messages in config:

```php
/**
 *  Types are used to name classes in html code of alerts
 */
'types' => ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'],
```

> to modify class for each type add own sufix and prefixes in config file

```php
/**
* Class prefix and suffix is added to type of alert to create class name
*/
'class' => [
    'prefix' => 'alert-',
    'suffix' => '',
],
```

---

## Donations

If You like my work and U would like to share with me just <br /> 
<a href="https://www.buymeacoffee.com/hajtuJ" target="_blank"><img src="https://www.buymeacoffee.com/assets/img/custom_images/black_img.png" alt="Buy Me A Coffee" style="height: 41px !important;width: 174px !important;" ></a>



---

## License

[![License](http://img.shields.io/:license-mit-blue.svg?style=flat-square)](http://badges.mit-license.org)

- **[MIT license](http://opensource.org/licenses/mit-license.php)**
- Copyright 2020 © <a href="mailto:bolek.sebastian@gmail.com" target="_blank">bolek.sebastian@gmail.com</a>.
