# ObjectOrientedPrincipesPHP-revision

Revision From Laracast https://laracasts.com/series/object-oriented-principles-in-php-2024-edition/

# Objectif

Build a FileStorage interface with multiple implementations that can be swapped out, based upon the current environment.

# 1

Create local file storage and S3 file storage who can be executed manually

# 2

Create an interface implemented in S3Storage and LocalStorage classes to be used on index file.
The goal is to use the same methods from the interface to have a generic use on index

# 3

Create a generic Storage class with env file to use S3 or Local put method.
In the .env file file_storage will determine which service choose.


