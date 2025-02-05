
# Laravel Dependency Deleter Helper

**Laravel Dependency Deleter Helper** is a simple PHP helper function for manually deleting model relationships and associated files in Laravel. This helper is particularly useful when cascade delete is not implemented in your database, and you need to handle dependent records and files in a more controlled way.

## Features

- Manages the deletion of related models and records when cascade delete is not used.
- Optionally deletes image or file columns from the public directory.
- Easy-to-use helper function to clean up dependent models and their files.

## Installation

1. **Download the Helper File**:
   Download the `dependancyDelete.php` file from this repository.

2. **Include the Helper**:
   Place the `dependancyDelete.php` file in a suitable location within your Laravel project, such as the `app/Helpers` directory.

   Then, include it in your `composer.json` autoload section to ensure it's available throughout the project.

   In `composer.json`, add:

   ```json
   "autoload": {
       "files": [
           "app/Helpers/dependancyDelete.php"
       ]
   }
   ```

3. **Run Composer Dump Autoload**:
   After adding the helper to your `composer.json`, run the following command to autoload it:

   ```bash
   composer dump-autoload
   ```

---

## Usage

### `dependancyDelete` Function

The main function of this helper is `dependancyDelete`, which deletes a model and its related models. Optionally, it can also delete image files or other file types stored in the public directory.

#### Parameters:
- **$item**: The model instance that you want to delete, along with its relationships.
- **$image_col (Optional)**: The column name that contains the file path of an image or file. If provided, the helper will attempt to delete the file from the public directory.

#### Example:

```php
// Find a Post by its ID
$post = Post::find($postId);

// Delete the post and all its related comments, and optionally delete its image
dependancyDelete($post, 'image_path');
```

In this example:
- The `Post` model and all its related models (like `Comment`) are deleted.
- If the `image_path` column is specified, the function will also delete the image file from the `public` directory.

### Relationships Deletion


```php
// Example with a model having multiple relationships
$comment = Comment::find($commentId);

// Delete the comment along with its related replies and image
dependancyDelete($comment, 'image_path');
```

### Handling Errors

The helper function will attempt to delete the image file if the `image_col` parameter is provided. If an error occurs during the deletion (e.g., the file doesn't exist), it will throw a `Throwable` exception.

---

## Requirements

- Laravel 5.5+ (or any version compatible with your current setup)
- PHP 7.4+ 

---

## Contributing

This is a simple helper function, but if you have improvements or suggestions, feel free to fork the repository and submit a pull request.
