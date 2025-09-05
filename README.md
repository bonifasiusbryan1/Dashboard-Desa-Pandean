# 🏘️ Dashboard of Socio-Economic Conditions in Pandean Village

<div align="center">
  
  <img src="public/images/kabupaten.png" alt="Logo UNDIP" width="120" />
  
  ### *A dashboard that depicts the community’s socioeconomic conditions.*
  
[![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com/)
[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![Vite](https://img.shields.io/badge/Vite-646CFF?style=for-the-badge&logo=vite&logoColor=white)](https://vitejs.dev/)
  
</div>

---

## ✨ Overview

> **Kuliah Kerja Nyata (KKN) project** commissioned by the Village Secretary. Built with Laravel and a MySQL database. Data was sourced from the village’s existing records and interviews with local officials. I served as the full-stack developer, handling database schema design, REST APIs/back end, and front-end UI.

### 🎯 Key Features

- 🏡 **Real-Time Socioeconomic Insights** - Live view of Pandean Village community indicators
- ✍️ **Streamlined Data Entry** - Easy, accurate forms for adding and updating records
- 👥 **Role-Based Authentication** - Access tailored to village officials’ responsibilities
- 📱 **Modern, Responsive Design** - Seamless experience on mobile, tablet, and desktop

---

## 👥 User Roles & Permissions

<div align="center">

| 🎓 Role | 📝 Description | 🔑 Key Features |
|---------|----------------|------------------|
| **Village Head** | Top-level administrator overseeing all hamlets | View dashboards for all hamlets; view, edit, and delete data across the entire village |
| **Village Secretary** | Administrative manager assisting the Village Head | View dashboards for all hamlets; view, edit, and delete data across the entire village |
| **Hamlet Head (×7)** | Leader of a specific hamlet | View their hamlet’s dashboard; view, edit, and delete their hamlet’s data; separate dashboards and data-entry forms per hamlet |

</div>

---

## 🛠️ Technology Stack

<div align="center">

### Backend
![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat-square&logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=flat-square&logo=laravel&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat-square&logo=mysql&logoColor=white)

### Frontend
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=flat-square&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=flat-square&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=flat-square&logo=javascript&logoColor=black)
![Bootstrap](https://img.shields.io/badge/Bootstrap-7952B3?style=flat-square&logo=bootstrap&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-646CFF?style=flat-square&logo=vite&logoColor=white)

</div>

---

## 📸 Application Screenshots

> **Using Dummy Data (NOT related to the original village data)**.

<details>
<summary>🖼️ <strong>Click to view application interface</strong></summary>

<br>

<div align="center">

### 🔐 Authentication
<img src="public/screenshots/login.png" width="600" />

### 📊 Village Head and Village Secretary - Dashboard
<img src="public/screenshots/dashboard1.png" alt="Student Portal" width="600" />
<img src="public/screenshots/dashboard2.png" alt="Student Portal" width="600" />
<img src="public/screenshots/dashboard3.png" alt="Student Portal" width="600" />
<img src="public/screenshots/dashboard4.png" alt="Student Portal" width="600" />
<img src="public/screenshots/dashboard5.png" alt="Student Portal" width="600" />
<img src="public/screenshots/dashboard6.png" alt="Student Portal" width="600" />

### 📈 Hamlet Head - Dashboard
<img src="public/screenshots/dashboarddusun1.png" alt="Student Portal" width="600" />
<img src="public/screenshots/dashboarddusun2.png" alt="Student Portal" width="600" />
<img src="public/screenshots/dashboarddusun3.png" alt="Student Portal" width="600" />
<img src="public/screenshots/dashboarddusun4.png" alt="Student Portal" width="600" />

### ✍️ Input Data
<img src="public/screenshots/inputdata1.png" alt="Department Analytics" width="600" />
<img src="public/screenshots/inputdata2.png" alt="Department Analytics" width="600" />
<img src="public/screenshots/inputdata3.png" alt="Department Analytics" width="600" />

</div>

</details>

---

## 🚀 Quick Start Guide

### Prerequisites
- 🐘 **PHP 8.1+**
- 🎵 **Composer**
- 🗄️ **MySQL 8.0+**
- 📦 **Node.js & NPM**

### Installation

```bash
# 📥 Clone the repository
git clone https://github.com/bonifasiusbryan1/Dashboard-Desa-Pandean.git
cd Dashboard-Desa-Pandean

# 📦 Install dependencies
composer install && npm install

# ⚙️ Environment setup
cp .env.example .env
# Configure your database settings in .env

# 🗄️ Database setup
mysql -u root -p -e "CREATE DATABASE your_database_name;"
php artisan migrate

# 🔑 Generate application key
php artisan key:generate

# 🔗 Create storage symlink
php artisan storage:link

# 🚀 Launch the application
npm run dev
php artisan serve
```

### 🌐 Access the Application
Open your browser and navigate to: `http://127.0.0.1:8000`

---

## 📂 Project Structure

```
Simple-Student-Monitoring-System/
├── 📁 app/                 # Application core files
├── 📁 database/            # Database migrations & seeds
├── 📁 public/              # Public assets & screenshots
├── 📁 resources/           # Views, CSS, JS resources
├── 📁 routes/              # Application routes
```

</div>
