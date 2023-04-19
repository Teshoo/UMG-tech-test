# UMG-tech-test
Technical test consisting of different user authentification through Symfony:
- Basic authentication;
- Ldap authentication.

This project works with **Symfony** and **Docker** (MySQL and Ldap servers)

## Setup

Install Docker, then pull the following docker images:

- OpenLDAP docker image packaged by bitnami
```bash
  docker pull bitnami/openldap
```

- MySQL docker image 
```bash
  docker pull mysql
```

## Run Locally

Clone the project
```bash
  git clone https://github.com/Teshoo/UMG-tech-test.git
```

Go to the project directory
```bash
  cd ... /UMG-tech-test.git
```

Install dependencies
```bash
  composer install
```

Build (and run) the MySQL and Ldap servers
```bash
  docker-compose up -d
```

Setup the database
```bash
  symfony console make:migrations
  symfony console doctrine:migrations:migrate
  symfony console doctrine:fixtures:load
```

Run the web server
```bash
  symfony serve -d
```


## Authentication information

The app structure is composed of 5 different pages:

- Home
- Basic login (MySQL)
- Ldap login
- Profile (only accessible for users with `ROLE_USER`)
- Admin (only accessible for users with `ROLE_ADMIN`)

#### MySQL
| Login | Password     | Role                |
| :-------- | :------- | :------------------------- |
| `user@mail.com` | `user` | `ROLE_USER` |
| `admin@mail.com` | `admin` | `ROLE_USER`, `ROLE_ADMIN` |

#### Ldap
| Login | Password     | Role                |
| :-------- | :------- | :------------------------- |
| `user01` | `password1` | `ROLE_USER` |
| `user02` | `password2` | `ROLE_USER` |

#### Notes:
- Ldap passwords are not hashed
- Ldap does not provide users with admin role
- Firewalls share the same contexte, which means MySQL and Ldap users can access the same restricted pages


