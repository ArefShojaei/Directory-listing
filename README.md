<img width="1440" height="1024" alt="Cover" src="https://github.com/user-attachments/assets/076a955a-0ce3-4afa-b7e5-7e8bffb57769" />

### How to use that ?

> 1: Check to have version "^8.0" of PHP!
```bash
php --version
```

> 2: Use this pattern in CLI to run server

```bash
php -S [host]:[port] index.php
```

> 3: browse this URL:
```txt
http://[host]:[port]
```

Finally, You can upload files in "public/" folder

### Important Note
If you want to provide a **file downloader** or **file reader** for this project, You should follow these ways:


* helpers.php

> Download file
```php
download_file(string $file);
```
> Read file
```php
read_file(string $file);
```

* process.php

> At line 15
```php
if (is_file($directory)) [download or read]_file($file);
```
