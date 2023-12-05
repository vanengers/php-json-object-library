# php-json-object-library
Base object for api

## Installation
``` composer require vanengers/php-json-object-library```

## Usage
```
use Vanengers\PhpJsonObjectLibrary\PhpJsonObject;
class SamplePhpObject extends PhpJsonObject 
{
    public string $property = 'value';
}
```

### Use array to create object
```
$object = new SamplePhpObject(['property' => 'new value']);
```

### Or pass Json directly
```
$object = new SamplePhpObject("{\"property\":\"new value\"}");
```

### Use setters
```
class SamplePhpObject extends PhpJsonObject 
{
    public string $property = 'value';
    
    public function setProperty(string $data): self
    {
        $this->property = $value;
        // do stuff here like parsing data, transformation or validations
        
        return $this;
    }
}
```

### Translate json/array data to another object property
```
class SamplePhpObject extends PhpJsonObject 
{
    public $mappers = [
           'property_other_remote_name' => 'property'
    ];

    public string $property = 'value';
    
    ...
}
```

```
$object = new SamplePhpObject("{\"property_other_remote_name\":\"new value\"}");
$object->getProperty(); // returns: "new value"
```

### serialize to json / create array
```
$object = new SamplePhpObject("{\"property\":\"new value\"}");
$array = $object->toArray();
$json = $object->toJson();
```

### skip certain fields in object from being serialized
```
$object = new SamplePhpObject("{\"property\":\"new value\"}");
$array = $object->toArray(['skip' => ['property']]);
$json = $object->toJson(['skip' => ['property']]);
```

### skip certain fields in object from being serialized
```
$object = new SamplePhpObject("{\"property\":\"new value\"}");
$array = $object->toArray(['skip' => ['property']]);
$json = $object->toJson(['skip' => ['property']]);
```

### skip certain fields in object from being serialized only when value is null
```
$object = new SamplePhpObject("{\"property\":\"new value\"}");
$array = $object->toArray(['skip_null' => ['property']]);
$json = $object->toJson(['skip_null' => ['property']]);
```

### skip certain fields in object from being serialized only when value is empty()
```
$object = new SamplePhpObject("{\"property\":\"new value\"}");
$array = $object->toArray(['skip_empty' => ['property']]);
$json = $object->toJson(['skip_empty' => ['property']]);
```

### exclude properties from serialization
```
class SamplePhpObject extends PhpJsonObject 
{
    public $exclude_from_array = [
           'property'
    ];

    public string $property = 'value';
    public string $property2 = 'value';
    
    ...
}
```
Which results in
```
{
    "property2": "value"
}
```

### Add prefixes to your keys, when your resultset defines multidimensional arrays with some keys being the same
#### You can then process the parent key-name and add the whole key in the mappers
```
class SamplePhpObject extends PhpJsonObject 
{
    public $mappers = [
           'person_name' => 'author',
           'recipient_name' => 'recipient',
    ];

    public string $author = '';
    public string $recipient = '';
    
    ...
}
```
#### While your resultset is like this
```
{
    "person": {
        "name": "John Doe"
    },
    "recipient": {
        "name": "Jane Doe"
    }
}
```
#### You should use the prefix option while parsing the json and use setters
```
class SamplePhpObject extends PhpJsonObject 
{
    public $mappers = [
           'person_name' => 'author',
           'recipient_name' => 'recipient',
    ];

    public string $author = '';
    public string $recipient = '';
    
    public function setPerson($data) 
    {
        if (is_array($data)) {
            $this->fromArray($data);
        }
    }
    
    public function setRecipient($data) 
    {
        if (is_array($data)) {
            $this->fromArray($data);
        }
    }
}
```