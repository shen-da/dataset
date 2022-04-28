# 简单数据集

通过静态方法 dataset 提供一个受保护的默认数据集

它的键值分别作为对象的属性名及属性值，属性不可增删；属性值可以修改，但不能改变数据类型

### 运行依赖

- php: ^8.0

### 安装

```shell
composer require loner/dataset
```

### 快速入门
```php
#!/usr/bin/env php
<?php

declare(strict_types=1);

namespace Loner\App;

use Loner\Dataset\{Dataset, DatasetInterface};

// composer 自加载
require_once __DIR__ . '/../vendor/autoload.php';

class Data implements DatasetInterface
{
    use Dataset;

    /**
     * @inheritDoc
     */
    public static function dataset(): array
    {
        return [
            'x' => 'x',
            'y' => 'y',
            'z' => 'z'
        ];
    }
}

// 创建数据对象，含有默认的属性：x、y、z
$data = new Data();

// 数据受保护，移除失败
unset($data->x);
// 类型一致，修改成功
$data->y = 'yy';
// 类型不同，修改失败
$data->z = 123;

var_dump($data->x, $data->y, $data->z); // "x"、"yy"、"z"

// 其它属性操作，与对象常规属性操作一致
$data->n = 'n';
$data->m = 'm';
unset($data->m);
var_dump($data->n, $data->m); // "n"、NULL
```

