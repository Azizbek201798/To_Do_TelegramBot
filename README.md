# TODO App

## Description
Yet another Todo app. This application allows users to manage their tasks efficiently. It includes features like adding, completing, and deleting tasks. Additionally, it integrates with Telegram to manage tasks via a bot.

## Requirements
- PHP 8.3 or higher
- Composer
- MySQL

## Installation
1. Clone the repository:
   ```sh
   git clone git@github.com:Azizbek201798/To_Do_TelegramBot.git
   cd todo-app
Install dependencies using Composer:
sh

Copy
composer install
Set up the database:
Create a MySQL database named todo_app.
Import the dump.sql file to set up the tables and initial data:
sh

Copy
mysqldump -u root -p todo_app < dump.sql
Configure the database connection in src/DB.php:
php

Copy
// Database configuration goes here
Usage
Web Interface
Start a local PHP server:
sh

Copy
php -S localhost:9090
Open your browser and navigate to http://localhost:9090.
Telegram Bot
Set up your Telegram bot by creating a new bot on Telegram and obtaining the bot token.
Update the bot token in src/Bot.php:
php

Copy
// Update bot token here
Set up a webhook for your bot to point to your server's endpoint.
Contributing
Feel free to submit issues or pull requests. For major changes, please open an issue first to discuss what you would like to change.

License
This project is licensed under the MIT License.
