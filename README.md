# [Pegelcraft.de](http://pegelcraft.de/)

## Init your workspace
```
git clone https://github.com/pegelfDE/pegelcraft.de.git
cd pegelcraft.de
git submodule init
git submodule update
```

## Using MySQL
First of all you need a mysql server.

### Creating Database (first time only)
If this is the first time importing this database do the following:
```
mysql -uroot -p
```
Enter the following
```
CREATE DATABASE pegelcraft;
exit;
```

### Importing data
```
mysql -uroot -p pegelcraft < pegelcraft.sql
```

### Exporting data
```
mysqldump --skip-comments -uroot -p pegelcraft > pegelcraft.sql
```
