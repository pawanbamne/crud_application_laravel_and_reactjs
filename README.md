# Inventory Management System

Full-stack CRUD application built with Laravel (Backend API) and React.js (Frontend UI).

## Tech Stack

Backend:
- Laravel 11+
- SQLite
- Laravel Sanctum

Frontend:
- React.js
- Bootstrap
- Axios

## Features

- User Registration
- User Login
- Token Authentication
- Add Product
- Edit Product
- Delete Product
- User-specific inventory
- Low stock highlight
- Protected Dashboard

---

## Backend Setup

cd inventory-api  
composer install  
create database/database.sqlite  
configure .env for sqlite  
php artisan migrate  
php artisan serve  

Runs on:
http://127.0.0.1:8000

---

## Frontend Setup

cd inventory-ui  
npm install  
npm start  

Runs on:
http://localhost:3000
