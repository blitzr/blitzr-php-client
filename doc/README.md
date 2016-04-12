# Blitzr PHP client Documentation

## Table of Contents

* [ClientException](#clientexception)
    * [__construct](#__construct)
    * [__toString](#__tostring)
* [ConfigurationException](#configurationexception)
    * [__construct](#__construct-1)
    * [__toString](#__tostring-1)
* [NetworkException](#networkexception)
    * [__construct](#__construct-2)
    * [__toString](#__tostring-2)
* [ServerException](#serverexception)
    * [__construct](#__construct-3)
    * [__toString](#__tostring-3)

## ClientException

ClientException, this exception is fired when the client did not provide all mandatory params.



* Full name: \Blitzr\Exception\ClientException
* Parent class: 



### __construct

ClientException constructor.

```php
ClientException::__construct( string $message, integer $code, object $previous = null ): null
```

Use this constructor to set the error message and code, eventually give a parent exception.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$message` | **string** | Error message |
| `$code` | **integer** | Error code |
| `$previous` | **object** | Previous Exception |




---


### __toString

ClientException toString.

```php
ClientException::__toString(  ): string
```

Return readable exception string





---

## ConfigurationException

ConfigurationException, signal a configuration issue.



* Full name: \Blitzr\Exception\ConfigurationException
* Parent class: 



### __construct

ConfigurationException constructor.

```php
ConfigurationException::__construct( string $message, integer $code, object $previous = null ): null
```

Use this constructor to set the error message and code, eventually give a parent exception.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$message` | **string** | Error message |
| `$code` | **integer** | Error code |
| `$previous` | **object** | Previous Exception |




---


### __toString

ConfigurationException toString.

```php
ConfigurationException::__toString(  ): string
```

Return readable exception string





---

## NetworkException

NetworkException, base exception.



* Full name: \Blitzr\Exception\NetworkException
* Parent class: 



### __construct

NetworkException constructor.

```php
NetworkException::__construct( string $message, integer $code, object $previous = null ): null
```

Use this constructor to set the error message and code, eventually give a parent exception.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$message` | **string** | Error message |
| `$code` | **integer** | Error code |
| `$previous` | **object** | Previous Exception |




---


### __toString

NetworkException toString.

```php
NetworkException::__toString(  ): string
```

Return readable exception string





---

## ServerException

ServerException, base exception.



* Full name: \Blitzr\Exception\ServerException
* Parent class: 



### __construct

ServerException constructor.

```php
ServerException::__construct( string $message, integer $code, object $previous = null ): null
```

Use this constructor to set the error message and code, eventually give a parent exception.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$message` | **string** | Error message |
| `$code` | **integer** | Error code |
| `$previous` | **object** | Previous Exception |




---


### __toString

ServerException toString.

```php
ServerException::__toString(  ): string
```

Return readable exception string





---



--------
> This document was automatically generated from source code comments on 2016-04-12 using [phpDocumentor](http://www.phpdoc.org/) and [cvuorinen/phpdoc-markdown-public](https://github.com/cvuorinen/phpdoc-markdown-public)
