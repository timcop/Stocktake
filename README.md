


# Stocktake

A web application to aid in the **stocktake** process for bars.
We are using three virtual machines to host two web servers and a relational database. 

### Contents

[Description](#description)

[Virtual Machines](#virtual-machines)

[Installation and Usage](#installation-and-usage)

## Description

### 1. What are stocktakes?

Stocktakes are a fundamental component of running a hospitality business. Their purpose is to track *ingredients/items* that the business uses on their premesis that are involved in the process of *creating a product* for the customer (e.g, cocktails, meals), which collectively we refer to as **stock**.

For each stocktake, each *item* will have a *desired quantity* for which the *current quantity* of that item is to maintained at. The measurement performed for each item depends on it's type, e.g, beer cans/bottles are counted individually and have an integer domain, spirits are measured by their current volume (either full, %full, or empty) by weighing the bottle and their domain is decimal. 

### 3. What can we do to aid this process?

Our aim is to provide tools that are useful to the stocktaking process. The tools that are desirable for the person performing the stocktake are different to the tools that would be used by the owner of the business. 

### 4. Tools for the manager

Our aim is provide as much automation as possible for the manager during the stocktaking process:

- Provide a table of products which the manager would refer to when entering the current level of a product, which each product in the table having a desired quantity
- When the stocktake is initiated, the manager enters the current total quantity of each product.
  - If the product is counted indiviually, then an integer can be entered.
  - If the product is measured in volume, then amount of full products + the ratio of the currently in-use product can be entered.
  - The manager can use the calculator to work out the ratio of current in-use products.

### 5. Tools for the owner

Our aim is to provide tools for the owner to monitor the stocktakes that have been performed:

- Access to view all information about current stocktake products.
- Access to all stocktakes that have been performed which will be marked with a date.
- Add/remove current stocktake products.
- Assign desired quantity to products.
- Assign weights to products measured by volume.

## Virtual Machines

### Virtual Machine 1

Virtual Machine (VM) 1 is the index of the client site, which uses 'index.php'. The client site can:

- Read all the products and desired quantities stored in the database.
-	Write new stocktakes to the database using ‘submit_stocktake.php’.
 

### Virtual Machine 2

The second VM is the admin site, which uses ‘admin.php’. The admin site can:
-	Read the products and all related information in the database such as volume and weights.
-	Read all previous stored stocktakes in the database using ‘records.php’.
-	Delete stocktake products from the database using ‘delete_product.php’.
-	Add new stocktake products to the database using ‘insert_product.php’.


### Virtual Machine 3

The third VM is the MySQL server which provides the database for the application and receives queries from VM 1 & VM 2.

## Installation and Usage

### Requirements

To install our application, you computer will need to support virtualisation. You will need to install the following:
- Vagrant (*v2.2.x*)
  - Built on *v2.2.16* but any *v2.2.x* should be ok <sup>[1](#myfootnote1)</sup>

  - Follow the installation guide for your operating system found [here](https://www.vagrantup.com/docs/installation)
- VirtualBox (*v6.1.x*)
  - Built on *v6.1.26* but any *v6.1.x* 'should' be ok <sup>[1](#myfootnote1)</sup>
  -   Follow the installation guide for your operating system found [here](https://www.virtualbox.org/manual/ch02.html)

<a name="myfootnote1">1</a>: *Other versions have not been tested, so if problems occur please install the same versions the application was built on. If problems still occur, please add the problems to our GitHub Issues.*

### Installation, Starting, and Stopping.

https://user-images.githubusercontent.com/70932357/133020380-abd3554e-f16a-4819-bcd3-b8b21f977ac5.mp4

To begin installing our application, you will first need to clone the repo.

- `git clone https://github.com/timcop/Stocktake`

Once you have successfully cloned the repo, cd into the repository.

- `cd Stocktake`

Now you can start the application.

-  `vagrant up`

You now should have successfully installed and started the application. To close the application, run the following command in the same directory.

- `vagrant destroy`

### Use

To use the application as a client, visit [192.168.2.13](http://192.168.2.13) in a web browser. 

To use the application as an admin, visit [192.168.2.11](http://192.168.2.11) in a web browser. 


### Destroying VMs

After making changes to the source code you might want to restart a specific rather than all three VMs to test your changes. To do so, use the following commands: 
- `vagrant destroy [name]`
- `vagrant up [name]`

