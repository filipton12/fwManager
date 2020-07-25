# fwManager
> Its basic web file manager.

## Table of contents
* [General info](#general-info)
* [Technologies](#technologies)
* [Setup](#setup)
* [Features](#features)
* [Status](#status)
* [Contact](#contact)

## General info
fwManager is basic file explorer with uploading and downloading features. </br>
Main feature is sharing, you can share file with someone only with id! Id can be configured as a one-time share.

## Technologies
Project is created with:
* Html: 5
* Php: 7.4
* JavaScript

## Setup
```bash
sudo apt update
sudo apt install apache2 php -y

sudo mkdir /downdir
sudo chmod -R 777 /downdir

sudo nano /etc/php/7.4/apache2/php.ini
  1. Change "upload_max_filesize" to greater value (you can change M to G)
  2. Change "max_file_uploads" to greater value
  3. Change "post_max_size" to greater value (you can change M to G or 0M for unlimited)
  
cd /var/www/html
git clone https://github.com/filipton/fwManager.git

You can access to uploading site from: http://ip/fwManager
Also you can access file manager from: http://ip/fwManager/filemanager.php
```

## Features:
- [x] Uploading files to secure directory (apache cannot access to them)
- [x] Uploading whole folders
- [x] Downloading files from secure directory
- [ ] Sharing with id
- [x] Basic file manager
- [ ] Basic setup

## Status
Project is: _in progress_

## Contact
Created by [@filipton](https://filipton.github.io/fwManager/) - feel free to contact me!
