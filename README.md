# 📰 Symfony Blog - Projet TP

Projet de travaux pratiques Symfony : Blog avec système d'articles et de commentaires.

## 🚀 Fonctionnalités

- ✅ CRUD complet des articles
- ✅ Système de commentaires
- ✅ Authentification utilisateurs
- ✅ Upload d'images
- ✅ Interface responsive (Bootstrap 5)
- ✅ Fixtures de données de test

## 🛠️ Technologies

- **Framework** : Symfony 7.1
- **Base de données** : MySQL
- **Frontend** : Twig + Bootstrap 5
- **ORM** : Doctrine

## 📦 Installation
```bash
# Cloner le projet
git clone https://github.com/TON-USERNAME/symfony-blog-tp.git
cd symfony-blog-tp

# Installer les dépendances
composer install

# Configurer la base de données (.env.local)
DATABASE_URL="mysql://root:@127.0.0.1:3306/symfony_blog"

# Créer la base de données
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load

# Lancer le serveur
symfony serve
```

## 🔐 Comptes de test

- **Admin** : admin@example.com / admin123
- **User** : user@example.com / user123

## 📸 Screenshots



## 👨‍💻 Auteur

JOUONANG Mesmin. O - IGL 235 - Finistech

## 📄 Licence

Ce projet est sous licence SEPRO.