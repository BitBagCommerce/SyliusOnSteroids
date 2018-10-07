Installation
------------

*This is the guide to prod environment. On your local machine, run these commands without `-e prod` flag.*

```bash
$ bin/console do:da:cre -e prod
$ bin/console do:sche:cre -e prod
$ bin/console sy:fi:lo bitbag -e prod
$ elasticsearch
$ bin/console fo:el:po -e prod
$ rm -rf var/cache/*
$ yarn install
$ yarn run gulp
```
