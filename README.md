# 🐳 Multi-Container Blog with Database

A beginner-friendly Docker project that runs a fully functional WordPress blog using multiple containers — demonstrating real-world containerization and DevOps concepts.

![Docker](https://img.shields.io/badge/Docker-2496ED?style=for-the-badge&logo=docker&logoColor=white)
![WordPress](https://img.shields.io/badge/WordPress-21759B?style=for-the-badge&logo=wordpress&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![phpMyAdmin](https://img.shields.io/badge/phpMyAdmin-6C78AF?style=for-the-badge&logo=phpmyadmin&logoColor=white)

---

## 📌 What This Project Does

This project spins up a fully working WordPress blog using Docker Compose — with MySQL as the database and phpMyAdmin as a visual database manager. All three services run in separate containers connected through a private Docker network.

No manual installation of WordPress, MySQL, or PHP required. Just one command and everything runs.

---

## 🏗️ Architecture

```
Your Browser
     │
     ├── localhost:8080 ──▶ WordPress Container
     │                            │
     │                            ▼
     │                      MySQL Container
     │
     └── localhost:8081 ──▶ phpMyAdmin Container
                                  │
                                  ▼
                            MySQL Container
```

---

## 🧰 Tech Stack

| Tool | Purpose |
|---|---|
| Docker & Docker Compose | Container orchestration |
| WordPress | Blog frontend and CMS |
| MySQL 8.0 | Database |
| phpMyAdmin | Visual database manager |

---

## 📁 Project Structure

```
Multi-container-Blog-with-Database/
├── docker-compose.yml      # Defines all services
├── .env                    # Environment variables (not pushed to GitHub)
├── .env.example            # Safe template for others
├── .gitignore              # Protects sensitive files
└── README.md               # This file
```

---

## 🚀 Getting Started

### Prerequisites
- [Docker Desktop](https://docs.docker.com/get-docker/) installed and running

### Steps

1. Clone the repository:
```bash
git clone https://github.com/kishore2k05/Multi-container-Blog-with-Database.git
cd Multi-container-Blog-with-Database
```

2. Create your `.env` file:
```bash
cp .env.example .env
```

3. Update the `.env` file with your own passwords.

4. Start all containers:
```bash
docker compose up -d
```

5. Open your browser:
   - **WordPress:** `http://localhost:8080`
   - **phpMyAdmin:** `http://localhost:8081`

---

## 🔧 Environment Variables

Create a `.env` file based on `.env.example`:

```env
MYSQL_ROOT_PASSWORD=your_root_password
MYSQL_DATABASE=wordpress
MYSQL_USER=your_username
MYSQL_PASSWORD=your_password
WORDPRESS_DB_USER=your_username
WORDPRESS_DB_PASSWORD=your_password
WORDPRESS_DB_NAME=wordpress
WORDPRESS_PORT=8080
```

---

## 🎮 Common Commands

```bash
# Start all containers
docker compose up -d

# Stop all containers (data preserved)
docker compose down

# View running containers
docker compose ps

# View logs
docker compose logs -f

# Access MySQL directly
docker exec -it mysql-db mysql -u root -p
```

---

## 📚 Concepts Demonstrated

- **Multi-container architecture** — Each service runs in its own isolated container
- **Container networking** — Services communicate through a private bridge network
- **Data persistence** — Volumes ensure data survives container restarts
- **Environment variables** — Sensitive config kept out of source code
- **Docker Compose** — Managing multiple containers with a single file

---

## ⚠️ Important Notes

- This project is for **learning and development only**
- Never commit your `.env` file to GitHub
- For production use, enable HTTPS and use strong passwords

---

## 👨‍💻 Author

**Kishore Gowthaman**
- GitHub: [@kishore2k05](https://github.com/kishore2k05)