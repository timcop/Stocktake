# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  
  config.vm.box = "ubuntu/xenial64"

  # Disable the default vagrant synced folder.
  config.vm.synced_folder ".", "/vagrant", disabled: true

  # Create a forwarded port mapping which allows access to a specific port
  # within the machine from a port on the host machine and only allow access
  # via 127.0.0.1 to disable public access

  # PRE SPLIT 
  # config.vm.network "forwarded_port", guest: 80, host: 8080, host_ip: "127.0.0.1"
  config.vm.define "webserver" do |webserver|
    webserver.vm.hostname = "webserver"
    # webserver.vm.network "forwarded_port", guest: 80, host: 8080, host_ip: "127.0.0.1"
    webserver.vm.network "private_network", ip: "192.168.2.13"

    # Create a synced folder between webserver and the client folder of the repo.
    webserver.vm.synced_folder "client", "/vagrant"

    webserver.vm.provision "shell", inline: <<-SHELL
      apt-get update
      apt-get install -y apache2 php libapache2-mod-php php-mysql

      cp /vagrant/client-website.conf /etc/apache2/sites-available/
      a2ensite client-website
      a2dissite 000-default
      service apache2 reload
    SHELL
  end

  config.vm.define "webserverAdmin" do |webserverAdmin|
    webserverAdmin.vm.hostname = "webserverAdmin"
    # webserverAdmin.vm.network "forwarded_port", guest: 81, host: 8081, host_ip: "127.0.0.1"
    webserverAdmin.vm.network "private_network", ip: "192.168.2.11"

    # Create a synced folder between admin server and the admin folder.
    webserverAdmin.vm.synced_folder "admin", "/vagrant"

    webserverAdmin.vm.provision "shell", inline: <<-SHELL
      apt-get update
      apt-get install -y apache2 php libapache2-mod-php php-mysql

      cp /vagrant/admin-website.conf /etc/apache2/sites-available/
      a2ensite admin-website
      a2dissite 000-default
      service apache2 reload
    SHELL
  end

  config.vm.define "dbserver" do |dbserver|
    dbserver.vm.hostname = "dbserver"
    dbserver.vm.network "private_network", ip: "192.168.2.12"

    # Create a synced folder between the database and the db folder.
    dbserver.vm.synced_folder "db", "/vagrant"

    dbserver.vm.provision "shell", inline: <<-SHELL
      apt-get update
      
      # Set the root password
      export MYSQL_PWD='insecure_mysqlroot_pw'
      echo "mysql-server mysql-server/root_password password $MYSQL_PWD" | debconf-set-selections 
      echo "mysql-server mysql-server/root_password_again password $MYSQL_PWD" | debconf-set-selections
      apt-get -y install mysql-server
      echo "CREATE DATABASE stocktake;" | mysql

      # Create a user and grant privileges 
      echo "CREATE USER 'user'@'%' IDENTIFIED BY 'insecure_db_pw';" | mysql
      echo "GRANT ALL PRIVILEGES ON stocktake.* TO 'user'@'%'" | mysql

      # Create a super user and grant privileges 
      echo "CREATE USER 'admin'@'%' IDENTIFIED BY 'insecure_db_admin_pw';" | mysql
      echo "GRANT ALL PRIVILEGES ON stocktake.* TO 'admin'@'%'" | mysql

      export MYSQL_PWD='insecure_db_pw'
      cat /vagrant/setup-database.sql | mysql -u user stocktake
      cat /vagrant/demo-values.sql | mysql -u user stocktake # DEMO VALUES 

      sed -i'' -e '/bind-address/s/127.0.0.1/0.0.0.0/' /etc/mysql/mysql.conf.d/mysqld.cnf
      service mysql restart
    SHELL
  end
end

