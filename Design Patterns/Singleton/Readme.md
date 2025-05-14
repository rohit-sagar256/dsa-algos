# 🧩 Singleton Pattern in PHP

This project demonstrates the **Singleton Design Pattern** in PHP, including dependency injection and best practices for testability, flexibility, and real-world usage.

---

## 📌 What is Singleton?

The Singleton Pattern ensures that a class has **only one instance** and provides a **global access point** to it.

### ✅ Key Characteristics:
- Single instance per application
- Controlled access through a static method
- Private constructor prevents direct instantiation

---

## 🛠️ Implementations

### 1. Basic Singleton

- Ensures only one object is created
- Prevents cloning or unserialization
- Useful for shared resources like configuration, loggers

**File**: `/BasicSingleton.php`

---

### 2. Dependency-Injected Singleton

- Allows injecting dependencies (like cache or DB connections)
- Better for testability and configuration
- Supports more flexible, decoupled design

**File**: `/CacheManager.php`, `/ArrayCache.php`

---

## 🧪 Example Usage

```php
$cacheHandler = new ArrayCache();
$cache = CacheManager::getInstance($cacheHandler);

$cache->put('user_1', 'Rohit');
echo $cache->get('user_1'); // Output: Rohit
