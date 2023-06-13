# PHExpress - PHP API Framework

PHExpress is a lightweight and flexible API framework built using PHP. It provides a simple and easy-to-use interface for creating RESTful APIs that can be used for a variety of applications.

## Features

- **Easy to use:** PHExpress provides a simple and intuitive interface for creating APIs.
- **Fast:** PHExpress is built using PHP, a fast and efficient programming language.
- **Flexible:** PHExpress is highly customizable, allowing developers to build APIs that meet their specific needs.
- **Lightweight:** PHExpress is a lightweight framework that doesn't require a lot of resources to run.
- **Secure:** PHExpress includes built-in security features to help protect your API from attacks.

## Getting Started

https://www.youtube.com/watch?v=8A3VOPhtLcQ&list=PLsxTL3Cm1DEoS2KHMWouKhu_VCfm7EdB7&index=1

To get started with PHExpress, follow these steps:

1. Install PHExpress: PHExpress can be installed using Composer, the PHP package manager. Simply run `composer create-project phexpress/phexpress <project_name>`   to create a new PHExpress project.

2. Create a new PHP file: Create a new PHP file in your project directory and include the following code:

```php
<?php
 
    $app = new phexpress();
    $app->setParent("student");
     
    $app->get("/get", function($req,$res){
        // this line will response with all the list of students with status code 200
        $res->send(200,getTable("students")); 
    });

?>
```

## Documentation

For more information on how to use PHExpress, please refer to the [documentation](link to documntation).

## Contributing

If you would like to contribute to PHExpress, please fork the repository and submit a pull request. We welcome contributions from the community and appreciate any feedback or suggestions.

## License

PHExpress is licensed under the [MIT License](licence will be here).
