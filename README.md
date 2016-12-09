# wp-ogdch-theme

WordPress theme for OGD-CH

## Development

1. Install composer if it isn't installed system wide:
    ```
   $ curl -sS https://getcomposer.org/installer | php
   ```

1. Run `php composer.phar install` to install dependencies

1. add wordpress-standard to phpcs: `./bin/phpcs --config-set installed_paths vendor/wp-coding-standards/wpcs`

1. Install theme dependencies
   ```
   $ cd content/themes/ogdch/
   $ npm install
   ```

## Extract messages / Compile translation files

Run the following script to extract messages from php-files and generate a new wp-ogdch-theme.pot file:

```
$ ./extract_messages.sh
```

To compile all .po files to .mo files use the following script:

```
$ ./compile_translation_files.sh
```

## Run tests

To check the code style, run the build script:

```
$ ./build.sh
```

This script runs on GitLab CI as well for every pull request.

## Compile theme resources

    $ gulp sass
    $ gulp scripts

or watch changes

    $ cd ogdch.dev/content/themes/ogdch/
    $ gulp watch
