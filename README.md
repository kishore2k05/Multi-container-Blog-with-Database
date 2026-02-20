# WordPress + MySQL Docker Project

A beginner-friendly Docker project that demonstrates multi-container applications by running WordPress and MySQL in separate containers.

## 🎯 Project Overview

This project sets up a fully functional WordPress blog using Docker containers. WordPress handles the web interface while MySQL stores all the data. The containers communicate through a Docker network, demonstrating real-world microservices architecture.

## 📚 What You'll Learn

- **Container Networking**: How containers communicate with each other
- **Environment Variables**: Passing configuration to containers
- **Data Persistence**: Using volumes to preserve data across container restarts
- **Port Mapping**: Exposing services to your host machine
- **Docker Compose**: Managing multi-container applications

## 🛠️ Prerequisites

- Docker installed on your machine ([Get Docker](https://docs.docker.com/get-docker/))
- Docker Compose (usually comes with Docker Desktop)
- Basic command line knowledge

## 🚀 Quick Start

### Option 1: Using Docker Compose (Recommended)

1. Clone or download this project
2. Navigate to the project directory
3. Run:
```bash
docker-compose up -d
```
4. Open your browser and go to `http://localhost:8080`
5. Follow WordPress setup wizard

### Option 2: Using Docker Commands

1. Create a Docker network:
```bash
docker network create wordpress-network
```

2. Start MySQL container:
```bash
docker run -d \
  --name mysql-db \
  --network wordpress-network \
  -e MYSQL_ROOT_PASSWORD=rootpassword \
  -e MYSQL_DATABASE=wordpress \
  -e MYSQL_USER=wpuser \
  -e MYSQL_PASSWORD=wppassword \
  -v mysql-data:/var/lib/mysql \
  mysql:8.0
```

3. Start WordPress container:
```bash
docker run -d \
  --name wordpress-site \
  --network wordpress-network \
  -p 8080:80 \
  -e WORDPRESS_DB_HOST=mysql-db \
  -e WORDPRESS_DB_USER=wpuser \
  -e WORDPRESS_DB_PASSWORD=wppassword \
  -e WORDPRESS_DB_NAME=wordpress \
  -v wordpress-data:/var/www/html \
  wordpress:latest
```

4. Access WordPress at `http://localhost:8080`

## 📁 Project Structure

```
wordpress-docker-project/
├── docker-compose.yml          # Docker Compose configuration
├── README.md                   # This file
└── .env.example               # Example environment variables
```

## 🔧 Configuration

### Environment Variables

Create a `.env` file based on `.env.example`:

```env
# MySQL Configuration
MYSQL_ROOT_PASSWORD=rootpassword
MYSQL_DATABASE=wordpress
MYSQL_USER=wpuser
MYSQL_PASSWORD=wppassword

# WordPress Configuration
WORDPRESS_DB_HOST=mysql-db
WORDPRESS_DB_USER=wpuser
WORDPRESS_DB_PASSWORD=wppassword
WORDPRESS_DB_NAME=wordpress

# Port Configuration
WORDPRESS_PORT=8080
```

### Ports

- **WordPress**: `8080` (can be changed in docker-compose.yml or .env)
- **MySQL**: Internal only (not exposed to host)

## 📦 Docker Compose File

The `docker-compose.yml` defines both services:

```yaml
version: '3.8'

services:
  mysql:
    image: mysql:8.0
    container_name: mysql-db
    restart: always
    environment:
      MYSQL_ROOT_PASSWORD: ${MYSQL_ROOT_PASSWORD}
      MYSQL_DATABASE: ${MYSQL_DATABASE}
      MYSQL_USER: ${MYSQL_USER}
      MYSQL_PASSWORD: ${MYSQL_PASSWORD}
    volumes:
      - mysql-data:/var/lib/mysql
    networks:
      - wordpress-network

  wordpress:
    image: wordpress:latest
    container_name: wordpress-site
    restart: always
    ports:
      - "${WORDPRESS_PORT}:80"
    environment:
      WORDPRESS_DB_HOST: mysql
      WORDPRESS_DB_USER: ${WORDPRESS_DB_USER}
      WORDPRESS_DB_PASSWORD: ${WORDPRESS_DB_PASSWORD}
      WORDPRESS_DB_NAME: ${WORDPRESS_DB_NAME}
    volumes:
      - wordpress-data:/var/www/html
    depends_on:
      - mysql
    networks:
      - wordpress-network

volumes:
  mysql-data:
  wordpress-data:

networks:
  wordpress-network:
    driver: bridge
```

## 🎮 Common Commands

### Start containers
```bash
docker-compose up -d
```

### Stop containers
```bash
docker-compose down
```

### Stop and remove volumes (⚠️ deletes all data)
```bash
docker-compose down -v
```

### View logs
```bash
docker-compose logs -f
```

### View specific service logs
```bash
docker-compose logs -f wordpress
docker-compose logs -f mysql
```

### Check running containers
```bash
docker-compose ps
```

### Restart containers
```bash
docker-compose restart
```

### Access MySQL database
```bash
docker exec -it mysql-db mysql -u wpuser -p
# Enter password: wppassword
```

### Access WordPress container shell
```bash
docker exec -it wordpress-site bash
```

## 🔍 Troubleshooting

### WordPress shows "Error establishing database connection"

1. Check if MySQL container is running:
```bash
docker ps
```

2. Check MySQL logs:
```bash
docker logs mysql-db
```

3. Verify environment variables match between services

4. Wait 30 seconds after starting containers for MySQL to initialize

### Port 8080 already in use

Change the port in `.env` file:
```env
WORDPRESS_PORT=8081
```
Then restart: `docker-compose up -d`

### Containers keep restarting

Check logs for errors:
```bash
docker-compose logs
```

### Lost data after restart

Ensure you're not using `docker-compose down -v` which deletes volumes

## 🧪 Testing the Setup

1. Access `http://localhost:8080`
2. Complete WordPress installation
3. Create a test blog post
4. Stop containers: `docker-compose down`
5. Start containers: `docker-compose up -d`
6. Verify your blog post still exists (data persistence!)

## 📈 Next Steps

Once comfortable with this project, try:

1. **Add phpMyAdmin** - Web interface for MySQL database
2. **Custom Theme** - Mount a custom WordPress theme
3. **Nginx Reverse Proxy** - Add Nginx in front of WordPress
4. **SSL/HTTPS** - Set up HTTPS with Let's Encrypt
5. **Backup Strategy** - Automate volume backups
6. **Multiple WordPress Sites** - Run multiple instances
7. **Redis Caching** - Add Redis for improved performance

## 🛡️ Security Notes

⚠️ **Important**: This setup is for learning/development only.

For production use:
- Use strong, unique passwords
- Don't commit `.env` files to git
- Use secrets management
- Enable HTTPS
- Keep images updated
- Restrict MySQL access
- Implement backups
- Use non-root users

## 📚 Resources

- [Docker Documentation](https://docs.docker.com/)
- [WordPress Docker Hub](https://hub.docker.com/_/wordpress)
- [MySQL Docker Hub](https://hub.docker.com/_/mysql)
- [Docker Compose Documentation](https://docs.docker.com/compose/)
- [WordPress Codex](https://codex.wordpress.org/)

## 🤝 Contributing

Feel free to fork this project and submit pull requests with improvements!

## 📝 License

This project is open source and available under the MIT License.

## ❓ Questions?

If you encounter issues or have questions:
1. Check the Troubleshooting section
2. Review Docker logs
3. Consult Docker/WordPress documentation
4. Search for similar issues on Stack Overflow

---

**Happy Learning! 🚀**

Built with ❤️ for learning Docker and containerization
