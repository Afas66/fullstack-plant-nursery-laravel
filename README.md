# Greenthumb Nursery | グリーンサム・ナーセリー

![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php )
![Laravel](https://img.shields.io/badge/Laravel-10.x-FF2D20?style=for-the-badge&logo=laravel )
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql )
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-3.x-06B6D4?style=for-the-badge&logo=tailwindcss )
![JavaScript](https://img.shields.io/badge/JavaScript-ES6-F7DF1E?style=for-the-badge&logo=javascript )

---

### 🇬🇧 English

Greenthumb Nursery is a full-stack web application designed to manage the inventory, sales, and customer data for a plant nursery. This project demonstrates a robust backend built with Laravel and a modern, responsive frontend using Tailwind CSS. It showcases best practices in web development, from database design to user authentication.

### 🇯🇵 日本語

グリーンサム・ナーセリーは、植物園の在庫、販売、顧客データを管理するために設計されたフルスタックのWebアプリケーションです。このプロジェクトは、Laravelで構築された堅牢なバックエンドと、Tailwind CSSを使用したモダンでレスポンシブなフロントエンドを特徴としています。データベース設計からユーザー認証まで、Web開発におけるベストプラクティスを実証しています。

---

## ✨ Key Features | 主な機能

-   **Product Management:** Full CRUD (Create, Read, Update, Delete) functionality for plant inventory.
-   **User Authentication:** Secure user registration and login system using Laravel Breeze/Fortify.
-   **Responsive UI:** A clean and modern user interface built with Tailwind CSS that works on all devices.
-   **Database Management:** Efficient data handling with Eloquent ORM and database migrations.
-   **SQL Scripts:** Includes SQL files for initial database setup and sample data.

---

## DEMO
<video controls src="public/assets/demo/post.mp4" title="Title"></video>

## 🚀 Getting Started | インストール方法

### 🇬🇧 English

Follow these steps to get the project running on your local machine.

**Prerequisites:**
- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL

**Installation:**

1.  **Clone the repository:**
    ```bash
    git clone https://github.com/your-username/greenthumb-nursery-1.git
    cd greenthumb-nursery-1
    ```

2.  **Install dependencies:**
    ```bash
    composer install
    npm install
    ```

3.  **Set up the environment file:**
    ```bash
    cp .env.example .env
    ```
    *Then, open the `.env` file and configure your database credentials (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` ).*

4.  **Generate application key:**
    ```bash
    php artisan key:generate
    ```

5.  **Run database migrations and seeders:**
    *This will create the necessary tables and populate them with initial data.*
    ```bash
    php artisan migrate --seed
    ```
    *(Alternatively, you can import the `greenthumb_nursery.sql` file manually.)*

6.  **Compile assets:**
    ```bash
    npm run dev
    ```

7.  **Start the development server:**
    ```bash
    php artisan serve
    ```
    The application will be available at `http://127.0.0.1:8000`.

### 🇯🇵 日本語

ローカルマシンでプロジェクトを起動するための手順です 。

**前提条件:**
- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL

**インストール:**

1.  **リポジトリをクローンします:**
    ```bash
    git clone https://github.com/your-username/greenthumb-nursery-1.git
    cd greenthumb-nursery-1
    ```

2.  **依存関係をインストールします:**
    ```bash
    composer install
    npm install
    ```

3.  **環境ファイルを設定します:**
    ```bash
    cp .env.example .env
    ```
    *その後、`.env`ファイルを開き、データベース情報（`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` ）を設定してください。*

4.  **アプリケーションキーを生成します:**
    ```bash
    php artisan key:generate
    ```

5.  **データベースのマイグレーションとシーディングを実行します:**
    *これにより、必要なテーブルが作成され、初期データが投入されます。*
    ```bash
    php artisan migrate --seed
    ```
    *（または、`greenthumb_nursery.sql`ファイルを手動でインポートすることも可能です。）*

6.  **アセットをコンパイルします:**
    ```bash
    npm run dev
    ```

7.  **開発サーバーを起動します:**
    ```bash
    php artisan serve
    ```
    アプリケーションは `http://127.0.0.1:8000` で利用可能になります 。

---

## 🗃️ Database Schema | データベース設計

A visual representation of the database schema is available below. This illustrates the relationships between the `users`, `products`, and `orders` tables.

*(It's a great idea to create an ERD and link the image here. This shows strong backend planning skills.)*

[View Database ERD](docs/er-diagram.drawio.png)

