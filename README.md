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

    public string $proper;;[ty = 'value';
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