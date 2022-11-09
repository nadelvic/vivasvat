<?php
// import App class
use Kirby\Cms\App as Kirby;

Kirby::plugin('vivasvat/file-component', [
  'components' => [
    'file::url' => function (Kirby $kirby, $file) {
        return $kirby->url() . '/content/' . $file->parent()->diruri() . '/' . $file->filename();
    },
  ]
]);