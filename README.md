DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources


INSTALLATION
------------

Copy this repo to your local machine

    git clone git@github.com:917K/yii2-simple-api.git

Proceed to created directory

    cd yii2-simple-api
    
Build Docker images

    docker-compose build
    # or via Makefile
    make build
    
Start the container

    docker-compose up -d
    # or via Makefile
    make up

Install dependtecies via Composer

    docker-compose exec app bash composer install
    # or via Makefile
    make composer

You can then check the required endpoint

    curl -X POST http://localhost:8000/api/sum-even \
        -H "Content-Type: application/json" \
        -d '{"numbers": [1,2,3,4,5,6]}'


TESTING
-------

Unit tests are located in `tests\unit\services` directory. You can run them

    docker-compose exec app vendor/bin/phpunit
    # or via Makefile
    make test
