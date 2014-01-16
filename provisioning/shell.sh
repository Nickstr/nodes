#!/bin/bash

if [ -n /home/vagrant/.bash_profile ]; then
    cp /vagrant/vagrant-chef/scripts/files/.bash_profile /home/vagrant
    cat /vagrant/vagrant-chef/scripts/files/etc_profile >> /etc/profile
fi

if [ -n /vagrant/composer.phar ]; then
    cd /vagrant
    /usr/bin/php -r "eval('?>'.file_get_contents('https://getcomposer.org/installer'));"
    ln -s /vagrant/composer.phar /usr/bin/composer
fi
