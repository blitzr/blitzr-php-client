Blitzr\Exception\ClientException
===============

ClientException, this exception is fired when the client did not provide all mandatory params.




* Class name: ClientException
* Namespace: Blitzr\Exception
* Parent class: Exception







Methods
-------


### __construct

    null Blitzr\Exception\ClientException::__construct(string $message, integer $code, object $previous)

ClientException constructor.

Use this constructor to set the error message and code, eventually give a parent exception.

* Visibility: **public**


#### Arguments
* $message **string** - &lt;p&gt;Error message&lt;/p&gt;
* $code **integer** - &lt;p&gt;Error code&lt;/p&gt;
* $previous **object** - &lt;p&gt;Previous Exception&lt;/p&gt;



### __toString

    string Blitzr\Exception\ClientException::__toString()

ClientException toString.

Return readable exception string

* Visibility: **public**



