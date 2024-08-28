# Website setup

Required servers/dependencies - php, MySql, Composer, node.js

## Database Setup

Before you start, ensure you have a MySQL database server running. Execute the following SQL commands to create a new user and set up the necessary database:

```sql
CREATE USER '{username}'@'%' IDENTIFIED BY '{password}';
GRANT USAGE ON *.* TO '{username}'@'%';
CREATE DATABASE IF NOT EXISTS {database};
GRANT ALL PRIVILEGES ON {database}.* TO '{username}'@'%';
```

Replace {username}, {password}, and {database} with your desired username, password, and database name, respectively.

## Clone the Repository and Install Dependencies

Clone the repository from GitHub:

```bash
git clone https://github.com/emilslec/pieminas_vietu_majaslapa.git
```

Navigate into the project directory:

```bash
cd pieminas_vietu_majaslapa
```

Install PHP dependencies using Composer:

```bash
composer install
```

Copy the example environment file to create your .env file:

```bash
copy .env.example .env
```

Update Environment Configuration
Open the .env file and update the database configuration section with your database details (notepad .env can be used to open the file):

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE={database}
DB_USERNAME={username}
DB_PASSWORD={password}
```

Replace {database}, {username}, and {password} with the values you used in the database setup.

Application Setup
Generate the application key:

```bash
php artisan key:generate
```

Run the database migrations:

```bash
php artisan migrate
```

Install Node.js dependencies:

```bash
npm install
```

Compile assets:

```bash
npm run build
```

Create a link for the storage directory:

```bash
php artisan storage:link
```

(Optional) Fresh migrations and seed the database:

```bash
php artisan migrate:fresh --seed
```

Saite attēliem: https://failiem.lv/u/gh5xgzqwgj
