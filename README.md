# TODO App

## Description
Yet another Todo app. This application allows users to manage their tasks efficiently. It includes features like adding, completing, and deleting tasks. Additionally, it integrates with Telegram to manage tasks via a bot.

## Requirements
- PHP 8.3 or higher
- Composer
- MySQL

## Installation
1. **Clone the repository:**
    ```sh
    git clone https://github.com/rustam-swe/todo-app.git
    cd todo-app
    ```

2. **Install dependencies using Composer:**
    ```sh
    composer install
    ```

3. **Set up the database:**
    - Create a MySQL database named `todo_app`.
    - Import the `dump.sql` file to set up the tables and initial data:
      ```sh
      mysqldump -u root -p todo_app < dump.sql
      ```

4. **Configure the database connection in `src/DB.php`:**
    ```php
    // Database configuration goes here
    ```

## Usage
### Web Interface
1. **Start a local PHP server:**
    ```sh
    php -S localhost:9090
    ```
2. **Open your browser and navigate to [http://localhost:9090](http://localhost:9090).**

### Telegram Bot
1. **Set up your Telegram bot by creating a new bot on Telegram and obtaining the bot token.**
2. **Update the bot token in `src/Bot.php`:**
    ```php
    // Update bot token here
    ```
3. **Set up a webhook for your bot to point to your server's endpoint.**

## Contributing
Feel free to submit issues or pull requests. For major changes, please open an issue first to discuss what you would like to change.

## License
This project is licensed under the MIT License.
