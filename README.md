# 2huchan
a simple touhou imageboard created in html and css, meant to run on tor

# Prerequisites:
a unix-based operating system
git
python, php cli, or another webserver

# Building:
1. Clone the repository
`$ git clone https://github.com/koimoku/2huchan.git`
`$ cd 2huchan`

2. Start the webserver
PYTHON:
`$ python3 -m http.server --bind 127.0.0.1 port`
* for port, use 8080 if you're planning to use torrc

PHP:
`$ php -S 127.0.0.1:port -t directory`
* for directory, set your directory or use . for the current directory you're in

# Notes:
please note that a PHP webserver or something like nginx might be necessary if php code is used, as python can only support html and imbedded css

none of the backend stuff is working rn, and i intend to add that later

# Planned features:
more pages for each specific board
a captia system to prevent botting
full capability of posting and post moderation
open traffic to my hidden service
