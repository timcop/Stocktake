# Stocktake

An app to aid in the **stocktake** process for bars 

## Ideas

### 1. What are stocktakes?

Stocktakes are a fundamental component of running a hospitality business. Their purpose is to track *ingredients/items* that the business uses on their premesis that are involved in the process of *creating a product* for the customer (e.g, cocktails, meals), which collectively we refer to as **stock**. The tracking of stock is useful to know:

- That there is enough stock for service (i.e, as to not run out of something)
- Can be used to track the wastage of certain items (and also monitor theft)
- Makes the ordering of items easier as stock needs to be prepared in advance (bars usually order their items on a weekly/fortnightly basis)

### 2. How are they performed?

Stocktakes are performed on different timeframes depending on the business, and there are different levels of stocktakes. The level of the stocktake being performed is really what depth one goes to: 

- A daily stocktake could consist of a quick run through of what key items (generally perishables) are on hand for that particular day of service
- A weekly stocktake would generally contain the items checked in the daily stocktake aswell as items that are ordered in bulk/weekly basis
- A less frequent quarterly/yearly stocktake which would encompass all items on the premsises, in particular; items that aren't ordered often (e.g., glassware, furniture)

For each level of stocktake, each *item* will have a *level* for which the *quantity/amount* of that item is to maintained at. When the stocktake is performed, the 
current level of the item is compared to the desired level to find how much is needed to order. The measurement performed for each item depends on it's type, e.g, beer cans/bottles are counted individually and have an integer domain, spirits are measured by their current volume (either full, %full, or empty) by weighing the bottle and their domain is decimal. 

### 3. What can we do to aid this process?

Our aim is to provide tools that are useful to the stocktaking process. The tools that are desirable for the person performing the stocktake are different to the tools that would be used by the owner of the business. For example, the person performing the stocktake needs a template of what items the bar has and what their desired quantity is and a seemless way to enter the current stock level of items, whereas the owner may be more interested in tools such as statistics (e.g., what items are popular, wastage of a given item), or having ability add new or remove old products from the table which the person performing the stocktake will use.

### 4. Tools for the manager

Our aim is provide as much automation as possible for the manager during the stocktaking process:

- Provide a table of products which the manager would refer to when entering the current level of a product, which each product in the table having a desired quantity
- When the stocktake is initiated, the manager enters the current quantity of each product
  - If the product has an integer domain, then an integer must be entered
  - If the product has a volume domain, then either a volume or weight can be entered. A weight can only be entered if the product in the table has been weighed at full volume and empty volume as to convert the current weight into volume
  - If the product has a weight domain, then a decimal with an option of units (must select one) can be enetered
- When the manager is finished with the stocktake, if any item was missed the manager will be prompted with a message to enter these or continue. If the manager decides to continue, then the current quantity for that item is set to 0
- The manager has the option to save their progress if they wish to continue a current stocktake being performmed at a later date

### 5. Tools for the owner

Our aim is to provide tools for the owner to monitor the stocktakes that have been performed, statistics, and the ability to add/remove products from the table to be used in the stocktake process:

- Access to all stocktakes that have been performed which will be marked with a date
- Provide statistics
  - Track the usage of a product/products by comparing the the desired quantity of the previous stocktake to the quantity in the current stocktake
  - ...Some more statistics here
- Administrative access to the table used in the stocktake process
  - Add/remove products from table
  - Assign desired quantity to products
  - Assign weights to products measured by volume
  - Cost ???

### 6. How we are going to do this?

We plan to use 3 VM's to facilitate the needs of our application:
1. A database server which will store all of the tables needed for both the manager and owner
2. A webclient which provides the tools for the manager
3. A webclient which provides the tools for the owner/admin

## Links 

- [Apache Server Docs](http://httpd.apache.org/docs/2.4/mod/core.html#virtualhost)
