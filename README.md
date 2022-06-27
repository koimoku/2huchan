# 2huchan
a simple touhou imageboard created in html, css, and php, meant to run on tor

# Prerequisites:
a unix-based operating system

git

apache

mysql ??

tor

`sudo apt install git apache2 tor mysql-server`

# Building:
1. Set your directory to your *htdocs* folder, usually in /opt/lampp/htdocs

`cd /path/to/htdocs`

2. Clone the repository to the htdocs repository

`git clone https://github.com/koimoku/2huchan.git .`

*You might need root access*

3. Edit your apache port

*Replace editor with your text editor*

UBUNTU:
`editor /etc/apache2/ports.conf`

Add `Listen 8080`

RHEL/CENTOS:
`editor /etc/httpd/conf/httpd.conf`

Add `Listen 8080`

XAMPP:
`manage servers > apache web server > configure > port`

Change to `8080`

3. Start the apache webserver

`sudo systemctl start apache2`

To check if the service is running:

`sudo systemctl status apache2`

4. Add port 8080 to torrc

*Replace editor with your text editor*

`sudo editor /etc/tor/torrc`

Find: *This section is just for location-hidden services*

Uncomment: `#HiddenServiceDir /var/lib/tor/hidden_service/`

Uncomment: `#HiddenServicePort 80 127.0.0.1:80`

Change: `80` to `8080` and ignore the port after the colon

5. Start tor to generate onion address

`sudo tor`

*if it outputs an error, try:* `sudo systemctl restart tor`

Your hidden service should be running if tor outputs no errors.

To find your onion address, type:

`sudo cat /var/lib/tor/hidden_service/hostname`

Your hidden service will be accessible without portforwarding your router.

# FIXES TO PROBLEMS

`htdocs/captcha/captcha.php` requires writing access to store the captcha image in your protected directory.

To fix this, run: `sudo chmod a+w -R opt/lampp/htdocs`, although this may be insecure.

# WORK IN PROGRESS
mysql database stuff
