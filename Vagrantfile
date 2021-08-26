# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  
  config.vm.box = "ubuntu/xenial64"

  # Create a forwarded port mapping which allows access to a specific port
  # within the machine from a port on the host machine. In the example below,
  # accessing "localhost:8080" will access port 80 on the guest machine.
  # NOTE: This will enable public access to the opened port
  # config.vm.network "forwarded_port", guest: 80, host: 8080

  # Create a forwarded port mapping which allows access to a specific port
  # within the machine from a port on the host machine and only allow access
  # via 127.0.0.1 to disable public access
  config.vm.network "forwarded_port", guest: 80, host: 8080, host_ip: "127.0.0.1"

  # Create a private network, which allows host-only access to the machine
  # using a specific IP.
  # config.vm.network "private_network", ip: "192.168.33.10"

  # Create a public network, which generally matched to bridged network.
  # Bridged networks make the machine appear as another physical device on
  # your network.
  # config.vm.network "public_network"

  config.vm.provision "shell", inline: <<-SHELL
    apt-get update
    apt-get install -y apache2
    apt-get install -y apache2 php libapache2-mod-php php-mysql

    ## DATABASE ##

    ## MY_SQL TEMPLATE FROM https://altitude.otago.ac.nz/cosc349/vagrant-multivm/-/commit/b5b9636ba1e7b35eec3d092589d6bf965f53a6c4
    ## NOT MY OWN CODE
    export MYSQL_PWD='insecure_mysqlroot_pw'
    echo "mysql-server mysql-server/root_password password $MYSQL_PWD" | debconf-set-selections 
    echo "mysql-server mysql-server/root_password_again password $MYSQL_PWD" | debconf-set-selections
    apt-get -y install mysql-server

    # Create test database
    echo "CREATE DATABASE stocktake;" | mysql
    echo "CREATE DATABASE owner;" | mysql

    # Create a user and grant privliges 
    echo "CREATE USER 'user'@'%' IDENTIFIED BY 'insecure_db_pw';" | mysql
    echo "GRANT ALL PRIVILEGES ON stocktake.* TO 'user'@'%'" | mysql

    export MYSQL_PWD='insecure_db_pw'
    cat /vagrant/setup-database.sql | mysql -u user stocktake

    export MYSQL_PWD='insecure_mysqlroot_pw'
    cat /vagrant/setup-admin-database.sql | mysql -u root owner

    ## WEB ##
    cp /vagrant/test-website.conf /etc/apache2/sites-available/
    a2ensite test-website
    a2dissite 000-default
    service apache2 reload

  SHELL
end
