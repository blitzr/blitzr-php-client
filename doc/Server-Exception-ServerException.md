Server\Exception\ServerException
===============

ServerException, base exception.




* Class name: ServerException
* Namespace: Server\Exception
* Parent class: Exception







Methods
-------


### __construct

    null Server\Exception\ServerException::__construct(string $message, integer $code, object $previous)

ServerException constructor.

Use this constructor to set the error message and code, eventually give a parent exception.

* Visibility: **public**


#### Arguments
* $message **string** - &lt;p&gt;Error message&lt;/p&gt;
* $code **integer** - &lt;p&gt;Error code&lt;/p&gt;
* $previous **object** - &lt;p&gt;Previous Exception&lt;/p&gt;



### __toString

    string Server\Exception\ServerException::__toString()

ServerException toString.

Return readable exception string

* Visibility: **public**



