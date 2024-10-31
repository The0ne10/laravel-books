# Start local project
    cd ./docker/local/
    cp .env.example .env    # настроить под себя
    - make init
    - make php

# Start dev/prod project
    cd ./docker/prod
    - make init

## Instruction for using xDebug
    посмотреть файл ./docker/local/xdebug -> README.md
    
## Install Pest
    - make install-pest
