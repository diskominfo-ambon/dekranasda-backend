## Dekranasda - Backend

Repositori ini berisi full layanan Backend Dekranasda yang menyediakan API untuk aplikasi Dekranasda pada sisi SPA [disini](https://github.com/diskominfo-ambon/dekranasda).



## Teknologi

Laravel merupakan base utama teknologi yang digunakan pada layanan Backend Dekranasda, dan ditambah untuk sistem basis datanya menggunakan Mysql.

## Alur
### User - Admin
```
    [user]  1 -> * [product]

    [post] -> CRUD

    [category] -> CRUD

    [user] -> CRUD
```

### User - Pengguna
```
    [user]  1 -> * [product]

    [product] -> CRUD
```

### Product
```
    [product]  * -> 1 [user]

    [product] 1 -> * [attchment]

    [product] 1 -> * [category]

    [attchment] -> CRUD

```
