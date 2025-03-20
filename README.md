# Laravel Pet API Project

## Opis projektu

To jest projekt API w Laravel 12.2, który umożliwia zarządzanie zwierzętami (CRUD) za pomocą zasobu `/pet`. Aplikacja korzysta z API opartego na tokenach (Sanctum) i jest zabezpieczona przed dostępem nieautoryzowanych użytkowników. Projekt zawiera także dashboard z linkiem do zasobu `/pet`, a także z testowanie API.

## Wymagania

- PHP 8.2+
- Composer
- Laravel 12.2
- MySQL lub SQLite
- Postman/cURL do testowania API

## Instrukcje instalacji i konfiguracji

### 1. Klonowanie repozytorium

Skopiuj repozytorium na swoje lokalne środowisko:

```bash
git clone https://github.com/twoje-repozytorium.git
cd twoje-repozytorium
```

### 2. Instalacja zależności

Zainstaluj wszystkie zależności PHP za pomocą Composer:

```bash
composer install
```

### 3. Konfiguracja środowiska

Skopiuj plik `.env.example` do `.env`:

```bash
cp .env.example .env
```

Następnie, skonfiguruj bazę danych w pliku `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=twoja_baza_danych
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Wygenerowanie klucza aplikacji

Wygeneruj klucz aplikacji:

```bash
php artisan key:generate
```

### 5. Migracje bazy danych

Uruchom migracje bazy danych, aby utworzyć odpowiednie tabele:

```bash
php artisan migrate
```

### 6. Uruchomienie serwera

Uruchom lokalny serwer deweloperski:

```bash
php artisan serve
```

Domyślnie serwer będzie dostępny pod adresem: [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## Instrukcje testowania API

Aby przetestować API, użyj cURL lub Swaggera. Poniżej znajdziesz instrukcje testowania API za pomocą obu metod.

### 1. Rejestracja nowego użytkownika

Aby zarejestrować nowego użytkownika, wyślij `POST` na endpoint `/api/register`:

```bash
curl -X POST http://127.0.0.1:8000/api/register -H "Accept: application/json" -d "name=Test User&email=test@example.com&password=password123&password_confirmation=password123"
```

### 2. Logowanie użytkownika

Aby zalogować użytkownika i uzyskać token, wyślij `POST` na endpoint `/api/login`:

```bash
curl -X POST http://127.0.0.1:8000/api/login -H "Accept: application/json" -d "email=test@example.com&password=password123"
```

Otrzymasz odpowiedź w postaci tokenu:

```json
{
    "token": "TOKEN_TUTAJ"
}
```

### 3. Testowanie API z tokenem

Aby przetestować CRUD operacje na zasobie `/pets`, musisz dodać nagłówek `Authorization` z tokenem.

#### Pobranie wszystkich zwierząt:

```bash
curl -X GET http://127.0.0.1:8000/api/pets -H "Accept: application/json" -H "Authorization: Bearer TOKEN_TUTAJ"
```

#### Dodanie nowego zwierzęcia:

```bash
curl -X POST http://127.0.0.1:8000/api/pets -H "Accept: application/json" -H "Authorization: Bearer TOKEN_TUTAJ" -d "name=Dog&species=Canine"
```

#### Aktualizacja zwierzęcia:

```bash
curl -X PUT http://127.0.0.1:8000/api/pets/1 -H "Accept: application/json" -H "Authorization: Bearer TOKEN_TUTAJ" -d "name=Updated Dog&species=Canine"
```

#### Usunięcie zwierzęcia:

```bash
curl -X DELETE http://127.0.0.1:8000/api/pets/1 -H "Accept: application/json" -H "Authorization: Bearer TOKEN_TUTAJ"
```

---

## Testowanie API za pomocą Swagger UI

1. **Swagger UI** jest dostępne po uruchomieniu aplikacji.
2. **Testowanie API** za pomocą Swaggera odbywa się poprzez interfejs, który umożliwia wykonywanie zapytań bezpośrednio z poziomu przeglądarki. Wystarczy kliknąć na odpowiednie endpointy i przesłać zapytania.

### Przykłady zapytań w Swagger UI:

1. **POST `/api/register`**: Rejestracja nowego użytkownika.
2. **POST `/api/login`**: Logowanie użytkownika.
3. **GET `/api/pets`**: Pobranie listy wszystkich zwierząt.
4. **POST `/api/pets`**: Dodanie nowego zwierzęcia.
5. **PUT `/api/pets/{id}`**: Edycja istniejącego zwierzęcia.
6. **DELETE `/api/pets/{id}`**: Usunięcie zwierzęcia.

Swagger automatycznie wygeneruje wszystkie potrzebne informacje o parametrach, nagłówkach, ciałach zapytań oraz formatach odpowiedzi.

---

## Uwagi

- Upewnij się, że masz poprawnie skonfigurowane środowisko PHP oraz bazę danych.
- Jeśli napotkasz jakiekolwiek problemy, sprawdź logi aplikacji (`storage/logs/laravel.log`), aby zidentyfikować błędy.

---

**Konfiguracja środowiska deweloperskiego**:

Wszystkie kroki związane z konfiguracją aplikacji, instalacją zależności i uruchomieniem serwera są zawarte w sekcji "Instrukcje instalacji i konfiguracji".
#
