# STARRS Web UI

This repository contains the web UI for [STARRS](https://github.com/cohoe/starrs), upgraded to Bootstrap 3 and customized for [Computer Science House](https://csh.rit.edu). The original repository can be found [here](https://github.com/cohoe/starrs-web).

More information about STARRS, including a [detailed installation guide](http://www.grantcohoe.com/blog/2013/04/24/starrs-installation-guide/), can be found on the [original author's website](http://grantcohoe.com/projects/starrs).

## Installation

The following guide should be used in place of the "Web Interface" section of the STARRS installation guide. If you're not installing STARRS in the default Apache webroot directory, replace `/var/www/html` in the commands below with the STARRS webroot.

1. Change directory to `/var/www/html` and clone the repository. Note the `.` at the end of the clone command.

```
[root@starrs-test ~]# cd /var/www/html/
[root@starrs-test html]# git clone https://github.com/cohoe/starrs-web -q .
```

2. Install the frontend dependencies with [Bower](https://bower.io).

```
[root@starrs-test ~]# bower install
```

3. Copy `application/config/database.php.example` to `application/config/database.php`, then edit the copied/renamed database file and enter your database connection settings. Example:

```
$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'starrs_admin';
$db['default']['password'] = 'adminpass';
$db['default']['database'] = 'starrs';
````

4. Copy `application/config/impulse.php.example` to `application/config/impulse.php`. For this web environment, the defaults in this file are fine. In this file you can change which environment variable to get the current user from.

5. Apache needs to be given some special instructions to serve up the application correctly. Create a file at `/etc/httpd/conf.d/starrs.conf` with the following contents:

```
<Directory "/var/www/html">
        AllowOverride all
        AuthType basic
        AuthName "STARRS Sample Auth (root:admin)"
        AuthBasicProvider file
        AuthUserFile    "/etc/httpd/conf.d/starrs-auth.db"
        require valid-user
</Directory>
```

6. Since we reference an authentication database, you will need to create this file (starrs-auth.db).

```
htpasswd -b -c /etc/httpd/conf.d/starrs-auth.db root admin
```

7. Restart Apache to apply the changes (a reload is not sufficient enough).

```
service httpd restart
```
