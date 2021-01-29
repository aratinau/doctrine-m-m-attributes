# Doctrine M-M relation with attributes

## Installation

    php bin/console doctrine:database:create

    php bin/console doctrine:schema:update --force

    php bin/console doctrine:fixtures:load

inspired by: https://stackoverflow.com/questions/28193658/doctrine2-manytomany-with-additional-attribute

|User | UserPost | Post |
|------------ | ------------- | ------------- |
| `private $post;` | `private $post;` | `private $user;` |
|                | `private $post;` |                |
