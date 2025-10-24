# 📚 Projeto CRUD - Livros, Autores e Assuntos (Laravel 12 + Docker + MySQL 8)

Este projeto é um sistema simples de gerenciamento de **Livros**, **Autores** e **Assuntos**, desenvolvido com **Laravel 12** e containerizado com **Docker** usando PHP 8.3 e MySQL 8.

---

## 🧱 Estrutura do Projeto

/backend
 ├── app/
 ├── bootstrap/
 ├── config/
 ├── database/
 │   ├── migrations/
 │   ├── seeders/
 ├── routes/
 │   └── web.php
 ├── docker/
 │   ├── Dockerfile
 │   └── docker-compose.yml
 ├── .env
 ├── composer.json
 └── README.md

---

## ⚙️ Tecnologias Utilizadas

- **PHP 8.3**
- **Laravel 12**
- **MySQL 8.0**
- **Composer**
- **Docker e Docker Compose**
- **Eloquent ORM**
- **Blade Templates (ou API REST)**

---

## 🚀 Configuração e Execução com Docker

### 1️⃣ Clonar o repositório

```bash
git clone https://github.com/seu-usuario/projeto-editora.git
cd projeto-editora/backend
```

### 2️⃣ Criar o arquivo `.env`

Crie o arquivo `.env` com base no `.env.example`:

```bash
cp .env.example .env
```

Atualize as variáveis do banco:

```env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=editora
DB_USERNAME=root
DB_PASSWORD=root
```

### 3️⃣ Subir os containers

```bash
docker-compose up -d --build
```

Isso criará os containers:
- **laravel-app** → PHP 8.3
- **mysql** → MySQL 8
- **phpmyadmin** (opcional) → interface web para o banco

---

## 🧩 Estrutura do Banco de Dados

As principais tabelas:

- **livros** (`Codl`, `Titulo`, `Editora`, `Edicao`, `AnoPublicacao`)
- **autores** (`CodAu`, `Nome`)
- **assuntos** (`CodAs`, `Descricao`)
- **livro_autor** (tabela pivô)
- **livro_assunto** (tabela pivô)

---

## 🧰 Comandos Úteis

### Instalar dependências
```bash
docker exec -it laravel-app composer install
```

### Gerar key do Laravel
```bash
docker exec -it laravel-app php artisan key:generate
```

### Rodar migrations
```bash
docker exec -it laravel-app php artisan migrate
```

### Rodar seeders (dados iniciais)
```bash
docker exec -it laravel-app php artisan db:seed
```

### Acessar o container PHP
```bash
docker exec -it laravel-app bash
```

### Logs do Laravel
```bash
docker logs laravel-app
```

---

## 🌐 Acesso

| Serviço       | URL                              |
|----------------|----------------------------------|
| Laravel App    | http://localhost:8000            |
| PhpMyAdmin     | http://localhost:8080            |
| MySQL          | localhost:3306                   |

---

## 📄 Rotas Principais (CRUD)

### Livros
| Método | Rota             | Descrição            |
|--------|------------------|----------------------|
| GET    | `/livros`        | Lista todos os livros |
| GET    | `/livros/{id}`   | Detalha um livro     |
| POST   | `/livros`        | Cria um novo livro   |
| PUT    | `/livros/{id}`   | Atualiza um livro    |
| DELETE | `/livros/{id}`   | Remove um livro      |

### Autores
| Método | Rota             | Descrição             |
|--------|------------------|-----------------------|
| GET    | `/autores`       | Lista autores         |
| POST   | `/autores`       | Cria novo autor       |
| PUT    | `/autores/{id}`  | Atualiza autor        |
| DELETE | `/autores/{id}`  | Remove autor          |

### Assuntos
| Método | Rota             | Descrição              |
|--------|------------------|------------------------|
| GET    | `/assuntos`      | Lista assuntos         |
| POST   | `/assuntos`      | Cria novo assunto      |
| PUT    | `/assuntos/{id}` | Atualiza assunto       |
| DELETE | `/assuntos/{id}` | Remove assunto         |

---

## 🐳 Exemplo de `docker-compose.yml`

```yaml
version: '3.8'

services:
  laravel-app:
    build:
      context: .
      dockerfile: Dockerfile
    container_name: laravel-app
    ports:
      - "8000:80"
    volumes:
      - .:/var/www/html
    depends_on:
      - mysql

  mysql:
    image: mysql:8
    container_name: mysql
    restart: always
    environment:
      MYSQL_DATABASE: editora
      MYSQL_ROOT_PASSWORD: root
    ports:
      - "3306:3306"
    volumes:
      - db_data:/var/lib/mysql

  phpmyadmin:
    image: phpmyadmin/phpmyadmin
    container_name: phpmyadmin
    restart: always
    ports:
      - "8080:80"
    environment:
      PMA_HOST: mysql
      PMA_USER: root
      PMA_PASSWORD: root

volumes:
  db_data:
```

---

## 🐘 Exemplo de `Dockerfile`

```dockerfile
FROM php:8.3-apache

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y     libpng-dev libjpeg-dev libfreetype6-dev zip git unzip libonig-dev libxml2-dev     && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

COPY . .

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80
CMD ["apache2-foreground"]
```

---

## 🧑‍💻 Contribuição

1. Faça um fork do projeto  
2. Crie uma branch (`git checkout -b feature/nome-da-feature`)  
3. Commit suas alterações (`git commit -m 'Adiciona nova funcionalidade'`)  
4. Faça push da branch (`git push origin feature/nome-da-feature`)  
5. Crie um Pull Request  

---

## 📜 Licença

Este projeto está sob a licença MIT.  
Sinta-se livre para usar e modificar conforme necessário.

---

👨‍💻 **Autor:** Daniel Oliveira  
📧 **E-mail:** danirecords@terra.com  
🔗 **GitHub:** [https://github.com/danirecords](https://github.com/danirecords)
